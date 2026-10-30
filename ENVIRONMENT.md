# Hướng Dẫn Biến Môi Trường (Environment Variables Reference)

File `.env` quản lý toàn bộ cấu hình nhạy cảm và tham số vận hành của nền tảng **LushSoftware**. Dưới đây là bảng giải thích chi tiết từng biến môi trường.

---

## 1. Cấu Hình Cốt Lõi (Core Application)

| Biến | Giá trị khuyến nghị (Dev) | Giá trị khuyến nghị (Production) | Mô tả |
| :--- | :--- | :--- | :--- |
| `APP_NAME` | `LushSoftware` | `LushSoftware` | Tên hệ thống hiển thị |
| `APP_ENV` | `local` | `production` | Môi trường chạy |
| `APP_KEY` | *(Tạo tự động)* | *(Tạo tự động)* | Khóa mã hóa session & cookies |
| `APP_DEBUG` | `true` | `false` | Bật/tắt màn hình chi tiết lỗi |
| `APP_URL` | `http://127.0.0.1:8000`| `https://lushsoftware.vn` | Địa chỉ tên miền gốc |
| `APP_LOCALE` | `vi` | `vi` | Ngôn ngữ mặc định (`vi`, `en`, `zh`, `ko`) |
| `APP_FALLBACK_LOCALE` | `vi` | `vi` | Ngôn ngữ dự phòng |

---

## 2. Kết Nối Cơ Sở Dữ Liệu (Database Connection)

```env
# Mặc định sử dụng SQLite (Phát triển cục bộ)
DB_CONNECTION=sqlite

# Hoặc chuyển sang MySQL 8 cho môi trường Production / Staging
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=lushsoftware
# DB_USERNAME=root
# DB_PASSWORD=your_secure_password
```

---

## 3. Quản Lý Session, Cache & Queue

| Biến | Giá trị phát triển | Giá trị sản xuất | Mô tả |
| :--- | :--- | :--- | :--- |
| `SESSION_DRIVER` | `file` hoặc `database` | `redis` | Nơi lưu trữ phiên người dùng |
| `CACHE_STORE` | `file` hoặc `database` | `redis` | Driver bộ nhớ đệm tăng tốc độ trang |
| `QUEUE_CONNECTION` | `sync` | `redis` | Xử lý hàng đợi gửi email / tác vụ nền |

---

## 4. Tùy Chọn Cổng Thanh Toán & Dịch Vụ Mở Rộng (Tùy chọn)

```env
# Cấu hình Mail gửi thông báo liên hệ
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=notifications@lushsoftware.vn
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="contact@lushsoftware.vn"
MAIL_FROM_NAME="LushSoftware Notification"

# Tích hợp OAuth mạng xã hội (Nếu có)
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=https://lushsoftware.vn/auth/google/callback

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_REDIRECT_URI=https://lushsoftware.vn/auth/github/callback
```

