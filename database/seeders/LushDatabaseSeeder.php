<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductFaq;
use App\Models\ProductFeature;
use App\Models\ProductPricing;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LushDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Users
        $admin = User::updateOrCreate(
            ['email' => 'admin@lushsoftware.vn'],
            [
                'name' => 'Lush Admin',
                'password' => Hash::make('Lush@Admin2026!'),
                'role' => 'admin',
                'phone' => '+84 988 123 456',
                'avatar' => null,
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $demoUser = User::updateOrCreate(
            ['email' => 'demo@lushsoftware.vn'],
            [
                'name' => 'Nguyễn Văn Minh',
                'password' => Hash::make('Password123!'),
                'role' => 'user',
                'phone' => '+84 912 345 678',
                'avatar' => null,
                'status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        ActivityLog::log('system_init', 'Hệ thống LushSoftware khởi tạo cơ sở dữ liệu mẫu.', $admin);

        // 2. Website Settings
        $settings = [
            'site_name' => 'LushSoftware',
            'site_tagline' => 'Nền tảng phần mềm & giải pháp tự động hóa tăng trưởng doanh nghiệp',
            'site_logo' => 'images/logo.png',
            'site_favicon' => 'images/logo.png',
            'contact_email' => 'contact@lushsoftware.vn',
            'contact_hotline' => '1900 886 996',
            'contact_phone' => '+84 988 123 456',
            'contact_address' => 'Tầng 18, Tòa nhà Công Nghệ Cao Lush Tower, Cầu Giấy, Hà Nội, Việt Nam',
            'social_facebook' => 'https://facebook.com/lushsoftware',
            'social_telegram' => 'https://t.me/lushsoftware_official',
            'social_youtube' => 'https://youtube.com/@lushsoftware',
            'social_github' => 'https://github.com/lushsoftware',
            'meta_title' => 'LushSoftware – Giải pháp phần mềm Marketing & SaaS hàng đầu',
            'meta_description' => 'Hệ sinh thái công nghệ tự động hóa Marketing, CRM và tối ưu vận hành doanh nghiệp với chi phí tối ưu, độ ổn định vượt trội.',
            'meta_keywords' => 'lush software, phần mềm marketing, giải pháp bán hàng, crm tự động, marketing automation',
            'stat_clients' => '15,000+',
            'stat_products' => '12+',
            'stat_users' => '50,000+',
            'stat_years' => '6+',
            'stat_satisfaction' => '99.2%',
            'default_locale' => 'vi',
            'working_hours' => 'Thứ 2 - Thứ 7: 08:00 - 18:00',
        ];

        foreach ($settings as $key => $value) {
            WebsiteSetting::set($key, $value);
        }

        // 3. Hero Banners
        Banner::updateOrCreate(
            ['title' => 'Hệ Sinh Thái Phần Mềm Tăng Trưởng Toàn Diện'],
            [
                'badge' => 'CÔNG NGHỆ BỨT PHÁ 2026',
                'subtitle' => 'Tự động hóa tiếp thị, quản trị quan hệ khách hàng và mở rộng quy mô kinh doanh không giới hạn với công nghệ thuần điện toán đám mây.',
                'image' => 'images/banner.png',
                'link_url' => '/products',
                'link_text' => 'Khám phá sản phẩm',
                'secondary_link_url' => '/contact',
                'secondary_link_text' => 'Liên hệ tư vấn',
                'position' => 'home_hero',
                'order' => 1,
                'is_active' => true,
            ]
        );

        // 4. Product Categories
        $catMarketing = ProductCategory::updateOrCreate(
            ['slug' => 'marketing-automation'],
            [
                'name' => 'Tự Động Hóa Marketing',
                'description' => 'Giải pháp nuôi dưỡng khách hàng, tự động tiếp cận và bùng nổ chuyển đổi doanh số.',
                'icon' => 'bullhorn',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $catSocial = ProductCategory::updateOrCreate(
            ['slug' => 'social-management'],
            [
                'name' => 'Quản Trị Mạng Xã Hội',
                'description' => 'Công cụ tương tác, tự động đăng bài, quản trị đa kênh Facebook, TikTok, Zalo, Instagram.',
                'icon' => 'share-2',
                'order' => 2,
                'is_active' => true,
            ]
        );

        $catCrm = ProductCategory::updateOrCreate(
            ['slug' => 'crm-sales'],
            [
                'name' => 'Bán Hàng & CRM',
                'description' => 'Hệ thống số hóa quy trình kinh doanh, quản lý đội ngũ sales và tự động hóa chu trình chốt deal.',
                'icon' => 'users-check',
                'order' => 3,
                'is_active' => true,
            ]
        );

        $catData = ProductCategory::updateOrCreate(
            ['slug' => 'data-intelligence'],
            [
                'name' => 'Thu Thập & Phân Tích Dữ Liệu',
                'description' => 'Trích xuất dữ liệu insight thị trường, đối thủ cạnh tranh và phân tích hành vi khách hàng.',
                'icon' => 'bar-chart-3',
                'order' => 4,
                'is_active' => true,
            ]
        );

        // 5. Products
        $productsData = [
            [
                'category_id' => $catMarketing->id,
                'name' => 'Lush Marketing Pro',
                'slug' => 'lush-marketing-pro',
                'tagline' => 'Tự động hóa chiến dịch tiếp thị đa kênh thông minh',
                'description' => 'Công cụ hàng đầu giúp tự động hóa quy trình gửi email, tin nhắn Zalo, SMS và thông báo đẩy. Tối ưu chuyển đổi và giảm 70% thời gian thực thi của đội ngũ Marketing.',
                'content' => '<h2>Đột phá năng suất tiếp thị cùng Lush Marketing Pro</h2><p>Lush Marketing Pro là giải pháp cốt lõi dành cho các doanh nghiệp SME và tập đoàn mong muốn chuẩn hóa và tự động hóa quy trình nuôi dưỡng khách hàng tiềm năng. Tích hợp sâu với các kênh liên lạc phổ biến, hệ thống đảm bảo thông điệp của bạn luôn tiếp cận đúng người vào đúng thời điểm vàng.</p><h3>Lợi ích cốt lõi:</h3><ul><li>Phân khúc tệp khách hàng tự động theo hành vi thực tế.</li><li>Kịch bản chăm sóc chuỗi tự động thông minh (Workflow Builder trực quan).</li><li>Báo cáo tỷ lệ chuyển đổi, mở và click theo thời gian thực.</li><li>Tiết kiệm chi phí nhân sự và loại bỏ thao tác thủ công rườm rà.</li></ul>',
                'version' => 'v3.4.2',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 12450,
                'order' => 1,
                'features' => [
                    ['title' => 'Workflow Kéo Thả Trực Quan', 'description' => 'Xây dựng kịch bản chăm sóc khách hàng đa bước không cần viết code.', 'icon' => 'git-branch'],
                    ['title' => 'Tương Thích Đa Nền Tảng', 'description' => 'Kết nối Zalo ZNS, Telegram Bot, Email Marketing và SMS Gateway đồng bộ.', 'icon' => 'cpu'],
                    ['title' => 'Phân Tích AI Dự Đoán', 'description' => 'Thuật toán AI tự động gợi ý thời điểm vàng tiếp cận khách hàng tiềm năng.', 'icon' => 'sparkles'],
                    ['title' => 'Bảo Mật Tiêu Chuẩn Doanh Nghiệp', 'description' => 'Mã hóa dữ liệu 256-bit, tuân thủ tiêu chuẩn an toàn dữ liệu GDPR.', 'icon' => 'shield-check'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Cơ Bản (Starter)',
                        'price' => 450000,
                        'currency' => '₫',
                        'billing_cycle' => 'monthly',
                        'is_popular' => false,
                        'features' => ['Gửi tối đa 10,000 thông điệp/tháng', 'Kết nối 2 kênh gửi', 'Báo cáo thống kê cơ bản', 'Hỗ trợ kỹ thuật giờ hành chính'],
                        'cta_text' => 'Bắt đầu dùng thử',
                        'cta_link' => '/contact?product=lush-marketing-pro&plan=starter',
                    ],
                    [
                        'plan_name' => 'Gói Chuyên Nghiệp (Pro)',
                        'price' => 3800000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Không giới hạn số lượt gửi', 'Kết nối tất cả các kênh (Zalo, SMS, Email, Tele)', 'Workflow tự động hóa không giới hạn', 'Phân tích dự đoán AI', 'Hỗ trợ 24/7 ưu tiên cao'],
                        'cta_text' => 'Chọn gói Pro',
                        'cta_link' => '/contact?product=lush-marketing-pro&plan=pro',
                    ],
                    [
                        'plan_name' => 'Gói Doanh Nghiệp (Enterprise)',
                        'price' => 8900000,
                        'currency' => '₫',
                        'billing_cycle' => 'lifetime',
                        'is_popular' => false,
                        'features' => ['Bản quyền trọn đời không phát sinh phí', 'Triển khai máy chủ riêng (On-premise / Private Cloud)', 'Tùy biến tính năng theo yêu cầu', 'Chuyên viên kỹ thuật bàn giao tận nơi'],
                        'cta_text' => 'Liên hệ tư vấn',
                        'cta_link' => '/contact?product=lush-marketing-pro&plan=enterprise',
                    ],
                ],
                'faqs' => [
                    ['question' => 'Phần mềm Lush Marketing Pro có cần cài đặt phần cứng đặc biệt không?', 'answer' => 'Không, Lush Marketing Pro hoạt động hoàn toàn trên nền tảng đám mây và tương thích trên mọi trình duyệt web hiện đại (Chrome, Edge, Safari, Firefox).'],
                    ['question' => 'Tôi có được hỗ trợ chuyển đổi dữ liệu từ phần mềm cũ không?', 'answer' => 'Có, đội ngũ chuyên gia của LushSoftware sẽ trực tiếp đồng hành cùng doanh nghiệp bạn trong quá trình import dữ liệu và thiết lập ban đầu hoàn toàn miễn phí.'],
                    ['question' => 'Hệ thống có cam kết bảo mật thông tin khách hàng không?', 'answer' => 'Chắc chắn có. Chúng tôi áp dụng quy chuẩn bảo mật mã hóa end-to-end và cam kết tuyệt đối không chia sẻ dữ liệu với bên thứ ba dưới bất kỳ hình thức nào.'],
                ],
            ],
            [
                'category_id' => $catSocial->id,
                'name' => 'Lush Social Hub',
                'slug' => 'lush-social-hub',
                'tagline' => 'Quản trị đa tài khoản và tự động hóa tương tác mạng xã hội',
                'description' => 'Giải pháp mạnh mẽ quản lý hàng trăm tài khoản Facebook, TikTok, Zalo, Instagram trên một màn hình duy nhất. Tự động lên lịch đăng bài, nuôi tài khoản và trả lời bình luận.',
                'content' => '<h2>Làm chủ mạng xã hội với Lush Social Hub</h2><p>Dành riêng cho các nhà sáng tạo nội dung, chủ shop online và agency truyền thông. Lush Social Hub giải phóng bạn khỏi chuỗi công việc lặp đi lặp lại khi phải quản lý thủ công từng fanpage, profile hay group.</p>',
                'version' => 'v2.8.0',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 18900,
                'order' => 2,
                'features' => [
                    ['title' => 'Lên Lịch Đăng Đa Nền Tảng', 'description' => 'Đăng 1 lần, xuất bản đồng thời lên Facebook, Reels, TikTok và Instagram.', 'icon' => 'calendar'],
                    ['title' => 'Hộp Thư Hội Tụ (Omnichannel Inbox)', 'description' => 'Quản lý tin nhắn và bình luận từ tất cả fanpage trên 1 giao diện duy nhất.', 'icon' => 'message-square'],
                    ['title' => 'Nuôi Tài Khoản An Toàn', 'description' => 'Mô phỏng hành vi người dùng thật với proxy riêng biệt, chống checkpoint hiệu quả.', 'icon' => 'shield'],
                    ['title' => 'Báo Cáo Tăng Trưởng Fanpage', 'description' => 'Đo lường tương tác, reach và tỷ lệ tăng trưởng follower theo từng tuần.', 'icon' => 'trending-up'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Đơn Lẻ (Single)',
                        'price' => 350000,
                        'currency' => '₫',
                        'billing_cycle' => 'monthly',
                        'is_popular' => false,
                        'features' => ['Quản lý 5 tài khoản mạng xã hội', 'Lên lịch 100 bài viết/tháng', 'Tự động trả lời comment cơ bản'],
                        'cta_text' => 'Đăng ký ngay',
                        'cta_link' => '/contact?product=lush-social-hub&plan=single',
                    ],
                    [
                        'plan_name' => 'Gói Doanh Nghiệp (Business)',
                        'price' => 2900000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Không giới hạn số lượng tài khoản', 'Lên lịch không giới hạn', 'Hộp thư hội tụ đa kênh', 'Mô phỏng proxy chống khóa', 'Cập nhật tính năng mới miễn phí'],
                        'cta_text' => 'Chọn gói Doanh Nghiệp',
                        'cta_link' => '/contact?product=lush-social-hub&plan=business',
                    ],
                ],
                'faqs' => [
                    ['question' => 'Có sợ bị khóa tài khoản khi dùng phần mềm không?', 'answer' => 'Lush Social Hub sử dụng công nghệ giả lập hành vi người dùng chuẩn xác với IP sạch và cơ chế giãn cách an toàn, hạn chế tối đa rủi ro checkpoint.'],
                ],
            ],
            [
                'category_id' => $catCrm->id,
                'name' => 'Lush CRM Enterprise',
                'slug' => 'lush-crm-enterprise',
                'tagline' => 'Quản trị phễu khách hàng & tăng tốc doanh số vượt bậc',
                'description' => 'Phần mềm CRM chuyên sâu cho đội ngũ kinh doanh B2B và B2C. Quản lý toàn diện dữ liệu khách hàng từ lúc phát sinh nhu cầu đến khi hoàn tất hợp đồng và tái mua.',
                'content' => '<h2>Đột phá doanh thu với quy trình bán hàng khép kín</h2><p>Lush CRM Enterprise loại bỏ tình trạng thất thoát lead, hỗ trợ quản lý phân quyền chặt chẽ theo cấp bậc và minh bạch hóa hiệu suất của từng nhân viên kinh doanh.</p>',
                'version' => 'v4.1.0',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 9800,
                'order' => 3,
                'features' => [
                    ['title' => 'Phễu Bán Hàng Kanban', 'description' => 'Theo dõi tình trạng hợp đồng kéo thả trực quan theo từng giai đoạn deal.', 'icon' => 'columns'],
                    ['title' => 'Chia Lead Tự Động', 'description' => 'Phân bổ lead thông minh theo nguyên tắc xoay vòng hoặc KPI nhân viên.', 'icon' => 'user-plus'],
                    ['title' => 'Tích Hợp Tổng Đài VoIP', 'description' => 'Gọi điện trực tiếp từ CRM, tự động ghi âm và lưu trữ lịch sử cuộc gọi.', 'icon' => 'phone-call'],
                    ['title' => 'Báo Cáo Doanh Thu Realtime', 'description' => 'Biểu đồ trực quan doanh thu theo ngày, tuần, quý và dự báo dòng tiền.', 'icon' => 'pie-chart'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Tiêu Chuẩn',
                        'price' => 5500000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Dành cho tối đa 10 nhân sự', 'Quản lý 50,000 khách hàng', 'Tích hợp tổng đài VoIP', 'Báo cáo doanh số tự động'],
                        'cta_text' => 'Trải nghiệm ngay',
                        'cta_link' => '/contact?product=lush-crm-enterprise&plan=standard',
                    ],
                ],
                'faqs' => [
                    ['question' => 'Dữ liệu khách hàng trên CRM có thể xuất ra file Excel được không?', 'answer' => 'Có, bạn hoàn toàn có thể phân quyền ai được phép xuất dữ liệu ra định dạng Excel hoặc CSV với mã OTP xác thực an toàn.'],
                ],
            ],
            [
                'category_id' => $catData->id,
                'name' => 'Lush Data Scraper',
                'slug' => 'lush-data-scraper',
                'tagline' => 'Giải pháp trích xuất dữ liệu thị trường & đối thủ cạnh tranh',
                'description' => 'Công cụ thu thập dữ liệu tự động từ các nền tảng thương mại điện tử, mạng xã hội và danh bạ doanh nghiệp. Cung cấp dữ liệu insight quý giá phục vụ nghiên cứu thị trường.',
                'content' => '<h2>Nắm bắt insight thị trường chính xác từng giây</h2><p>Lush Data Scraper giúp doanh nghiệp nghiên cứu giá bán đối thủ, thị hiếu khách hàng và danh sách khách hàng tiềm năng một cách nhanh chóng, chuẩn xác và hợp pháp.</p>',
                'version' => 'v2.2.1',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 8400,
                'order' => 4,
                'features' => [
                    ['title' => 'Quét Đa Nền Tảng', 'description' => 'Hỗ trợ trích xuất Shopee, Lazada, Google Maps, Facebook Directory.', 'icon' => 'globe'],
                    ['title' => 'Lọc Dữ Liệu Thông Minh', 'description' => 'Tự động chuẩn hóa số điện thoại, email, địa chỉ và loại bỏ trùng lặp.', 'icon' => 'filter'],
                    ['title' => 'Tốc Độ Quét Cao', 'description' => 'Cơ chế đa luồng Multi-threading xử lý hàng triệu bản ghi chỉ trong vài phút.', 'icon' => 'zap'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Bán Niên',
                        'price' => 2200000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Không giới hạn bản ghi quét', 'Cập nhật mẫu quét liên tục', 'Xuất file Excel / CSV tốc độ cao'],
                        'cta_text' => 'Đăng ký ngay',
                        'cta_link' => '/contact?product=lush-data-scraper',
                    ],
                ],
                'faqs' => [
                    ['question' => 'Dữ liệu quét về có chính xác không?', 'answer' => 'Dữ liệu được lấy trực tiếp theo thời gian thực từ các nguồn công khai nên độ chính xác đạt tới 99%.'],
                ],
            ],
            [
                'category_id' => $catMarketing->id,
                'name' => 'Lush Chatbot AI',
                'slug' => 'lush-chatbot-ai',
                'tagline' => 'Trợ lý ảo AI thông minh 24/7 phản hồi và chốt đơn tự động',
                'description' => 'Ứng dụng trí tuệ nhân tạo thế hệ mới (LLM) để hiểu sâu ngữ cảnh khách hàng, tư vấn sản phẩm và tạo đơn hàng tự động ngay trong khung chat mà không cần nhân viên can thiệp.',
                'content' => '<h2>Đột phá trải nghiệm khách hàng với Trợ lý AI</h2><p>Lush Chatbot AI học hiểu toàn bộ tài liệu sản phẩm và chính sách công ty của bạn chỉ trong 5 phút. Tự tin trả lời khách hàng mượt mà như một chuyên viên tư vấn hàng đầu.</p>',
                'version' => 'v1.5.0',
                'is_featured' => true,
                'status' => 'published',
                'view_count' => 15200,
                'order' => 5,
                'features' => [
                    ['title' => 'Hiểu Tiếng Việt Chuyên Sâu', 'description' => 'Nắm bắt tiếng lóng, từ địa phương và câu hỏi phức tạp tự nhiên.', 'icon' => 'cpu'],
                    ['title' => 'Chốt Đơn Tự Động', 'description' => 'Tự động tạo đơn hàng và đẩy thông tin vào hệ thống vận chuyển.', 'icon' => 'shopping-cart'],
                    ['title' => 'Huấn Luyện Nhanh Chóng', 'description' => 'Chỉ cần upload file PDF hoặc nhập link website, AI tự học ngay lập tức.', 'icon' => 'book-open'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Tăng Trưởng',
                        'price' => 4200000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Phản hồi không giới hạn lượt chat', 'Kết nối Fanpage + Website Widget', 'Huấn luyện AI với dữ liệu riêng', 'Hỗ trợ kỹ thuật 24/7'],
                        'cta_text' => 'Trải nghiệm AI',
                        'cta_link' => '/contact?product=lush-chatbot-ai',
                    ],
                ],
                'faqs' => [
                    ['question' => 'AI có bị nói sai hoặc bịa đặt thông tin không?', 'answer' => 'Lush Chatbot AI được trang bị cơ chế kiểm soát ngữ cảnh nghiêm ngặt (RAG), chỉ trả lời dựa trên kho tri thức chính xác mà bạn cung cấp.'],
                ],
            ],
            [
                'category_id' => $catMarketing->id,
                'name' => 'Lush Traffic Booster',
                'slug' => 'lush-traffic-booster',
                'tagline' => 'Tối ưu thứ hạng SEO & thúc đẩy lưu lượng truy cập thực',
                'description' => 'Hệ thống hỗ trợ kiểm toán website toàn diện, đề xuất từ khóa tiềm năng và theo dõi biến động thứ hạng từ khóa trên Google Search Console theo thời gian thực.',
                'content' => '<h2>Chinh phục vị trí top đầu công cụ tìm kiếm</h2><p>Phần mềm giúp chủ website và SEOer phát hiện ngay lập tức các lỗi kỹ thuật, liên kết gãy và cơ hội tối ưu nội dung chuẩn SEO để bùng nổ traffic tự nhiên.</p>',
                'version' => 'v2.1.0',
                'is_featured' => false,
                'status' => 'published',
                'view_count' => 6700,
                'order' => 6,
                'features' => [
                    ['title' => 'Audit Kỹ Thuật Tự Động', 'description' => 'Kiểm tra tốc độ Core Web Vitals, thẻ meta và cấu trúc dữ liệu schema.', 'icon' => 'activity'],
                    ['title' => 'Theo Dõi Thứ Hạng Realtime', 'description' => 'Cập nhật biến động từ khóa hàng ngày trên máy tính và điện thoại.', 'icon' => 'line-chart'],
                ],
                'pricings' => [
                    [
                        'plan_name' => 'Gói Chuyên Viên',
                        'price' => 1950000,
                        'currency' => '₫',
                        'billing_cycle' => 'yearly',
                        'is_popular' => true,
                        'features' => ['Theo dõi 500 từ khóa', 'Kiểm toán 5 website', 'Báo cáo tự động gửi email hàng tuần'],
                        'cta_text' => 'Sử dụng ngay',
                        'cta_link' => '/contact?product=lush-traffic-booster',
                    ],
                ],
                'faqs' => [
                    ['question' => 'Phần mềm có hỗ trợ theo dõi theo từng vị trí địa lý không?', 'answer' => 'Có, Lush Traffic Booster hỗ trợ kiểm tra thứ hạng theo tỉnh/thành phố cụ thể.'],
                ],
            ],
        ];

        foreach ($productsData as $prod) {
            $features = $prod['features'] ?? [];
            $pricings = $prod['pricings'] ?? [];
            $faqs = $prod['faqs'] ?? [];

            unset($prod['features'], $prod['pricings'], $prod['faqs']);

            // Multilingual translations for products
            $prod['translations'] = [
                'en' => [
                    'name' => $prod['name'],
                    'tagline' => 'Advanced automation and software ecosystem for scalable business growth.',
                    'description' => 'Empower your team with next-generation automation tools. High performance, zero setup friction, and enterprise-grade security.',
                ],
                'zh' => [
                    'name' => $prod['name'],
                    'tagline' => '助力企业高效增长的下一代软件与自动化生态系统。',
                    'description' => '通过行业领先的营销与客户关系自动化工具赋能业务，兼具顶级性能与企业级安全性。',
                ],
                'ko' => [
                    'name' => $prod['name'],
                    'tagline' => '비즈니스 확장을 위한 차세대 자동화 소프트웨어 솔루션.',
                    'description' => '고성능, 완벽한 보안, 손쉬운 사용성을 갖춘 종합 마케팅 및 CRM 자동화 플랫폼입니다.',
                ],
            ];

            $product = Product::updateOrCreate(['slug' => $prod['slug']], $prod);

            // Features
            foreach ($features as $idx => $feat) {
                ProductFeature::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'title' => $feat['title'],
                    ],
                    [
                        'description' => $feat['description'],
                        'icon' => $feat['icon'] ?? 'check-circle',
                        'order' => $idx + 1,
                    ]
                );
            }

            // Pricings
            foreach ($pricings as $idx => $price) {
                ProductPricing::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'plan_name' => $price['plan_name'],
                    ],
                    [
                        'price' => $price['price'],
                        'currency' => $price['currency'],
                        'billing_cycle' => $price['billing_cycle'],
                        'is_popular' => $price['is_popular'],
                        'features' => $price['features'],
                        'cta_text' => $price['cta_text'],
                        'cta_link' => $price['cta_link'],
                        'order' => $idx + 1,
                    ]
                );
            }

            // FAQs
            foreach ($faqs as $idx => $faq) {
                ProductFaq::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'question' => $faq['question'],
                    ],
                    [
                        'answer' => $faq['answer'],
                        'order' => $idx + 1,
                    ]
                );
            }
        }

        // 6. Article Categories
        $artCatNews = ArticleCategory::updateOrCreate(['slug' => 'tin-tuc-cong-nghe'], ['name' => 'Tin Tức Công Nghệ', 'order' => 1]);
        $artCatTips = ArticleCategory::updateOrCreate(['slug' => 'huong-dan-thu-thuat'], ['name' => 'Hướng Dẫn & Thủ Thuật', 'order' => 2]);
        $artCatStories = ArticleCategory::updateOrCreate(['slug' => 'cau-chuyen-thanh-cong'], ['name' => 'Câu Chuyện Khách Hàng', 'order' => 3]);

        // 7. Articles
        $articles = [
            [
                'category_id' => $artCatNews->id,
                'author_id' => $admin->id,
                'title' => 'Xu hướng tự động hóa tiếp thị năm 2026: Doanh nghiệp SME cần chuẩn bị những gì?',
                'slug' => 'xu-huong-tu-dong-hoa-tiep-thi-nam-2026',
                'excerpt' => 'Khám phá cách trí tuệ nhân tạo và các luồng tự động hóa đang tái định hình cách thức các doanh nghiệp tiếp cận và giữ chân khách hàng.',
                'content' => '<p>Trong bối cảnh chi phí quảng cáo trực tuyến ngày càng tăng cao, việc phụ thuộc hoàn toàn vào quảng cáo trả phí (Paid Ads) không còn là chiến lược bền vững. Năm 2026 đánh dấu bước chuyển mình mạnh mẽ sang các giải pháp tiếp thị dựa trên dữ liệu sở hữu (First-Party Data) và tự động hóa toàn chu trình.</p><h3>1. Cá nhân hóa trải nghiệm ở quy mô lớn</h3><p>Khách hàng không còn hào hứng với các mẫu tin nhắn chung chung. Họ mong muốn nhận được thông điệp giải quyết đúng bài toán họ đang gặp phải. Lush Marketing Pro hỗ trợ gắn thẻ hành vi tự động, giúp mỗi thông điệp gửi đi đều có tỷ lệ mở trên 45%.</p><h3>2. Hội tụ đa kênh trên một bảng điều khiển</h3><p>Đừng để đội ngũ của bạn lãng phí thời gian chuyển đổi qua lại giữa hàng chục tab trình duyệt. Việc tích hợp Zalo, Facebook, SMS và Email giúp phản hồi khách hàng trong chưa đầy 30 giây.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(2),
                'seo_title' => 'Xu hướng tự động hóa tiếp thị 2026 cho SME | LushSoftware',
                'seo_description' => 'Phân tích các xu hướng Marketing Automation nổi bật năm 2026 và phương pháp ứng dụng thực tế cho doanh nghiệp vừa và nhỏ.',
                'seo_keywords' => 'marketing automation 2026, tu dong hoa ban hang, lush software',
                'view_count' => 1540,
                'is_featured' => true,
            ],
            [
                'category_id' => $artCatTips->id,
                'author_id' => $admin->id,
                'title' => 'Bí quyết quản lý 100+ Fanpage Facebook hiệu quả mà không lo checkpoint',
                'slug' => 'bi-quyet-quan-ly-100-fanpage-facebook-khong-lo-checkpoint',
                'excerpt' => 'Chia sẻ phương pháp nuôi dàn tài khoản và fanpage an toàn với công nghệ mô phỏng hành vi người dùng thật trên Lush Social Hub.',
                'content' => '<p>Quản lý hệ thống fanpage vệ tinh là vũ khí lợi hại để chiếm lĩnh thị phần không mất tiền quảng cáo. Tuy nhiên, việc bị thuật toán quét và khóa hàng loạt luôn là nỗi ám ảnh. Dưới đây là các nguyên tắc cốt lõi bạn cần nắm vững:</p><h3>Nguyên tắc cách ly môi trường trình duyệt</h3><p>Mỗi tài khoản cần có một dấu vân tay trình duyệt (Fingerprint) và địa chỉ IP riêng biệt. Không bao giờ đăng nhập chéo giữa các profile nếu chưa qua hệ thống lọc an toàn của Lush Social Hub.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(5),
                'seo_title' => 'Bí quyết nuôi 100+ Fanpage Facebook an toàn | LushSoftware',
                'seo_description' => 'Hướng dẫn kỹ thuật quản lý đa fanpage, profile vệ tinh không bị khóa với Lush Social Hub.',
                'seo_keywords' => 'nuoi nick facebook, quan ly fanpage, lush social hub',
                'view_count' => 2890,
                'is_featured' => true,
            ],
            [
                'category_id' => $artCatStories->id,
                'author_id' => $admin->id,
                'title' => 'Chuỗi thời trang E-Style bứt phá 300% doanh số nhờ Lush CRM Enterprise như thế nào?',
                'slug' => 'chuoi-thoi-trang-e-style-but-pha-doanh-so-nho-lush-crm',
                'excerpt' => 'Hành trình số hóa quy trình chăm sóc khách hàng và giảm thiểu 80% tỷ lệ hủy đơn hàng của thương hiệu thời trang với hơn 20 cửa hàng.',
                'content' => '<p>Từ một chuỗi thời trang gặp khó khăn trong việc quản lý thông tin khách hàng phân tán giữa các chi nhánh, E-Style đã chuẩn hóa toàn bộ dữ liệu lên Lush CRM Enterprise và gặt hái kết quả kinh doanh vượt mong đợi.</p>',
                'status' => 'published',
                'published_at' => now()->subDays(10),
                'seo_title' => 'Case Study: Tăng 300% doanh số cùng Lush CRM | LushSoftware',
                'seo_description' => 'Câu chuyện thực tế thương hiệu thời trang tối ưu chuyển đổi và tái mua khách hàng với hệ thống Lush CRM Enterprise.',
                'seo_keywords' => 'case study crm, tang doanh so ban hang, lush software',
                'view_count' => 4320,
                'is_featured' => false,
            ],
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(['slug' => $art['slug']], $art);
        }

        // 8. Testimonials
        $testimonials = [
            [
                'name' => 'Trần Minh Hoàng',
                'position' => 'Giám đốc Marketing',
                'company' => 'TechGrowth Media',
                'avatar' => null,
                'content' => 'Lush Marketing Pro đã thực sự thay đổi cách đội ngũ của chúng tôi vận hành. Trước đây chúng tôi mất 4 tiếng mỗi ngày để xử lý dữ liệu và gửi thông điệp, giờ đây mọi thứ diễn ra tự động với độ chính xác tuyệt đối.',
                'rating' => 5,
                'order' => 1,
            ],
            [
                'name' => 'Nguyễn Bích Ngọc',
                'position' => 'Founder & CEO',
                'company' => 'Aura Cosmetics',
                'avatar' => null,
                'content' => 'Giao diện cực kỳ trực quan, sạch sẽ và chuyên nghiệp. Tôi ấn tượng nhất với tốc độ xử lý và sự nhiệt tình của đội ngũ hỗ trợ kỹ thuật LushSoftware. Đây chắc chắn là giải pháp tốt nhất trong tầm giá.',
                'rating' => 5,
                'order' => 2,
            ],
            [
                'name' => 'David Phạm',
                'position' => 'Trưởng phòng Kinh Doanh',
                'company' => 'Việt Á Real Estate',
                'avatar' => null,
                'content' => 'Hệ thống Lush CRM Enterprise giúp tỷ lệ chốt đơn của đội ngũ chúng tôi tăng hơn 40% trong quý vừa qua nhờ tính năng chia lead thông minh và theo dõi phễu bán hàng theo thời gian thực.',
                'rating' => 5,
                'order' => 3,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // 9. Partners
        $partners = [
            ['name' => 'VNPAY', 'logo' => null, 'website_url' => 'https://vnpay.vn', 'order' => 1],
            ['name' => 'FPT Cloud', 'logo' => null, 'website_url' => 'https://fptcloud.com', 'order' => 2],
            ['name' => 'Zalo Business', 'logo' => null, 'website_url' => 'https://oa.zalo.me', 'order' => 3],
            ['name' => 'Viettel Telecom', 'logo' => null, 'website_url' => 'https://vietteltelecom.vn', 'order' => 4],
            ['name' => 'VNPT Enterprise', 'logo' => null, 'website_url' => 'https://vnpt.com.vn', 'order' => 5],
        ];

        foreach ($partners as $p) {
            Partner::updateOrCreate(['name' => $p['name']], $p);
        }
    }
}
