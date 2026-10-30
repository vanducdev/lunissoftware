# Hướng Dẫn Cài Đặt LushSoftware Platform

Tài liệu này hướng dẫn chi tiết quy trình thiết lập môi trường phát triển (Local Development) và chạy thử nghiệm hệ thống **LushSoftware** trên cả hệ điều hành **Windows** và **Linux/macOS**.

---

## 1. Yêu Cầu Môi Trường (System Requirements)

- **PHP**: 8.3 trở lên (khuyến nghị PHP 8.3.x)
  - Các extension PHP bắt buộc: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `curl`, `fileinfo`, `gd`, `sqlite3` (hoặc `pdo_mysql`).
- **Composer**: Phiên bản 2.x
- **Node.js**: Phiên bản 18.x hoặc 20.x LTS & **NPM**
- **Cơ sở dữ liệu**: MySQL 8.0+ hoặc SQLite 3 (mặc định sẵn có)

---

## 2. Hướng Dẫn Cài Đặt Từng Bước (Step-by-Step)

### Bước 1: Sao chép mã nguồn & Truy cập thư mục
```bash
git clone <repository-url> website_lush
cd website_lush
```

### Bước 2: Cài đặt PHP Dependencies qua Composer
```bash
composer install
```
*(Trên Windows nếu chưa cài Composer toàn cục, có thể tải `composer.phar` và chạy `php composer.phar install`)*

### Bước 3: Cài đặt Frontend Dependencies qua NPM
```bash
npm install
```

### Bước 4: Thiết lập file môi trường (.env)
Sao chép từ file mẫu:
```bash
# Windows PowerShell
copy .env.example .env

# Linux / macOS
cp .env.example .env
```

Sinh khóa mã hóa ứng dụng:
```bash
php artisan key:generate
```

### Bước 5: Cấu hình Cơ sở dữ liệu & Chạy Migration
**Sử dụng SQLite (Mặc định - Cực nhanh, không cần cài MySQL daemon):**
```bash
# Windows PowerShell
New-Item -ItemType File -Path database/database.sqlite -Force

# Chạy migration & nạp dữ liệu mẫu thực tế
php artisan migrate:fresh --seed --seeder=LushDatabaseSeeder
```

**Hoặc sử dụng MySQL 8:**
Mở file `.env` và cập nhật thông số kết nối:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lushsoftware
DB_USERNAME=root
DB_PASSWORD=your_password
```
Sau đó chạy:
```bash
php artisan migrate:fresh --seed --seeder=LushDatabaseSeeder
```

### Bước 6: Liên kết thư mục Storage
```bash
php artisan storage:link
```

### Bước 7: Biên dịch tài nguyên giao diện (Vite & Tailwind CSS v4)
```bash
# Môi trường phát triển (Hot reload)
npm run dev

# Hoặc biên dịch bản Production tối ưu
npm run build
```

### Bước 8: Khởi chạy máy chủ cục bộ
Mở cửa sổ dòng lệnh riêng và chạy:
```bash
php artisan serve
```
Truy cập website tại: **http://127.0.0.1:8000**

---

## 3. Tài Khoản Quản Trị & Mẫu Khởi Tạo

Hệ thống được nạp sẵn dữ liệu hệ sinh thái thực tế:

| Vai trò | Email | Mật khẩu mặc định | Quyền hạn |
| :--- | :--- | :--- | :--- |
| **Super Admin** | `admin@lushsoftware.vn` | `Lush@Admin2026!` | Toàn quyền quản trị Dashboard, CMS, Media, Phân quyền |
| **Demo User** | `demo@lushsoftware.vn` | `Password123!` | Khách hàng thành viên, quản lý Profile, lịch sử liên hệ |

---

## 4. Chạy Kiểm Thử Tự Động (Automated Testing)

Chạy bộ kiểm thử 19 kịch bản tự động kiểm tra toàn bộ luồng public, search API, RBAC, bảo mật và admin:
```bash
php artisan test --compact
```
Định dạng mã nguồn theo chuẩn PSR-12 của dự án:
```bash
vendor/bin/pint --format agent
```

