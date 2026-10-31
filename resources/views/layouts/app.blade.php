<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', \App\Models\WebsiteSetting::get('meta_title', 'LushSoftware – Giải pháp phần mềm Marketing & SaaS hàng đầu'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\WebsiteSetting::get('meta_description', 'Hệ sinh thái công nghệ tự động hóa Marketing, CRM và tối ưu vận hành doanh nghiệp.'))">
    <meta name="keywords" content="@yield('meta_keywords', \App\Models\WebsiteSetting::get('meta_keywords', 'lush software, phan mem marketing, crm'))">

    <!-- Canonical & Alternate Hreflang for SEO -->
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="alternate" hreflang="vi" href="{{ url()->current() }}?lang=vi">
    <link rel="alternate" hreflang="en" href="{{ url()->current() }}?lang=en">
    <link rel="alternate" hreflang="zh" href="{{ url()->current() }}?lang=zh">
    <link rel="alternate" hreflang="ko" href="{{ url()->current() }}?lang=ko">
    <link rel="alternate" hreflang="x-default" href="{{ url()->current() }}">

    <!-- Favicon & Touch Icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Open Graph / Facebook / Twitter -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'LushSoftware – Nền tảng phần mềm SaaS')">
    <meta property="og:description" content="@yield('meta_description', 'Tự động hóa tiếp thị, quản trị quan hệ khách hàng và mở rộng kinh doanh.')">
    <meta property="og:image" content="{{ asset('images/banner.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="{{ asset('images/banner.png') }}">

    <!-- Schema.org JSON-LD Structured Data for Google -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "LushSoftware",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo.png') }}",
      "description": "Nền tảng phần mềm SaaS & Tự động hóa tiếp thị doanh nghiệp.",
      "telephone": "{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}",
      "email": "{{ \App\Models\WebsiteSetting::get('contact_email', 'contact@lushsoftware.vn') }}",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Tầng 18, Tòa nhà Lush Tower",
        "addressLocality": "Cầu Giấy, Hà Nội",
        "addressCountry": "VN"
      },
      "sameAs": [
        "{{ \App\Models\WebsiteSetting::get('social_facebook', 'https://facebook.com/lushsoftware') }}",
        "{{ \App\Models\WebsiteSetting::get('social_telegram', 'https://t.me/lushsoftware_official') }}",
        "{{ \App\Models\WebsiteSetting::get('social_youtube', 'https://youtube.com/@lushsoftware') }}"
      ]
    }
    </script>
    @stack('schema')

    <!-- Script to prevent Dark Mode flicker on initial load -->
    <script>
        (function() {
            try {
                var theme = localStorage.getItem('lush_theme');
                if (theme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } catch (e) {}
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-[#172B3A] dark:bg-[#0B1118] dark:text-[#F8FAFC] antialiased flex flex-col min-h-screen">
    <!-- Top Progress Bar -->
    <div id="page-progress-bar"></div>

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-5 right-5 z-50 flex flex-col gap-2 max-w-sm w-full pointer-events-none *:pointer-events-auto"></div>

    <!-- Main Floating Island Header (Luxury SaaS & Glassmorphism Design) -->
    <header id="main-header" class="sticky top-2.5 sm:top-3.5 z-40 w-full transition-all duration-300 px-3 sm:px-5 lg:px-7">
        <div id="nav-capsule" class="w-full max-w-[1420px] mx-auto bg-white/90 dark:bg-[#0B1118]/90 backdrop-blur-2xl rounded-2xl lg:rounded-full border border-white/80 dark:border-white/10 ring-1 ring-black/[0.04] dark:ring-white/[0.05] shadow-[0_16px_40px_-10px_rgba(22,139,210,0.12),0_2px_8px_rgba(0,0,0,0.03)] dark:shadow-[0_20px_50px_-10px_rgba(0,0,0,0.7)] px-3 sm:px-4 lg:px-5 xl:px-6 h-[66px] flex items-center justify-between gap-1.5 sm:gap-2.5 lg:gap-3 transition-all duration-300 relative">
            <!-- Ambient Top Specular Hairline Highlight -->
            <div class="absolute inset-x-8 top-0 h-[1.5px] bg-gradient-to-r from-transparent via-[#168BD2]/40 dark:via-[#38BDF8]/30 to-transparent pointer-events-none rounded-t-full"></div>
            <!-- Ambient Bottom Soft Glow -->
            <div class="absolute inset-x-12 -bottom-2 h-4 bg-gradient-to-r from-transparent via-[#168BD2]/10 to-transparent blur-md pointer-events-none -z-10"></div>

            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
                <div class="relative flex items-center justify-center w-9.5 h-9.5 sm:w-10 sm:h-10 rounded-2xl overflow-hidden bg-gradient-to-br from-white to-[#F0F8FF] dark:from-[#131D27] dark:to-[#0B1118] shadow-[0_4px_12px_rgba(22,139,210,0.18)] border border-[#E8EDF2] dark:border-white/10 group-hover:scale-105 group-hover:border-[#168BD2]/40 group-hover:shadow-[0_6px_20px_rgba(22,139,210,0.3)] transition-all duration-300">
                    <img src="{{ asset('images/logo.png') }}" alt="LushSoftware" class="w-full h-full object-cover">
                    <!-- Subtle Gloss Sheen Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/20 to-white/50 dark:via-white/5 dark:to-white/10 pointer-events-none"></div>
                </div>
                <div class="flex flex-col">
                    <span class="text-[16px] sm:text-[17px] font-black tracking-tight text-[#0F172A] dark:text-white flex items-center gap-0.5 leading-none">
                        Lush<span class="bg-gradient-to-r from-[#168BD2] via-[#2094DB] to-[#48B4E5] bg-clip-text text-transparent">Software</span>
                    </span>
                    <div class="flex items-center gap-1.5 mt-1">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500 shadow-[0_0_6px_#10B981]"></span>
                        </span>
                        <span class="text-[9px] sm:text-[9.5px] font-black tracking-[0.18em] uppercase text-[#718096] dark:text-[#94A3B8]">ECOSYSTEM</span>
                    </div>
                </div>
            </a>

            <!-- Desktop Navigation Dock (High-End Segmented Glass Dock) -->
            <nav class="hidden lg:flex items-center gap-0.5 xl:gap-1 bg-[#F8FAFC]/85 dark:bg-[#101923]/85 backdrop-blur-md p-1 rounded-full border border-[#E2E8F0]/80 dark:border-white/10 shadow-[inset_0_1px_3px_rgba(0,0,0,0.03)] text-[12.5px] xl:text-[13px] font-semibold">
                <a href="{{ route('home') }}" class="px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('home') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('home'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('Home') }}</span>
                </a>

                <!-- Products Mega Menu Dropdown with Smooth Hover Bridge -->
                <div class="relative group">
                    <a href="{{ route('products.index') }}" class="px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('products.*') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                        @if(request()->routeIs('products.*'))
                            <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                        @endif
                        <span>{{ __('Products') }}</span>
                        <svg class="w-3 h-3 text-[#718096] group-hover:text-[#168BD2] group-hover:rotate-180 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    
                    <!-- Mega Menu Flyout Panel with Invisible Padding Bridge -->
                    <div class="absolute left-1/2 -translate-x-[26%] xl:-translate-x-[30%] top-full pt-3 w-[880px] xl:w-[940px] max-w-[95vw] opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 z-50">
                        <div class="bg-white/98 dark:bg-[#111A24]/98 backdrop-blur-3xl rounded-3xl shadow-[0_25px_70px_rgba(22,139,210,0.18),0_2px_10px_rgba(0,0,0,0.04)] border border-[#E8EDF2] dark:border-[#1E2D3D] p-6 overflow-hidden">
                            <!-- Top Header Banner -->
                            <div class="flex items-center justify-between pb-3.5 mb-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div class="flex items-center gap-2.5">
                                    <span class="relative flex h-2.5 w-2.5">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-[#168BD2]"></span>
                                    </span>
                                    <span class="text-xs font-black uppercase tracking-wider text-[#172B3A] dark:text-white">
                                        HỆ SINH THÁI PHẦN MỀM LUSH ENTERPRISE
                                    </span>
                                    <span class="text-[10px] font-black px-2 py-0.5 rounded-full bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                                        6 CÔNG CỤ CHỦ LỰC
                                    </span>
                                </div>
                                <div class="flex items-center gap-3 text-xs text-[#718096]">
                                    <span class="hidden sm:inline">Bản quyền chính hãng 2026</span>
                                    <span class="w-1 h-1 rounded-full bg-[#718096]"></span>
                                    <span class="text-emerald-600 dark:text-emerald-400 font-semibold">Cập nhật v2.4</span>
                                </div>
                            </div>

                            <!-- Mega Menu 2-Column Grid (Main Software Tools + Right Spotlight Card) -->
                            <div class="grid grid-cols-12 gap-5">
                                <!-- Left Column: 6 Flagship Software Cards (8 Cols) -->
                                <div class="col-span-12 lg:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <!-- 1. LushCare -->
                                    <a href="{{ route('products.show', 'lush-marketing-pro') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushCare</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-rose-500/10 text-rose-600 border border-rose-200 dark:border-rose-900/50">HOT</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Phần mềm nuôi nick & chăm sóc tài khoản mạng xã hội tự động.</p>
                                        </div>
                                    </a>

                                    <!-- 2. LushLogin -->
                                    <a href="{{ route('products.show', 'lush-social-hub') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushLogin</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">PRO</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Quản trị hàng nghìn tài khoản & profile Chrome an toàn, kháng checkpoint.</p>
                                        </div>
                                    </a>

                                    <!-- 3. LushCRM -->
                                    <a href="{{ route('products.show', 'lush-crm-enterprise') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushCRM</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-amber-500/10 text-amber-600 border border-amber-300 dark:border-amber-900/50">SUITE</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Quản trị toàn diện phễu khách hàng & tối ưu doanh số sales chuyên sâu.</p>
                                        </div>
                                    </a>

                                    <!-- 4. LushZalo -->
                                    <a href="{{ route('products.show', 'lush-data-scraper') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushZalo</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-emerald-500/10 text-emerald-600 border border-emerald-300 dark:border-emerald-900/50">AI</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Tiếp thị tự động, gửi tin nhắn & kéo nhóm cộng đồng Zalo thần tốc.</p>
                                        </div>
                                    </a>

                                    <!-- 5. LushChat -->
                                    <a href="{{ route('products.show', 'lush-chatbot-ai') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushChat</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-indigo-500/10 text-indigo-600 border border-indigo-200 dark:border-indigo-900/50">BOT</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Hội tụ tin nhắn đa kênh & Trợ lý AI tự động phản hồi chốt đơn 24/7.</p>
                                        </div>
                                    </a>

                                    <!-- 6. LushShopee -->
                                    <a href="{{ route('products.show', 'lush-traffic-booster') }}" class="flex items-start gap-3.5 p-3 rounded-2xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-all group/item border border-transparent hover:border-[#168BD2]/25 hover:shadow-xs">
                                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-all shadow-2xs group-hover/item:scale-105">
                                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center gap-1.5 flex-wrap">
                                                <h4 class="text-[13.5px] font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors leading-tight">LushShopee</h4>
                                                <span class="text-[9px] font-black px-1.5 py-0.2 rounded-full bg-cyan-500/10 text-cyan-700 border border-cyan-200 dark:border-cyan-900/50">VIRAL</span>
                                            </div>
                                            <p class="text-[11.5px] text-[#718096] dark:text-[#94A3B8] leading-snug mt-1 line-clamp-2">Tự động hóa bán hàng & bứt phá lưu lượng, đơn hàng Shopee bùng nổ.</p>
                                        </div>
                                    </a>
                                </div>

                                <!-- Right Column: Featured Spotlight Card (4 Cols) -->
                                <div class="col-span-12 lg:col-span-4 bg-gradient-to-br from-[#F0F8FF] via-[#E8F4FC] to-[#DEF0FA] dark:from-[#132232] dark:to-[#172B3E] rounded-2xl p-5 border border-[#168BD2]/30 flex flex-col justify-between shadow-2xs">
                                    <div>
                                        <div class="flex items-center gap-2 mb-2.5">
                                            <span class="text-[10px] font-black uppercase tracking-wider px-2 py-0.5 rounded-full bg-[#168BD2] text-white shadow-2xs">
                                                ✨ SUITE TOÀN DIỆN
                                            </span>
                                            <span class="text-[11px] font-bold text-[#168BD2]">All-in-One</span>
                                        </div>
                                        <h3 class="text-sm font-bold text-[#172B3A] dark:text-white leading-snug">
                                            Bộ Giải Pháp Tăng Trưởng Doanh Nghiệp 2026
                                        </h3>
                                        <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed mt-2">
                                            Tích hợp trọn bộ công cụ tự động hóa, marketing & quản trị phễu khách hàng không giới hạn.
                                        </p>

                                        <div class="mt-4 space-y-2 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                <span>Bảo hành & nâng cấp tính năng trọn đời</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                <span>Đội ngũ kỹ thuật hỗ trợ UltraViewer 24/7</span>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                <span>Tương thích Windows, macOS & Cloud</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 pt-4 border-t border-[#168BD2]/20">
                                        <a href="{{ route('pricing.index') }}" class="w-full h-9 rounded-xl bg-gradient-to-r from-[#168BD2] to-[#0878BD] hover:from-[#0878BD] hover:to-[#066199] text-white text-xs font-bold shadow-md shadow-[#168BD2]/30 flex items-center justify-center gap-1.5 transition-all hover:scale-[1.02]">
                                            <span>Xem Bảng Giá Ưu Đãi</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Mega Menu Bottom Action Strip -->
                            <div class="mt-4 pt-3.5 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-col sm:flex-row items-center justify-between gap-3 text-xs">
                                <a href="{{ route('products.index') }}" class="text-[#168BD2] font-bold hover:underline flex items-center gap-1.5 group/all">
                                    <span class="text-[13px]">Khám phá tất cả giải pháp phần mềm chuyên sâu</span>
                                    <svg class="w-4 h-4 group-hover/all:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                                <div class="flex items-center gap-2 text-[11px] text-[#718096] dark:text-[#94A3B8]">
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1E2D3D] border border-[#E8EDF2] dark:border-[#2D3F52] font-semibold">Windows 10/11</span>
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1E2D3D] border border-[#E8EDF2] dark:border-[#2D3F52] font-semibold">macOS M1/M2/M3</span>
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1E2D3D] border border-[#E8EDF2] dark:border-[#2D3F52] font-semibold">Cloud SaaS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('solutions.index') }}" class="px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('solutions.*') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('solutions.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('Solutions') }}</span>
                </a>

                <a href="{{ route('pricing.index') }}" class="px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('pricing.*') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('pricing.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('Pricing') }}</span>
                </a>

                <a href="{{ route('downloads.index') }}" class="px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1.5 {{ request()->routeIs('downloads.*') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('downloads.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('Download') }}</span>
                </a>

                <!-- News Link (Visible on xl+) -->
                <a href="{{ route('articles.index') }}" class="hidden xl:flex px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 items-center gap-1.5 {{ request()->routeIs('articles.*') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('articles.*'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('News') }}</span>
                </a>

                <!-- About Link (Visible on 2xl+) -->
                <a href="{{ route('about') }}" class="hidden 2xl:flex px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 items-center gap-1.5 {{ request()->routeIs('about') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('about'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('About Us') }}</span>
                </a>

                <!-- Contact Link (Visible on 2xl+) -->
                <a href="{{ route('contact') }}" class="hidden 2xl:flex px-2.5 xl:px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 items-center gap-1.5 {{ request()->routeIs('contact') ? 'bg-white dark:bg-[#1E293B] text-[#168BD2] dark:text-[#38BDF8] shadow-[0_2px_8px_rgba(0,0,0,0.06),0_1px_2px_rgba(0,0,0,0.04)] font-bold border border-[#E2E8F0]/70 dark:border-white/10' : 'text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5' }}">
                    @if(request()->routeIs('contact'))
                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] dark:bg-[#38BDF8] shadow-[0_0_6px_#168BD2]"></span>
                    @endif
                    <span>{{ __('Contact') }}</span>
                </a>

                <!-- More Dropdown for Compact Screens (< 2xl) -->
                <div class="relative group 2xl:hidden">
                    <button type="button" class="px-2.5 py-1.5 rounded-full whitespace-nowrap transition-all duration-200 flex items-center gap-1 text-[#475569] dark:text-[#94A3B8] hover:text-[#0F172A] dark:hover:text-white hover:bg-white/80 dark:hover:bg-white/5 cursor-pointer text-xs font-semibold">
                        <span>{{ __('More') }}</span>
                        <svg class="w-3 h-3 text-[#718096] group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute right-0 top-full pt-2 w-44 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                        <div class="p-1.5 bg-white/98 dark:bg-[#131D27]/98 backdrop-blur-2xl rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] border border-[#E8EDF2] dark:border-white/10 text-xs font-semibold">
                            <a href="{{ route('articles.index') }}" class="xl:hidden flex items-center gap-2 px-3 py-2 rounded-xl text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ request()->routeIs('articles.*') ? 'text-[#168BD2] font-bold' : '' }}">
                                <span>{{ __('News') }}</span>
                            </a>
                            <a href="{{ route('about') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ request()->routeIs('about') ? 'text-[#168BD2] font-bold' : '' }}">
                                <span>{{ __('About Us') }}</span>
                            </a>
                            <a href="{{ route('contact') }}" class="flex items-center gap-2 px-3 py-2 rounded-xl text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ request()->routeIs('contact') ? 'text-[#168BD2] font-bold' : '' }}">
                                <span>{{ __('Contact') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Header Right Controls (Precision Aligned h-9 Dock) -->
            <div class="flex items-center gap-1 sm:gap-1.5 xl:gap-2 shrink-0">
                <!-- Global Spotlight Search Trigger (Command Palette Pill) -->
                <button type="button" id="spotlight-search-btn" class="h-9 px-2.5 sm:px-3 2xl:px-3.5 rounded-full border border-[#E2E8F0] dark:border-white/10 bg-[#F8FAFC]/85 dark:bg-[#101923]/85 hover:bg-white dark:hover:bg-[#15202B] hover:border-[#168BD2]/50 hover:shadow-[0_0_15px_rgba(22,139,210,0.12)] text-[#64748B] dark:text-[#94A3B8] transition-all flex items-center gap-2 group cursor-pointer shadow-2xs focus:outline-none focus-visible:outline-none focus:ring-0 active:outline-none shrink-0" title="Tìm kiếm phần mềm & tin tức (Ctrl+K)">
                    <svg class="w-3.5 h-3.5 text-[#168BD2] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden 2xl:inline text-xs font-semibold text-[#5A6E85] dark:text-[#94A3B8] group-hover:text-[#172B3A] dark:group-hover:text-white transition-colors whitespace-nowrap">Tìm kiếm</span>
                    <kbd class="hidden sm:inline-flex items-center px-1.5 py-0.5 text-[10px] font-mono font-bold text-[#64748B] dark:text-[#94A3B8] bg-white dark:bg-[#1E293B] border border-[#E2E8F0] dark:border-white/10 rounded-md shadow-2xs group-hover:border-[#168BD2]/40">Ctrl K</kbd>
                </button>

                <!-- Language Selector Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button type="button" class="h-9 px-2 sm:px-2.5 xl:px-3 rounded-full border border-[#E2E8F0] dark:border-white/10 bg-[#F8FAFC]/85 dark:bg-[#101923]/85 hover:bg-white dark:hover:bg-[#15202B] text-xs font-bold text-[#172B3A] dark:text-white hover:border-[#168BD2]/50 transition-all flex items-center gap-1.5 sm:gap-2 shadow-2xs cursor-pointer focus:outline-none focus-visible:outline-none focus:ring-0 active:outline-none shrink-0" title="{{ __('Language') }}">
                        <x-flag :country="app()->getLocale()" class="w-5 h-3.5" />
                        <span class="uppercase tracking-wider text-[11px] font-black text-[#172B3A] dark:text-white">{{ app()->getLocale() }}</span>
                        <svg class="w-3 h-3 text-[#718096] group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 top-full pt-2 w-56 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 z-50">
                        <div class="p-1.5 bg-white/98 dark:bg-[#131D27]/98 backdrop-blur-2xl rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.15)] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <div class="px-3 py-1.5 text-[10px] uppercase font-black tracking-wider text-[#718096] dark:text-[#94A3B8] border-b border-[#E8EDF2]/80 dark:border-[#1E2D3D]/80 mb-1 flex items-center justify-between">
                                <span>{{ __('Language') }}</span>
                                <span class="text-[9px] font-bold text-[#168BD2]">4 REGIONS</span>
                            </div>

                            <!-- Vietnamese -->
                            <a href="{{ route('locale.switch', 'vi') }}" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold transition-all group/lang {{ app()->getLocale() === 'vi' ? 'bg-[#168BD2]/10 text-[#168BD2] font-bold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]' }}">
                                <div class="flex items-center gap-2.5">
                                    <x-flag country="vi" class="w-5 h-3.5 group-hover/lang:scale-110 transition-transform" />
                                    <div class="flex flex-col text-left">
                                        <span class="leading-tight">Tiếng Việt</span>
                                        <span class="text-[10px] text-[#718096] font-normal leading-tight">Việt Nam</span>
                                    </div>
                                </div>
                                @if(app()->getLocale() === 'vi')
                                    <div class="w-5 h-5 rounded-full bg-[#168BD2] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                @endif
                            </a>

                            <!-- English -->
                            <a href="{{ route('locale.switch', 'en') }}" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold transition-all group/lang {{ app()->getLocale() === 'en' ? 'bg-[#168BD2]/10 text-[#168BD2] font-bold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]' }}">
                                <div class="flex items-center gap-2.5">
                                    <x-flag country="en" class="w-5 h-3.5 group-hover/lang:scale-110 transition-transform" />
                                    <div class="flex flex-col text-left">
                                        <span class="leading-tight">English</span>
                                        <span class="text-[10px] text-[#718096] font-normal leading-tight">United States / Global</span>
                                    </div>
                                </div>
                                @if(app()->getLocale() === 'en')
                                    <div class="w-5 h-5 rounded-full bg-[#168BD2] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                @endif
                            </a>

                            <!-- Chinese -->
                            <a href="{{ route('locale.switch', 'zh') }}" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold transition-all group/lang {{ app()->getLocale() === 'zh' ? 'bg-[#168BD2]/10 text-[#168BD2] font-bold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]' }}">
                                <div class="flex items-center gap-2.5">
                                    <x-flag country="zh" class="w-5 h-3.5 group-hover/lang:scale-110 transition-transform" />
                                    <div class="flex flex-col text-left">
                                        <span class="leading-tight">中文</span>
                                        <span class="text-[10px] text-[#718096] font-normal leading-tight">简体中文 / China</span>
                                    </div>
                                </div>
                                @if(app()->getLocale() === 'zh')
                                    <div class="w-5 h-5 rounded-full bg-[#168BD2] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                @endif
                            </a>

                            <!-- Korean -->
                            <a href="{{ route('locale.switch', 'ko') }}" class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-semibold transition-all group/lang {{ app()->getLocale() === 'ko' ? 'bg-[#168BD2]/10 text-[#168BD2] font-bold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]' }}">
                                <div class="flex items-center gap-2.5">
                                    <x-flag country="ko" class="w-5 h-3.5 group-hover/lang:scale-110 transition-transform" />
                                    <div class="flex flex-col text-left">
                                        <span class="leading-tight">한국어</span>
                                        <span class="text-[10px] text-[#718096] font-normal leading-tight">대한민국 / Korea</span>
                                    </div>
                                </div>
                                @if(app()->getLocale() === 'ko')
                                    <div class="w-5 h-5 rounded-full bg-[#168BD2] text-white flex items-center justify-center shrink-0 shadow-2xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Luxury Mechanical Theme Toggle Switch (Desktop) -->
                <div class="relative flex items-center shrink-0">
                    <button type="button" id="theme-toggle-desktop" class="theme-toggle-btn w-[54px] sm:w-[58px] h-8 p-[3px] rounded-full bg-[#E2E8F0] hover:bg-[#CBD5E1] dark:bg-[#1E293B] dark:hover:bg-[#28384D] border border-[#CBD5E1]/80 dark:border-white/10 transition-all duration-300 focus:outline-none focus-visible:outline-none focus:ring-0 active:outline-none cursor-pointer relative shrink-0 flex items-center shadow-[inset_0_2px_4px_rgba(0,0,0,0.06)]" title="{{ __('Light Mode') }} / {{ __('Dark Mode') }}" aria-label="Đổi giao diện Sáng / Tối">
                        <!-- Background Track Sub-Icons -->
                        <div class="absolute inset-x-2 flex items-center justify-between pointer-events-none text-[#718096] dark:text-[#64748B]">
                            <!-- Ambient Sun in Track -->
                            <svg class="w-3.5 h-3.5 text-amber-500/70" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
                            </svg>
                            <!-- Ambient Moon in Track -->
                            <svg class="w-3 h-3 text-[#38BDF8]/70" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
                            </svg>
                        </div>

                        <!-- Sliding Thumb Capsule with Micro-Glow Icon -->
                        <span class="w-[26px] h-[26px] rounded-full bg-white dark:bg-[#0B1118] shadow-[0_2px_6px_rgba(0,0,0,0.18),0_1px_2px_rgba(0,0,0,0.08)] border border-black/[0.04] dark:border-white/10 flex items-center justify-center transition-transform duration-300 ease-out transform translate-x-0 dark:translate-x-[22px] sm:dark:translate-x-[26px] pointer-events-none relative z-10">
                            <!-- Active Sun Icon (Light Mode) -->
                            <svg class="w-3.5 h-3.5 block dark:hidden text-amber-500 drop-shadow-[0_0_4px_rgba(245,158,11,0.5)]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
                            </svg>
                            <!-- Active Moon Icon (Dark Mode) -->
                            <svg class="w-3.5 h-3.5 hidden dark:block text-[#38BDF8] drop-shadow-[0_0_6px_rgba(56,189,248,0.7)]" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Subtle Vertical Hairline Divider -->
                <div class="hidden sm:block h-5 w-px bg-gradient-to-b from-transparent via-[#E2E8F0] dark:via-white/10 to-transparent mx-0.5 shrink-0"></div>

                <!-- Auth Buttons / User Profile (Desktop) -->
                <div class="hidden sm:flex items-center gap-1.5 shrink-0">
                    @auth
                        <div class="relative group">
                            <button type="button" class="h-9 pl-1.5 pr-2 sm:pr-2.5 xl:pr-3 rounded-full border border-[#E2E8F0] dark:border-white/10 bg-[#F8FAFC]/85 dark:bg-[#101923]/85 hover:bg-white dark:hover:bg-[#15202B] hover:border-[#168BD2]/50 transition-all flex items-center gap-1.5 sm:gap-2 cursor-pointer shadow-2xs group focus:outline-none focus-visible:outline-none focus:ring-0 active:outline-none shrink-0">
                                <div class="relative">
                                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-6.5 h-6.5 rounded-full object-cover ring-2 ring-[#168BD2]/30">
                                    <span class="absolute -bottom-0.5 -right-0.5 w-2 h-2 rounded-full bg-emerald-500 ring-1 ring-white dark:ring-[#101923] shadow-[0_0_4px_#10B981]"></span>
                                </div>
                                <span class="hidden md:inline-block max-w-[70px] lg:max-w-[85px] xl:max-w-[110px] truncate text-xs font-bold text-[#172B3A] dark:text-white">{{ auth()->user()->name }}</span>
                                @if(auth()->user()->canAccessAdmin())
                                    <span class="hidden 2xl:inline-block text-[9px] font-black uppercase tracking-wider px-2 py-0.5 rounded-full bg-[#168BD2]/10 dark:bg-[#168BD2]/20 text-[#168BD2] dark:text-[#38BDF8] border border-[#168BD2]/20">ADMIN</span>
                                @endif
                                <svg class="w-3 h-3 text-[#718096] group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <!-- User Dropdown Menu -->
                            <div class="absolute right-0 top-full pt-2 w-56 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                                <div class="py-2 bg-white/98 dark:bg-[#131D27]/98 backdrop-blur-2xl rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.12)] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                    <div class="px-4 py-2.5 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                        <p class="text-xs font-bold text-[#172B3A] dark:text-white truncate">{{ auth()->user()->name }}</p>
                                        <p class="text-[10px] text-[#718096] truncate mt-0.5">{{ auth()->user()->email }}</p>
                                    </div>
                                    @if(auth()->user()->canAccessAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold text-[#168BD2] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                                            <div class="w-6 h-6 rounded-lg bg-[#168BD2]/10 flex items-center justify-center text-[#168BD2]">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                            </div>
                                            <span>{{ __('Dashboard Quản Trị') }}</span>
                                        </a>
                                    @endif
                                    <a href="{{ route('profile') }}" class="flex items-center gap-2.5 px-4 py-2 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                                        <div class="w-6 h-6 rounded-lg bg-[#F8FAFC] dark:bg-[#1E2D3D] flex items-center justify-center text-[#718096]">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        </div>
                                        <span>{{ __('Profile') }}</span>
                                    </a>
                                    <div class="border-t border-[#E8EDF2] dark:border-[#1E2D3D] my-1.5"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left flex items-center gap-2.5 px-4 py-2 text-xs text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/30 font-semibold transition-colors">
                                            <div class="w-6 h-6 rounded-lg bg-rose-500/10 flex items-center justify-center text-rose-500">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            </div>
                                            <span>{{ __('Sign Out') }}</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="h-9 px-3.5 text-xs font-bold text-[#475569] dark:text-[#E2E8F0] hover:text-[#168BD2] transition-colors flex items-center whitespace-nowrap">
                            {{ __('Sign In') }}
                        </a>
                        <a href="{{ route('register') }}" class="h-9 px-4 rounded-full bg-gradient-to-r from-[#168BD2] via-[#2094DB] to-[#0878BD] hover:from-[#0878BD] hover:to-[#066199] text-white text-xs font-bold shadow-md shadow-[#168BD2]/30 hover:shadow-lg hover:shadow-[#168BD2]/40 flex items-center gap-1.5 transition-all hover:scale-[1.02] cursor-pointer whitespace-nowrap">
                            <span>{{ __('Sign Up') }}</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <button type="button" id="mobile-drawer-open" class="lg:hidden h-9 w-9 rounded-full border border-[#E2E8F0] dark:border-white/10 bg-[#F8FAFC]/85 dark:bg-[#101923]/85 text-[#172B3A] dark:text-[#E2E8F0] flex items-center justify-center hover:border-[#168BD2] hover:text-[#168BD2] transition-all shadow-2xs focus:outline-none focus-visible:outline-none focus:ring-0 active:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer & Backdrop -->
    <div id="drawer-backdrop" class="fixed inset-0 bg-black/40 backdrop-blur-xs z-50 hidden transition-opacity"></div>
    <div id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-full bg-white dark:bg-[#0B1118] border-l border-[#E8EDF2] dark:border-[#1E2D3D] z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
        <div class="p-5 flex items-center justify-between border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg overflow-hidden bg-white dark:bg-[#101923] ring-1 ring-[#E8EDF2] dark:ring-[#1E2D3D] shadow-2xs">
                    <img src="{{ asset('images/logo.png') }}" alt="LushSoftware" class="w-full h-full object-cover">
                </div>
                <span class="font-bold text-[#172B3A] dark:text-white">LushSoftware</span>
            </a>
            <button type="button" id="mobile-drawer-close" class="p-2 rounded-lg text-[#718096] hover:text-[#172B3A] dark:hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto p-5 space-y-4">
            <nav class="flex flex-col space-y-1">
                <a href="{{ route('home') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('home') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Home') }}</a>
                <a href="{{ route('products.index') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('products.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Products') }}</a>
                <a href="{{ route('solutions.index') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('solutions.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Solutions') }}</a>
                <a href="{{ route('pricing.index') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('pricing.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Pricing') }}</a>
                <a href="{{ route('downloads.index') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('downloads.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Download') }}</a>
                <a href="{{ route('articles.index') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('articles.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('News') }}</a>
                <a href="{{ route('about') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('about') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('About Us') }}</a>
                <a href="{{ route('contact') }}" class="px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('contact') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0]' }}">{{ __('Contact') }}</a>
            </nav>

            <!-- Mobile Theme Appearance Selector -->
            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-2.5">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase font-bold text-[#718096] dark:text-[#94A3B8]">GIAO DIỆN HIỂN THỊ</span>
                    <span class="text-[11px] text-[#168BD2] font-bold" id="current-theme-label">Chế độ Sáng</span>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <button type="button" onclick="window.switchTheme('light', event)" id="theme-btn-light" class="theme-mobile-btn flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0] cursor-pointer">
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Giao Diện Sáng</span>
                    </button>
                    <button type="button" onclick="window.switchTheme('dark', event)" id="theme-btn-dark" class="theme-mobile-btn flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0] cursor-pointer">
                        <svg class="w-4 h-4 text-[#38BDF8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <span>Giao Diện Tối</span>
                    </button>
                </div>
            </div>

            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-3">
                <span class="text-xs uppercase font-bold text-[#718096]">{{ __('Language') }}</span>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('locale.switch', 'vi') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all {{ app()->getLocale() === 'vi' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/10 font-bold' : 'border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0]' }}">
                        <x-flag country="vi" class="w-5 h-3.5" />
                        <span>Tiếng Việt</span>
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all {{ app()->getLocale() === 'en' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/10 font-bold' : 'border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0]' }}">
                        <x-flag country="en" class="w-5 h-3.5" />
                        <span>English</span>
                    </a>
                    <a href="{{ route('locale.switch', 'zh') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all {{ app()->getLocale() === 'zh' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/10 font-bold' : 'border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0]' }}">
                        <x-flag country="zh" class="w-5 h-3.5" />
                        <span>中文</span>
                    </a>
                    <a href="{{ route('locale.switch', 'ko') }}" class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-xs font-semibold border transition-all {{ app()->getLocale() === 'ko' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/10 font-bold' : 'border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0]' }}">
                        <x-flag country="ko" class="w-5 h-3.5" />
                        <span>한국어</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="p-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            @auth
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-9 h-9 rounded-full object-cover">
                    <div>
                        <p class="text-sm font-bold text-[#172B3A] dark:text-white">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-[#718096]">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('profile') }}" class="lush-btn-secondary !py-2 !text-xs !justify-center">{{ __('Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full py-2 px-3 text-xs font-semibold text-rose-500 border border-rose-200 dark:border-rose-900/50 rounded-lg text-center hover:bg-rose-50">{{ __('Sign Out') }}</button>
                    </form>
                </div>
            @else
                <div class="flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="lush-btn-secondary !justify-center !text-sm">{{ __('Sign In') }}</a>
                    <a href="{{ route('register') }}" class="lush-btn-primary !justify-center !text-sm">{{ __('Sign Up') }}</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-16 pb-12 transition-colors">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 lg:gap-8 pb-12 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                <!-- Column 1: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl overflow-hidden bg-white dark:bg-[#101923] shadow-md shadow-[#168BD2]/20 ring-1 ring-[#E8EDF2] dark:ring-[#1E2D3D]">
                            <img src="{{ asset('images/logo.png') }}" alt="LushSoftware" class="w-full h-full object-cover">
                        </div>
                        <span class="text-xl font-bold tracking-tight text-[#172B3A] dark:text-white">
                            Lush<span class="text-[#168BD2]">Software</span>
                        </span>
                    </a>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed max-w-sm">
                        {{ \App\Models\WebsiteSetting::get('site_tagline', 'Nền tảng phần mềm & giải pháp tự động hóa tăng trưởng doanh nghiệp') }}
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <!-- Facebook -->
                        <a href="{{ \App\Models\WebsiteSetting::get('social_facebook', '#') }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-center text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <!-- Telegram -->
                        <a href="{{ \App\Models\WebsiteSetting::get('social_telegram', '#') }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-center text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="Telegram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69.01-.03.01-.14-.07-.19-.08-.05-.19-.02-.27 0-.12.03-1.99 1.27-5.61 3.72-.53.36-1.01.54-1.44.53-.47-.01-1.38-.27-2.06-.49-.83-.27-1.49-.42-1.43-.88.03-.24.38-.49 1.04-.75 4.07-1.77 6.79-2.94 8.16-3.52 3.89-1.62 4.7-.19 4.7 1.09z"/></svg>
                        </a>
                        <!-- YouTube -->
                        <a href="{{ \App\Models\WebsiteSetting::get('social_youtube', '#') }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-center text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        <!-- GitHub -->
                        <a href="{{ \App\Models\WebsiteSetting::get('social_github', '#') }}" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-center text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="GitHub">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Products -->
                <div>
                    <h4 class="text-sm font-bold text-[#172B3A] dark:text-white uppercase tracking-wider mb-4">{{ __('Products') }}</h4>
                    <ul class="space-y-2.5 text-sm text-[#718096] dark:text-[#94A3B8]">
                        <li><a href="{{ route('products.show', 'lush-marketing-pro') }}" class="hover:text-[#168BD2] transition-colors">LushCare</a></li>
                        <li><a href="{{ route('products.show', 'lush-social-hub') }}" class="hover:text-[#168BD2] transition-colors">LushLogin</a></li>
                        <li><a href="{{ route('products.show', 'lush-crm-enterprise') }}" class="hover:text-[#168BD2] transition-colors">LushCRM</a></li>
                        <li><a href="{{ route('products.show', 'lush-data-scraper') }}" class="hover:text-[#168BD2] transition-colors">LushZalo</a></li>
                        <li><a href="{{ route('products.show', 'lush-chatbot-ai') }}" class="hover:text-[#168BD2] transition-colors">LushChat</a></li>
                        <li><a href="{{ route('products.show', 'lush-traffic-booster') }}" class="hover:text-[#168BD2] transition-colors">LushShopee</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-[#168BD2] font-medium hover:underline">{{ __('All Products') }} &rarr;</a></li>
                    </ul>
                </div>

                <!-- Column 3: Quick Links -->
                <div>
                    <h4 class="text-sm font-bold text-[#172B3A] dark:text-white uppercase tracking-wider mb-4">{{ __('Quick Links') }}</h4>
                    <ul class="space-y-2.5 text-sm text-[#718096] dark:text-[#94A3B8]">
                        <li><a href="{{ route('solutions.index') }}" class="hover:text-[#168BD2] transition-colors">{{ __('Solutions') }}</a></li>
                        <li><a href="{{ route('pricing.index') }}" class="hover:text-[#168BD2] transition-colors">{{ __('Pricing') }}</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-[#168BD2] transition-colors">{{ __('News') }}</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#168BD2] transition-colors">{{ __('About Us') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#168BD2] transition-colors">{{ __('Contact') }}</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-[#168BD2] transition-colors">{{ __('Terms of Service') }}</a></li>
                        <li><a href="{{ route('privacy') }}" class="hover:text-[#168BD2] transition-colors">{{ __('Privacy Policy') }}</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact & Hotline -->
                <div>
                    <h4 class="text-sm font-bold text-[#172B3A] dark:text-white uppercase tracking-wider mb-4">{{ __('Contact Information') }}</h4>
                    <div class="space-y-3 text-sm text-[#718096] dark:text-[#94A3B8]">
                        <div>
                            <span class="text-xs uppercase text-[#718096] block font-semibold">Hotline 24/7:</span>
                            <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="text-base font-bold text-[#168BD2] hover:underline">
                                {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}
                            </a>
                        </div>
                        <div>
                            <span class="text-xs uppercase text-[#718096] block font-semibold">Email:</span>
                            <a href="mailto:{{ \App\Models\WebsiteSetting::get('contact_email', 'contact@lushsoftware.vn') }}" class="hover:text-[#168BD2] transition-colors">
                                {{ \App\Models\WebsiteSetting::get('contact_email', 'contact@lushsoftware.vn') }}
                            </a>
                        </div>
                        <div>
                            <span class="text-xs uppercase text-[#718096] block font-semibold">Địa chỉ:</span>
                            <p class="text-xs leading-relaxed">{{ \App\Models\WebsiteSetting::get('contact_address', 'Tầng 18, Tòa nhà Công Nghệ Cao Lush Tower, Cầu Giấy, Hà Nội') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#718096] dark:text-[#94A3B8]">
                <p>&copy; {{ date('Y') }} LushSoftware. {{ __('All Rights Reserved') }}. Built with Pure White & Ocean Blue.</p>
                <div class="flex items-center gap-6">
                    <span class="flex items-center gap-1.5 text-emerald-600 dark:text-emerald-400 font-medium">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        All systems operational
                    </span>
                    <a href="{{ route('privacy') }}" class="hover:text-[#168BD2]">{{ __('Privacy Policy') }}</a>
                    <a href="{{ route('terms') }}" class="hover:text-[#168BD2]">{{ __('Terms of Service') }}</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Global Spotlight / Command Palette Search Modal (Ctrl+K) -->
    <div id="spotlight-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-xs z-50 hidden transition-opacity duration-200"></div>
    <div id="spotlight-modal" class="fixed inset-0 z-50 hidden overflow-y-auto flex items-start justify-center p-4 sm:p-6 md:p-20">
        <div class="relative bg-white dark:bg-[#131D27] rounded-2xl max-w-2xl w-full border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xl overflow-hidden transform transition-all duration-200 scale-95 opacity-0 spotlight-box">
            <!-- Search Input Header -->
            <div class="flex items-center px-4 py-3.5 border-b border-[#E8EDF2] dark:border-[#1E2D3D] gap-3">
                <svg class="w-5 h-5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" id="spotlight-input" placeholder="Tìm kiếm phần mềm, tính năng, bài viết... (Gõ để tìm)" class="flex-1 bg-transparent border-0 text-sm text-[#172B3A] dark:text-white placeholder-[#718096] focus:outline-none focus:ring-0">
                <kbd class="px-2 py-0.5 text-[11px] font-mono text-[#718096] bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#1E2D3D] rounded">ESC</kbd>
            </div>

            <!-- Search Results Content Area -->
            <div id="spotlight-results" class="max-h-96 overflow-y-auto p-4 space-y-4">
                <!-- Default Quick Suggestions -->
                <div id="spotlight-default-view">
                    <span class="text-[11px] uppercase font-bold text-[#718096] tracking-wider block mb-2">Gợi ý truy cập nhanh</span>
                    <div class="space-y-1">
                        <a href="{{ route('products.show', 'lush-marketing-pro') }}" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xs">LM</div>
                                <div>
                                    <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2]">Lush Marketing Pro</h4>
                                    <p class="text-[11px] text-[#718096]">Tự động hóa tiếp thị & gửi tin nhắn đa luồng</p>
                                </div>
                            </div>
                            <span class="badge-lush text-[10px]">Phổ biến nhất</span>
                        </a>

                        <a href="{{ route('products.show', 'lush-crm-enterprise') }}" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xs">CR</div>
                                <div>
                                    <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2]">Lush CRM Enterprise</h4>
                                    <p class="text-[11px] text-[#718096]">Quản trị quan hệ khách hàng và Sales pipeline</p>
                                </div>
                            </div>
                            <span class="badge-lush text-[10px]">Enterprise</span>
                        </a>

                        <a href="{{ route('pricing.index') }}" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold text-xs">$$</div>
                                <div>
                                    <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2]">Bảng Giá Bản Quyền</h4>
                                    <p class="text-[11px] text-[#718096]">So sánh chi tiết quyền lợi gói Starter, Pro và Doanh nghiệp</p>
                                </div>
                            </div>
                            <svg class="w-4 h-4 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Dynamic Results (Filled by AJAX) -->
                <div id="spotlight-dynamic-view" class="hidden space-y-4"></div>
                <div id="spotlight-loading" class="hidden py-8 text-center text-xs text-[#718096]">
                    <span class="inline-block animate-spin mr-2">⚙</span> Đang tìm kiếm trong hệ sinh thái LushSoftware...
                </div>
            </div>

            <!-- Footer Keyboard Hints -->
            <div class="px-4 py-2.5 bg-[#F8FAFC] dark:bg-[#101923] border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between text-[11px] text-[#718096]">
                <div class="flex items-center gap-3">
                    <span><kbd class="px-1.5 py-0.5 bg-white dark:bg-[#1A2634] border rounded text-[10px]">Enter</kbd> để chọn</span>
                    <span><kbd class="px-1.5 py-0.5 bg-white dark:bg-[#1A2634] border rounded text-[10px]">ESC</kbd> để thoát</span>
                </div>
                <span>Hệ sinh thái LushSoftware</span>
            </div>
        </div>
    </div>

    <!-- Quick Trial / Consultation Modal -->
    <div id="trial-modal-backdrop" class="fixed inset-0 bg-black/50 backdrop-blur-xs z-50 hidden transition-opacity duration-300"></div>
    <div id="trial-modal" class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center p-4">
        <div class="relative bg-white dark:bg-[#131D27] rounded-2xl max-w-lg w-full border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xl p-6 sm:p-8 transform transition-all duration-300 scale-95 opacity-0 modal-box">
            <!-- Close Button -->
            <button type="button" id="trial-modal-close" class="absolute top-4 right-4 p-2 rounded-lg text-[#718096] hover:text-[#172B3A] dark:hover:text-white hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Modal Header -->
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 dark:bg-[#168BD2]/20 text-[#168BD2] flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h3 class="text-base sm:text-lg font-bold text-[#172B3A] dark:text-white">Đăng Ký Trải Nghiệm Phần Mềm</h3>
                    <p class="text-xs text-[#718096] dark:text-[#94A3B8]">Dùng thử miễn phí 3 ngày kèm hỗ trợ cài đặt 1-1</p>
                </div>
            </div>

            <!-- Modal Form -->
            <form method="POST" action="{{ route('contact.submit') }}" id="trial-modal-form" class="space-y-3.5">
                @csrf
                <input type="hidden" name="subject" value="Đăng ký dùng thử phần mềm qua Modal">

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Họ và tên <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" required placeholder="Nguyễn Văn A" class="w-full px-3.5 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Số điện thoại / Zalo <span class="text-rose-500">*</span></label>
                        <input type="tel" name="phone" required placeholder="0988 888 888" class="w-full px-3.5 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Email <span class="text-rose-500">*</span></label>
                        <input type="email" name="email" required placeholder="email@company.vn" class="w-full px-3.5 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Phần mềm muốn dùng thử</label>
                    <select name="service_interest" id="trial-modal-product" class="w-full px-3.5 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                        <option value="Lush Marketing Pro">Lush Marketing Pro – Tự động hóa tiếp thị đa kênh</option>
                        <option value="Lush Social Hub">Lush Social Hub – Quản lý & nuôi dàn nick chuyên sâu</option>
                        <option value="Lush CRM Enterprise">Lush CRM Enterprise – Quản trị phễu khách hàng & Sales</option>
                        <option value="Lush Data Scraper">Lush Data Scraper – Quét & phân tích dữ liệu thị trường</option>
                        <option value="Lush Chatbot AI">Lush Chatbot AI – Trực tin nhắn tự động 24/7</option>
                        <option value="Lush Traffic Booster">Lush Traffic Booster – Tăng tương tác & lượt truy cập</option>
                        <option value="Tu_van_tong_the">Tư vấn hệ sinh thái LushSoftware toàn diện</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Ghi chú hoặc nhu cầu cụ thể</label>
                    <textarea name="message" rows="2" placeholder="Ví dụ: Cần nuôi 50 nick Facebook và gửi tin nhắn tự động..." class="w-full px-3.5 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="lush-btn-primary w-full !justify-center !text-xs !py-3">
                        Gửi Đăng Ký Trải Nghiệm Miễn Phí
                    </button>
                    <p class="text-[11px] text-[#718096] text-center mt-2">
                        Bảo mật thông tin 100%. Kỹ thuật viên sẽ hỗ trợ kích hoạt bản quyền trong 15 phút.
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Flash Message Trigger -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.showToast("{{ session('success') }}", 'success');
            });
        </script>
    @endif
    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.showToast("{{ session('error') }}", 'error');
            });
        </script>
    @endif

    <script>
        // Global Trial Modal Script
        document.addEventListener('DOMContentLoaded', function () {
            const backdrop = document.getElementById('trial-modal-backdrop');
            const modal = document.getElementById('trial-modal');
            const modalBox = modal ? modal.querySelector('.modal-box') : null;
            const closeBtn = document.getElementById('trial-modal-close');
            const productSelect = document.getElementById('trial-modal-product');

            function openTrialModal(productName) {
                if (!modal || !backdrop) return;
                if (productName && productSelect) {
                    for (let i = 0; i < productSelect.options.length; i++) {
                        if (productSelect.options[i].text.toLowerCase().includes(productName.toLowerCase()) || 
                            productSelect.options[i].value.toLowerCase().includes(productName.toLowerCase())) {
                            productSelect.selectedIndex = i;
                            break;
                        }
                    }
                }
                backdrop.classList.remove('hidden');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    if (modalBox) {
                        modalBox.classList.remove('scale-95', 'opacity-0');
                        modalBox.classList.add('scale-100', 'opacity-100');
                    }
                }, 10);
            }

            function closeTrialModal() {
                if (!modal || !backdrop) return;
                if (modalBox) {
                    modalBox.classList.remove('scale-100', 'opacity-100');
                    modalBox.classList.add('scale-95', 'opacity-0');
                }
                setTimeout(() => {
                    modal.classList.add('hidden');
                    backdrop.classList.add('hidden');
                }, 200);
            }

            document.querySelectorAll('[data-open-trial]').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const prodName = this.getAttribute('data-open-trial') || '';
                    openTrialModal(prodName);
                });
            });

            if (closeBtn) closeBtn.addEventListener('click', closeTrialModal);
            if (backdrop) backdrop.addEventListener('click', closeTrialModal);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                    closeTrialModal();
                }
            });

            window.openTrialModal = openTrialModal;
            window.closeTrialModal = closeTrialModal;

            // Global Spotlight Search Controller (Ctrl+K)
            const spotlightBtn = document.getElementById('spotlight-search-btn');
            const spotlightBackdrop = document.getElementById('spotlight-backdrop');
            const spotlightModal = document.getElementById('spotlight-modal');
            const spotlightBox = spotlightModal ? spotlightModal.querySelector('.spotlight-box') : null;
            const spotlightInput = document.getElementById('spotlight-input');
            const spotlightDefaultView = document.getElementById('spotlight-default-view');
            const spotlightDynamicView = document.getElementById('spotlight-dynamic-view');
            const spotlightLoading = document.getElementById('spotlight-loading');
            let searchDebounceTimer = null;

            function openSpotlight() {
                if (!spotlightModal || !spotlightBackdrop) return;
                spotlightBackdrop.classList.remove('hidden');
                spotlightModal.classList.remove('hidden');
                setTimeout(() => {
                    if (spotlightBox) {
                        spotlightBox.classList.remove('scale-95', 'opacity-0');
                        spotlightBox.classList.add('scale-100', 'opacity-100');
                    }
                    if (spotlightInput) {
                        spotlightInput.focus();
                        spotlightInput.select();
                    }
                }, 10);
            }

            function closeSpotlight() {
                if (!spotlightModal || !spotlightBackdrop) return;
                if (spotlightBox) {
                    spotlightBox.classList.remove('scale-100', 'opacity-100');
                    spotlightBox.classList.add('scale-95', 'opacity-0');
                }
                setTimeout(() => {
                    spotlightModal.classList.add('hidden');
                    spotlightBackdrop.classList.add('hidden');
                }, 150);
            }

            if (spotlightBtn) spotlightBtn.addEventListener('click', openSpotlight);
            if (spotlightBackdrop) spotlightBackdrop.addEventListener('click', closeSpotlight);

            // Shortcut listener for Ctrl+K / Cmd+K
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && (e.key === 'k' || e.key === 'K')) {
                    e.preventDefault();
                    if (spotlightModal && !spotlightModal.classList.contains('hidden')) {
                        closeSpotlight();
                    } else {
                        openSpotlight();
                    }
                }
                if (e.key === 'Escape' && spotlightModal && !spotlightModal.classList.contains('hidden')) {
                    closeSpotlight();
                }
            });

            // Debounced Live Search Fetcher
            if (spotlightInput) {
                spotlightInput.addEventListener('input', function() {
                    const query = this.value.trim();
                    clearTimeout(searchDebounceTimer);

                    if (query.length === 0) {
                        spotlightLoading.classList.add('hidden');
                        spotlightDynamicView.classList.add('hidden');
                        spotlightDefaultView.classList.remove('hidden');
                        return;
                    }

                    spotlightDefaultView.classList.add('hidden');
                    spotlightLoading.classList.remove('hidden');

                    searchDebounceTimer = setTimeout(async () => {
                        try {
                            const res = await fetch(`{{ route('api.search') }}?q=${encodeURIComponent(query)}`);
                            const data = await res.json();
                            spotlightLoading.classList.add('hidden');
                            spotlightDynamicView.classList.remove('hidden');

                            const products = data.data?.products || [];
                            const articles = data.data?.articles || [];

                            if (products.length === 0 && articles.length === 0) {
                                spotlightDynamicView.innerHTML = `
                                    <div class="py-8 text-center text-xs text-[#718096]">
                                        Không tìm thấy sản phẩm hoặc bài viết phù hợp với "<strong>${query}</strong>".
                                    </div>
                                `;
                                return;
                            }

                            let html = '';
                            if (products.length > 0) {
                                html += `<span class="text-[11px] uppercase font-bold text-[#168BD2] tracking-wider block mb-2">Phần mềm (${products.length})</span>`;
                                html += `<div class="space-y-1 mb-4">`;
                                products.forEach(p => {
                                    html += `
                                        <a href="${p.url}" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xs">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2]">${p.title}</h4>
                                                    <p class="text-[11px] text-[#718096] truncate max-w-sm">${p.subtitle || ''}</p>
                                                </div>
                                            </div>
                                            <span class="badge-lush text-[10px]">${p.category}</span>
                                        </a>
                                    `;
                                });
                                html += `</div>`;
                            }

                            if (articles.length > 0) {
                                html += `<span class="text-[11px] uppercase font-bold text-[#718096] tracking-wider block mb-2">Bài viết & Cẩm nang (${articles.length})</span>`;
                                html += `<div class="space-y-1">`;
                                articles.forEach(a => {
                                    html += `
                                        <a href="${a.url}" class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold text-xs">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2]">${a.title}</h4>
                                                    <p class="text-[11px] text-[#718096] truncate max-w-sm">${a.subtitle || ''}</p>
                                                </div>
                                            </div>
                                            <span class="text-[10px] text-[#718096]">&rarr;</span>
                                        </a>
                                    `;
                                });
                                html += `</div>`;
                            }

                            spotlightDynamicView.innerHTML = html;
                        } catch (err) {
                            spotlightLoading.classList.add('hidden');
                        }
                    }, 250);
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>

