@extends('layouts.admin')

@section('page_title', 'Cấu Hình Website LushSoftware')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Cấu Hình Chung Hệ Thống</h2>
        <p class="text-xs text-[#718096]">Quản lý thông tin thương hiệu, hotline, mạng xã hội, SEO và chỉ số thống kê</p>
    </div>

    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf

        <!-- 1. Brand & General Info -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">1. Thông Tin Thương Hiệu</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tên thương hiệu (Site Name)</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'LushSoftware') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Ngôn ngữ mặc định</label>
                    <select name="default_locale" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="vi" {{ ($settings['default_locale'] ?? 'vi') === 'vi' ? 'selected' : '' }}>Tiếng Việt (vi)</option>
                        <option value="en" {{ ($settings['default_locale'] ?? '') === 'en' ? 'selected' : '' }}>English (en)</option>
                        <option value="zh" {{ ($settings['default_locale'] ?? '') === 'zh' ? 'selected' : '' }}>中文 (zh)</option>
                        <option value="ko" {{ ($settings['default_locale'] ?? '') === 'ko' ? 'selected' : '' }}>한국어 (ko)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Khẩu hiệu (Tagline)</label>
                <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
        </div>

        <!-- 2. Contact & Address -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">2. Thông Tin Liên Hệ & Hotline</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Hotline 24/7</label>
                    <input type="text" name="contact_hotline" value="{{ old('contact_hotline', $settings['contact_hotline'] ?? '1900 886 996') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Email liên hệ</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? 'contact@lushsoftware.vn') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Số điện thoại kỹ thuật</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '+84 988 123 456') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thời gian làm việc</label>
                    <input type="text" name="working_hours" value="{{ old('working_hours', $settings['working_hours'] ?? 'Thứ 2 - Thứ 7: 08:00 - 18:00') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Địa chỉ trụ sở</label>
                <input type="text" name="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
        </div>

        <!-- 3. Social Media Links -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">3. Kênh Mạng Xã Hội</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Kênh Telegram</label>
                    <input type="url" name="social_telegram" value="{{ old('social_telegram', $settings['social_telegram'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Trang Facebook</label>
                    <input type="url" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Kênh YouTube</label>
                    <input type="url" name="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Kho mã nguồn GitHub</label>
                    <input type="url" name="social_github" value="{{ old('social_github', $settings['social_github'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>
        </div>

        <!-- 4. Statistics Counters -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">4. Các Con Số Thống Kê (Hiển thị trang chủ)</h3>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Khách hàng</label>
                    <input type="text" name="stat_clients" value="{{ old('stat_clients', $settings['stat_clients'] ?? '15,000+') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Số sản phẩm</label>
                    <input type="text" name="stat_products" value="{{ old('stat_products', $settings['stat_products'] ?? '12+') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Người dùng</label>
                    <input type="text" name="stat_users" value="{{ old('stat_users', $settings['stat_users'] ?? '50,000+') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Năm hoạt động</label>
                    <input type="text" name="stat_years" value="{{ old('stat_years', $settings['stat_years'] ?? '6+') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>
        </div>

        <!-- 5. Default SEO & Webmaster Suite -->
        <div class="lush-card p-6 sm:p-8 space-y-5 border border-[#168BD2]/30">
            <div class="flex items-center justify-between border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <h3 class="text-sm font-bold text-[#172B3A] dark:text-white uppercase tracking-wider">5. Cấu Hình SEO & Bộ Công Cụ Webmaster Google / Bing</h3>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="text-[11px] font-bold text-[#168BD2] hover:underline">Sitemap XML &rarr;</a>
                    <span class="text-[#CBD5E1]">|</span>
                    <a href="{{ url('/robots.txt') }}" target="_blank" class="text-[11px] font-bold text-[#718096] hover:underline">Robots.txt &rarr;</a>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Meta Title Mặc Định (Toàn trang)</label>
                <input type="text" name="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Meta Description Mặc Định</label>
                <textarea name="meta_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Meta Keywords Mặc Định</label>
                <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>

            <!-- Webmaster & Analytics Keys Grid -->
            <div class="pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-4">
                <span class="text-xs font-bold text-[#168BD2] block">Mã Xác Minh Webmaster & Đo Lường Tiếp Thị:</span>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Google Search Console Verification Tag</label>
                        <input type="text" name="google_search_console_code" value="{{ old('google_search_console_code', $settings['google_search_console_code'] ?? '') }}" placeholder="google-site-verification=xxxx..." class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs font-mono focus:outline-none focus:border-[#168BD2]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Bing Webmaster Tools Code</label>
                        <input type="text" name="bing_webmaster_code" value="{{ old('bing_webmaster_code', $settings['bing_webmaster_code'] ?? '') }}" placeholder="Mã định danh Bing Webmaster..." class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs font-mono focus:outline-none focus:border-[#168BD2]">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Google Analytics 4 (GA4 ID)</label>
                        <input type="text" name="google_analytics_id" value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? '') }}" placeholder="G-XXXXXXXXXX" class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs font-mono focus:outline-none focus:border-[#168BD2]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Google Tag Manager (GTM ID)</label>
                        <input type="text" name="google_tag_manager_id" value="{{ old('google_tag_manager_id', $settings['google_tag_manager_id'] ?? '') }}" placeholder="GTM-XXXXXXX" class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs font-mono focus:outline-none focus:border-[#168BD2]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Facebook Pixel ID</label>
                        <input type="text" name="facebook_pixel_id" value="{{ old('facebook_pixel_id', $settings['facebook_pixel_id'] ?? '') }}" placeholder="1234567890..." class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs font-mono focus:outline-none focus:border-[#168BD2]">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="lush-btn-primary !text-xs !py-3 !px-6">
                Lưu Cấu Hình Toàn Bộ
            </button>
        </div>
    </form>

    <!-- 6. System Cache & Maintenance -->
    <div class="lush-card p-6 sm:p-8 space-y-4 border border-rose-100 dark:border-rose-950/40">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    6. Bảo Trì & Xóa Bộ Nhớ Đệm (System Cache)
                </h3>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mt-1">
                    Xóa sạch view compiled, cache cấu hình và route để cập nhật tức thì mọi thay đổi giao diện và đa ngôn ngữ.
                </p>
            </div>
            <form method="POST" action="{{ route('admin.settings.clear-cache') }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa toàn bộ bộ nhớ đệm hệ thống không?');">
                @csrf
                <button type="submit" class="lush-btn-secondary !text-xs !py-2.5 !px-5 text-rose-600 hover:text-rose-700 hover:border-rose-400">
                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Xóa Cache Hệ Thống
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

