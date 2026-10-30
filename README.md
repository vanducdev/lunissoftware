# LushSoftware – SaaS & Software Growth Platform

Website giới thiệu và kinh doanh phần mềm chuyên nghiệp **LushSoftware**, xây dựng trên nền tảng **Laravel 12 / PHP 8.3+** với kiến trúc hiện đại, giao diện Pure White + Ocean Blue Accent sang trọng, chuẩn SEO và tích hợp hệ thống quản trị nội dung (CMS) toàn diện.

---

## 🎨 1. Quy Định Thiết Kế Giao Diện (Design System)

- **Phong cách**: Premium SaaS, Minimalist, Modern Technology, Clean UI.
- **Tỉ lệ màu sắc**:
  - 90–95% diện tích giao diện là **Trắng (#FFFFFF)** hoặc tông sáng sạch sẽ.
  - 5–10% điểm nhấn là **Xanh biển (Ocean Blue)** trên buttons, badges, icons, links và biểu tượng nổi bật.
- **Bảng mã màu chuẩn**:
  - Background: `#FFFFFF`
  - Card Background: `#FFFFFF`
  - Header: `#FFFFFF` (sticky với hiệu ứng blur và shadow nhẹ khi cuộn)
  - Primary Blue: `#168BD2`
  - Hover Blue: `#0878BD`
  - Secondary Blue: `#48B4E5`
  - Main Text: `#172B3A`
  - Secondary Text: `#718096`
  - Border: `#E8EDF2`
- **Dark Mode / Light Mode**:
  - **Mặc định là Light Mode**.
  - Tùy chọn Dark Mode lưu trữ tại `localStorage`, có script inline chống nhấp nháy (FOUC).
  - Màu sắc Dark Mode được thiết kế đồng bộ với hệ biến CSS Variables.

---

## 🌐 2. Hệ Thống Đa Ngôn Ngữ (4 Ngôn Ngữ)

Website hỗ trợ đầy đủ 4 ngôn ngữ:
1. **Tiếng Việt (`vi`)** – Ngôn ngữ mặc định
2. **English (`en`)**
3. **中文 (`zh`)**
4. **한국어 (`ko`)**

- Tích hợp bộ chọn ngôn ngữ trên Header và Mobile Drawer.
- Lưu tùy chọn vào Session & Cookie vĩnh viễn qua middleware `SetLocale`.
- Toàn bộ từ khóa giao diện, thông báo, menu, chân trang đều được định nghĩa trong `lang/{locale}.json`.
- Quản trị viên có thể chỉnh sửa trực tiếp bản dịch của từng ngôn ngữ tại `/admin/translations`.

---

## 🚀 3. Tính Năng Chính

### Phía Khách Hàng (Public Frontend)
- **Trang chủ (`/`)**:
  - Hero Section với slogan nổi bật, 2 nút CTA và khung minh họa sinh thái SaaS tương tác.
  - Giới thiệu doanh nghiệp: Tầm nhìn, Sứ mệnh, Giá trị cốt lõi, Lịch sử phát triển.
  - Danh mục & Thẻ sản phẩm nổi bật với tính năng, giá và nút trải nghiệm.
  - Giải pháp công nghệ theo từng bài toán chuyển đổi số.
  - Khối chỉ số thống kê (Doanh nghiệp, Phần mềm, Người dùng, Năm hoạt động).
  - Đánh giá khách hàng (Testimonials) với slider Swiper.js.
  - Logo các đối tác lớn (VNPAY, FPT Cloud, Zalo Business, Viettel...).
  - Tin tức công nghệ mới nhất.
  - CTA chuyển đổi cao & Footer 4 cột đầy đủ thông tin pháp lý, mạng xã hội (Telegram, Facebook, YouTube, GitHub).
- **Sản phẩm (`/products`, `/products/{slug}`)**:
  - Danh sách grid, tìm kiếm từ khóa, lọc theo danh mục, sắp xếp (Mặc định, Xem nhiều, Mới nhất, Tên).
  - Trang chi tiết sản phẩm: Tagline, mô tả, nội dung giới thiệu, danh sách tính năng, bảng giá 3 gói (Tháng / Năm / Trọn đời), câu hỏi thường gặp FAQ, nút tải phần mềm.
- **Giải pháp (`/solutions`)**: Tổng hợp các giải pháp theo lĩnh vực kinh doanh.
- **Bảng giá (`/pricing`)**: Bảng giá đối sánh chi tiết các gói bản quyền của từng sản phẩm.
- **Tin tức & Blog (`/news`, `/news/{slug}`)**: Hệ thống bài viết CMS, chuyên mục, tác giả, lượt xem, bài viết liên quan, tối ưu thẻ SEO meta, OpenGraph.
- **Giới thiệu (`/about`)**: Tầm nhìn, sứ mệnh, giá trị cốt lõi, cột mốc lịch sử.
- **Liên hệ (`/contact`)**: Form đăng ký tư vấn kèm xác thực phía server, hotline 24/7, email, bản đồ và kênh Telegram hỗ trợ.
- **Chính sách & Điều khoản (`/terms`, `/privacy`)**.

### Tài Khoản Người Dùng (Auth & Profile)
- Đăng ký tài khoản (`/register`).
- Đăng nhập bảo mật (`/login`).
- Quên mật khẩu (`/forgot-password`).
- Hồ sơ cá nhân (`/profile`): Cập nhật họ tên, email, số điện thoại, đổi avatar, đổi mật khẩu và xem lịch sử hoạt động bảo mật.

### Hệ Thống Quản Trị Admin (`/admin`)
- **Dashboard**: Thống kê số lượng người dùng, sản phẩm, bài viết, yêu cầu liên hệ đang chờ, biểu đồ trực quan, danh sách yêu cầu mới nhất và nhật ký hoạt động.
- **Quản lý sản phẩm (`/admin/products`)**: Thêm, sửa, xóa, tải logo, cập nhật phiên bản, trạng thái xuất bản, thứ tự hiển thị, tính năng và bảng giá.
- **Quản lý bài viết CMS (`/admin/articles`)**: CRUD bài viết, danh mục, upload ảnh thumbnail, trạng thái xuất bản, cấu hình SEO Title / Description / Keywords.
- **Quản lý banner (`/admin/banners`)**: Quản lý hero banner trang chủ, badge, link điều hướng, nút phụ.
- **Quản lý khách hàng (`/admin/customers`)**: Xem danh sách thành viên, khóa/mở khóa tài khoản, phân quyền Quản trị viên (Admin) hoặc Khách hàng (User).
- **Quản lý yêu cầu tư vấn (`/admin/contacts`)**: Xem chi tiết thông tin khách gửi, đổi trạng thái (Chờ xử lý, Đang xử lý, Đã hoàn thành), lưu ghi chú nội bộ.
- **Cấu hình website (`/admin/settings`)**: Cấu hình tên trang, hotline, email, địa chỉ, mạng xã hội, các con số thống kê và SEO mặc định.
- **Quản lý đa ngôn ngữ (`/admin/translations`)**: Trình chỉnh sửa trực quan toàn bộ chuỗi từ vựng cho 4 ngôn ngữ `vi`, `en`, `zh`, `ko`.

---

## 🔐 4. Tài Khoản Quản Trị & Demo Mặc Định

Cơ sở dữ liệu mẫu đã được tạo sẵn qua Seeder:

### Tài khoản Quản trị viên (Administrator):
- **URL Đăng nhập**: `http://localhost:8000/login`
- **Email**: `admin@lushsoftware.vn`
- **Mật khẩu**: `Lush@Admin2026!`
- **Quyền hạn**: Toàn quyền truy cập `/admin`

### Tài khoản Thành viên mẫu (Demo User):
- **Email**: `demo@lushsoftware.vn`
- **Mật khẩu**: `Password123!`

---

## 🛠️ 5. Yêu Cầu Kỹ Thuật & Cài Đặt

### Yêu cầu môi trường:
- PHP >= 8.3
- Tiện ích mở rộng PHP: `pdo`, `pdo_mysql` (hoặc `pdo_sqlite`), `mbstring`, `openssl`, `curl`, `gd`, `zip`, `intl`
- Composer 2.x
- Node.js >= 18.x & NPM

### Các bước cài đặt:

1. **Clone hoặc di chuyển vào thư mục dự án**:
   ```bash
   cd e:\website_lush
   ```

2. **Cài đặt thư viện PHP (Composer)**:
   ```bash
   composer install
   ```

3. **Cài đặt thư viện Frontend (NPM) & Biên dịch assets**:
   ```bash
   npm install
   npm run build
   ```

4. **Tạo file môi trường `.env`**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Chạy Migration & Seeder dữ liệu mẫu**:
   ```bash
   php artisan migrate --seed
   ```
   *(Mặc định cấu hình SQLite chạy ngay không cần cài đặt thêm server DB, có thể đổi sang MySQL 8 trong file `.env`)*

6. **Tạo symlink lưu trữ media (Avatar, Banner, Uploads)**:
   ```bash
   php artisan storage:link
   ```

7. **Khởi chạy máy chủ phát triển**:
   ```bash
   php artisan serve
   ```
   Truy cập website tại: `http://localhost:8000`

---

## 🧪 6. Kiểm Thử Hệ Thống (Automated Testing)

Dự án đi kèm bộ test tự động (PHPUnit / Feature Tests) kiểm tra toàn bộ luồng hoạt động:
```bash
php artisan test
```
Kết quả kiểm thử: **13/13 tests passed (52 assertions)**.

---

## 🛡️ 7. Bảo Mật & Tối Ưu

- Bảo vệ chống CSRF trên toàn bộ form.
- Chống XSS với cơ chế escaping tự động của Blade Engine.
- Chống SQL Injection qua Eloquent ORM & Parameter Binding.
- Phân quyền nghiêm ngặt với Middleware `EnsureUserIsAdmin`.
- Chuẩn SEO: Thẻ meta Semantic HTML, Canonical URL, hreflang tags cho 4 ngôn ngữ.
