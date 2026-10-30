# Sơ Đồ Cơ Sở Dữ Liệu & Từ Điển Dữ Liệu (Database Dictionary)

Nền tảng **LushSoftware** được thiết kế chuẩn hóa quan hệ (3NF) trên MySQL 8 (hoặc SQLite cho môi trường phát triển), đảm bảo tính toàn vẹn dữ liệu, hiệu năng truy vấn cao và hỗ trợ mở rộng lâu dài.

---

## 1. Sơ Đồ Quan Hệ Thực Thể (Entity Relationship Overview)

```
[ users ]
   │
   ├──< [ activity_logs ]
   ├──< [ articles ]
   └──< [ media_files ]

[ product_categories ]
   │
   └──< [ products ]
           │
           ├──< [ product_features ]
           ├──< [ product_images ]
           ├──< [ product_pricings ]
           └──< [ product_faqs ]

[ article_categories ]
   │
   └──< [ articles ]

[ contact_messages ] (Đơn liên hệ & Dùng thử)
[ website_settings ] (Cấu hình hệ thống Key-Value)
[ banners ]          (Banner Hero & Quảng bá)
[ testimonials ]     (Đánh giá khách hàng)
[ partners ]         (Logo đối tác chiến lược)
```

---

## 2. Danh Sách & Cấu Trúc Các Bảng (Data Dictionary)

### 2.1. Bảng `users` (Tài khoản người dùng & Quản trị)
| Cột | Kiểu | Ràng buộc | Mô tả |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | `PRIMARY KEY, AUTO_INCREMENT` | Định danh duy nhất |
| `name` | `VARCHAR(255)` | `NOT NULL` | Tên đầy đủ |
| `email` | `VARCHAR(255)` | `UNIQUE, NOT NULL` | Email đăng nhập |
| `password` | `VARCHAR(255)` | `NOT NULL` | Mật khẩu hash Bcrypt |
| `role` | `VARCHAR(50)` | `DEFAULT 'user'` | `super_admin`, `admin`, `editor`, `support`, `user` |
| `phone` | `VARCHAR(30)` | `NULLABLE` | Số điện thoại / Zalo |
| `avatar` | `VARCHAR(255)` | `NULLABLE` | Đường dẫn ảnh đại diện |
| `status` | `VARCHAR(20)` | `DEFAULT 'active'` | `active`, `suspended`, `banned` |
| `created_at` / `updated_at` | `TIMESTAMP` | `NULLABLE` | Thời gian tạo và cập nhật |

### 2.2. Bảng `products` (Hệ sinh thái phần mềm)
| Cột | Kiểu | Ràng buộc | Mô tả |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | `PRIMARY KEY, AUTO_INCREMENT` | Khóa chính |
| `category_id` | `BIGINT UNSIGNED` | `FOREIGN KEY (product_categories.id)` | Danh mục phần mềm |
| `name` | `VARCHAR(255)` | `NOT NULL` | Tên phần mềm |
| `slug` | `VARCHAR(255)` | `UNIQUE, INDEX` | URL thân thiện SEO |
| `tagline` | `VARCHAR(255)` | `NULLABLE` | Slogan ngắn nổi bật |
| `description` | `TEXT` | `NULLABLE` | Mô tả tổng quan |
| `content` | `LONGTEXT` | `NULLABLE` | Nội dung giới thiệu chi tiết |
| `logo` | `VARCHAR(255)` | `NULLABLE` | Icon/Logo sản phẩm |
| `version` | `VARCHAR(50)` | `DEFAULT '1.0.0'` | Phiên bản phát hành |
| `download_url`| `VARCHAR(255)` | `NULLABLE` | Link tải bộ cài trực tiếp |
| `is_featured` | `BOOLEAN` | `DEFAULT 0, INDEX` | Hiển thị nổi bật trang chủ |
| `status` | `VARCHAR(20)` | `DEFAULT 'published', INDEX`| `published`, `draft` |
| `order` | `INT` | `DEFAULT 0` | Thứ tự sắp xếp hiển thị |
| `translations`| `JSON` | `NULLABLE` | Bản dịch đa ngôn ngữ theo field |

### 2.3. Bảng `product_pricings` (Gói giá phần mềm)
| Cột | Kiểu | Ràng buộc | Mô tả |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | `PRIMARY KEY` | Khóa chính |
| `product_id` | `BIGINT UNSIGNED` | `FOREIGN KEY (products.id) CASCADE` | Liên kết sản phẩm |
| `plan_name` | `VARCHAR(100)` | `NOT NULL` | Tên gói: Starter, Pro, Lifetime... |
| `price` | `DECIMAL(12, 2)` | `NOT NULL` | Giá tiền |
| `currency` | `VARCHAR(10)` | `DEFAULT 'VND'` | Đơn vị tiền tệ |
| `billing_cycle`| `VARCHAR(50)` | `DEFAULT 'monthly'` | `monthly`, `yearly`, `lifetime` |
| `features` | `JSON` | `NULLABLE` | Mảng danh sách tính năng bao gồm |
| `is_popular` | `BOOLEAN` | `DEFAULT 0` | Đánh dấu gói bán chạy nhất |

### 2.4. Bảng `media_files` (Thư viện tệp tin & Hình ảnh)
| Cột | Kiểu | Ràng buộc | Mô tả |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | `PRIMARY KEY` | Khóa chính |
| `user_id` | `BIGINT UNSIGNED` | `FOREIGN KEY (users.id) NULL_ON_DELETE` | Người tải lên |
| `filename` | `VARCHAR(255)` | `INDEX, NOT NULL` | Tên tệp lưu trữ trên đĩa |
| `original_name`| `VARCHAR(255)`| `NOT NULL` | Tên gốc của tệp |
| `path` | `VARCHAR(255)` | `NOT NULL` | Đường dẫn trong `storage/app/public` |
| `mime_type` | `VARCHAR(50)` | `INDEX, NOT NULL` | MIME type (image/png, image/webp...) |
| `size` | `BIGINT UNSIGNED`| `NOT NULL` | Dung lượng tính bằng Bytes |
| `width` / `height` | `INT UNSIGNED` | `NULLABLE` | Kích thước ảnh thực tế (pixel) |
| `alt_text` | `VARCHAR(255)` | `NULLABLE` | Thẻ Alt phục vụ SEO hình ảnh |

### 2.5. Bảng `contact_messages` (Yêu cầu tư vấn & Khách hàng tiềm năng)
| Cột | Kiểu | Ràng buộc | Mô tả |
| :--- | :--- | :--- | :--- |
| `id` | `BIGINT UNSIGNED` | `PRIMARY KEY` | Khóa chính |
| `name` | `VARCHAR(255)` | `NOT NULL` | Họ tên người liên hệ |
| `email` | `VARCHAR(255)` | `NOT NULL, INDEX` | Email liên hệ |
| `phone` | `VARCHAR(30)` | `NULLABLE` | Số điện thoại / Zalo |
| `company` | `VARCHAR(255)` | `NULLABLE` | Tên công ty / Tổ chức |
| `subject` | `VARCHAR(255)` | `NULLABLE` | Tiêu đề yêu cầu |
| `product_interest`| `VARCHAR(255)`| `NULLABLE` | Phần mềm khách hàng quan tâm |
| `status` | `VARCHAR(20)` | `DEFAULT 'pending', INDEX` | `pending`, `processing`, `completed` |
| `admin_notes` | `TEXT` | `NULLABLE` | Ghi chú nội bộ của nhân viên tư vấn |

---

## 3. Chiến Lược Đánh Chỉ Mục & Tối Ưu Truy Vấn (Indexing Strategy)

1. **Foreign Key Indexes**: Tất cả khóa ngoại (`category_id`, `product_id`, `author_id`, `user_id`) đều được đánh chỉ mục giúp các truy vấn `JOIN` và quan hệ Eloquent đạt tốc độ cực đại.
2. **Status & Published Scope**: Các cột `status`, `is_active`, `is_featured` được lập index phục vụ truy vấn lọc trang chủ và danh mục.
3. **Slugs**: Các trường `slug` trên `products`, `articles`, `product_categories` được cấu hình `UNIQUE INDEX`, đảm bảo tra cứu theo URL O(1).
4. **Eager Loading**: Hệ thống sử dụng `with(['category', 'pricings', 'features'])` trong toàn bộ Services để triệt tiêu hoàn toàn vấn đề N+1 Query.
