# Hướng Dẫn Triển Khai Sản Xuất (Production Deployment Guide)

Tài liệu này cung cấp hướng dẫn triển khai nền tảng **LushSoftware** lên môi trường Production (Ubuntu 22.04/24.04 LTS, Nginx, PHP 8.3-FPM, MySQL 8, SSL Let's Encrypt hoặc nền tảng đám mây Laravel Cloud / Docker).

---

## 1. Kiến Trúc Triển Khai Khuyến Nghị (Production Stack)

- **Web Server**: Nginx (reverse proxy, static caching, gzip/brotli compression)
- **PHP Process**: PHP 8.3-FPM kèm OPcache kích hoạt
- **Database**: MySQL 8.0+ (hoặc MariaDB 10.11 LTS)
- **Cache & Session**: Redis 7.x
- **SSL Certificate**: Let's Encrypt Certbot (TLS 1.2 & 1.3)
- **Process Manager**: Supervisor (quản lý Queue Worker & Task Scheduler)

---

## 2. Các Bước Triển Khai Trên Máy Chủ Linux (Ubuntu / Debian)

### 2.1. Cập nhật hệ điều hành & cài đặt gói
```bash
sudo apt update && sudo apt upgrade -y
sudo apt install -y nginx mysql-server php8.3-fpm php8.3-cli php8.3-mysql php8.3-curl \
    php8.3-gd php8.3-mbstring php8.3-xml php8.3-zip php8.3-bcmath php8.3-redis \
    git curl unzip supervisor certbot python3-certbot-nginx
```

### 2.2. Triển khai Source Code
```bash
cd /var/www
sudo git clone <repo-url> lushsoftware
cd lushsoftware

# Cài đặt PHP dependencies không kèm dev packages
composer install --no-dev --optimize-autoloader

# Cài đặt và build assets giao diện
npm ci
npm run build
```

### 2.3. Phân quyền thư mục an toàn
```bash
sudo chown -R www-data:www-data /var/www/lushsoftware
sudo find /var/www/lushsoftware -type f -exec chmod 644 {} \;
sudo find /var/www/lushsoftware -type d -exec chmod 755 {} \;
sudo chmod -R 775 /var/www/lushsoftware/storage /var/www/lushsoftware/bootstrap/cache
```

### 2.4. Cấu hình `.env` cho Production
```bash
cp .env.example .env
nano .env
```
Thiết lập các biến quan trọng:
```env
APP_NAME=LushSoftware
APP_ENV=production
APP_DEBUG=false
APP_URL=https://lushsoftware.vn

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=lushsoftware_prod
DB_USERNAME=lush_db_user
DB_PASSWORD=SecurePasswordHere123!

QUEUE_CONNECTION=redis
SESSION_DRIVER=redis
CACHE_STORE=redis
```
Tạo key và tối ưu hóa bộ nhớ đệm:
```bash
php artisan key:generate --force
php artisan migrate --force --seed --seeder=LushDatabaseSeeder
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 3. Cấu Hình Nginx Web Server

Tạo file cấu hình tại `/etc/nginx/sites-available/lushsoftware.conf`:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name lushsoftware.vn www.lushsoftware.vn;
    root /var/www/lushsoftware/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    add_header X-XSS-Protection "1; mode=block";
    add_header Referrer-Policy "strict-origin-when-cross-origin";

    index index.php;
    charset utf-8;

    # Static assets caching
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff|woff2|svg)$ {
        expires 30d;
        add_header Cache-Control "public, no-transform";
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
Kích hoạt site và cài đặt chứng chỉ SSL:
```bash
sudo ln -s /etc/nginx/sites-available/lushsoftware.conf /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx

# Cài đặt SSL miễn phí
sudo certbot --nginx -d lushsoftware.vn -d www.lushsoftware.vn
```

---

## 4. Cấu Hình Supervisor & Scheduler

### 4.1. Cron Job Scheduler
Mở crontab của user `www-data`:
```bash
sudo crontab -u www-data -e
```
Thêm dòng sau để kích hoạt bộ lập lịch định kỳ của Laravel:
```cron
* * * * * cd /var/www/lushsoftware && php artisan schedule:run >> /dev/null 2>&1
```

### 4.2. Supervisor Queue Worker
Tạo file `/etc/supervisor/conf.d/lush-worker.conf`:
```ini
[program:lush-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/lushsoftware/artisan queue:work redis --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/lushsoftware/storage/logs/worker.log
stopwaitsecs=3600
```
Tải lại supervisor:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start lush-worker:*
```

---

## 5. Quy Trình Cập Nhật Phiên Bản (Zero-Downtime Deployment Script)

Tạo script `deploy.sh`:
```bash
#!/bin/bash
set -e

echo "Bắt đầu cập nhật LushSoftware..."
php artisan down --render="errors::503"

git pull origin master
composer install --no-dev --optimize-autoloader
php artisan migrate --force
npm ci
npm run build

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo supervisorctl restart lush-worker:*
php artisan up

echo "Cập nhật thành công!"
```

