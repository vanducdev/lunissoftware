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

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'LushSoftware – Nền tảng phần mềm SaaS')">
    <meta property="og:description" content="@yield('meta_description', 'Tự động hóa tiếp thị, quản trị quan hệ khách hàng và mở rộng kinh doanh.')">

    <!-- Schema.org JSON-LD Structured Data for Google -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "Organization",
      "name": "LushSoftware",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('favicon.ico') }}",
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

    <!-- Main Header -->
    <header id="main-header" class="sticky top-0 z-40 bg-white/95 dark:bg-[#0B1118]/95 backdrop-blur-md border-b border-[#E8EDF2] dark:border-[#1E2D3D] transition-all duration-200 shadow-2xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-[72px] flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group shrink-0">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#168BD2] to-[#48B4E5] flex items-center justify-center text-white font-bold text-lg shadow-sm shadow-[#168BD2]/30 group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-lg font-extrabold tracking-tight text-[#172B3A] dark:text-white flex items-center gap-0.5 leading-none">
                        Lush<span class="text-[#168BD2]">Software</span>
                    </span>
                    <span class="text-[9px] uppercase font-bold tracking-widest text-[#718096] dark:text-[#94A3B8] mt-1">Tech Ecosystem</span>
                </div>
            </a>

            <!-- Desktop Navigation Links (Pill Style, Zero Wrap) -->
            <nav class="hidden lg:flex items-center gap-0.5 xl:gap-1 text-[13px] font-medium">
                <a href="{{ route('home') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('home') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('Home') }}
                </a>

                <!-- Products Mega Menu Dropdown with Hover Bridge -->
                <div class="relative group">
                    <a href="{{ route('products.index') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 flex items-center gap-1.5 {{ request()->routeIs('products.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                        <span>{{ __('Products') }}</span>
                        <svg class="w-3.5 h-3.5 text-[#718096] group-hover:rotate-180 group-hover:text-[#168BD2] transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    
                    <!-- Mega Menu Flyout Panel with Invisible Padding Bridge -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-full pt-2 w-[540px] opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-200 z-50">
                        <div class="bg-white dark:bg-[#131D27] rounded-2xl shadow-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5">
                            <div class="grid grid-cols-2 gap-3">
                                <a href="{{ route('products.show', 'lush-marketing-pro') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group/item">
                                    <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors">Lush Marketing Pro</h4>
                                        <p class="text-[11px] text-[#718096] dark:text-[#94A3B8] leading-tight mt-0.5">Tự động hóa tiếp thị đa kênh</p>
                                    </div>
                                </a>

                                <a href="{{ route('products.show', 'lush-social-hub') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group/item">
                                    <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors">Lush Social Hub</h4>
                                        <p class="text-[11px] text-[#718096] dark:text-[#94A3B8] leading-tight mt-0.5">Quản lý nuôi dàn nick mạng xã hội</p>
                                    </div>
                                </a>

                                <a href="{{ route('products.show', 'lush-crm-enterprise') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group/item">
                                    <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors">Lush CRM Enterprise</h4>
                                        <p class="text-[11px] text-[#718096] dark:text-[#94A3B8] leading-tight mt-0.5">Quản trị khách hàng & Pipeline</p>
                                    </div>
                                </a>

                                <a href="{{ route('products.show', 'lush-data-scraper') }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors group/item">
                                    <div class="w-8 h-8 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center shrink-0 group-hover/item:bg-[#168BD2] group-hover/item:text-white transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-[#172B3A] dark:text-white group-hover/item:text-[#168BD2] transition-colors">Lush Data Scraper</h4>
                                        <p class="text-[11px] text-[#718096] dark:text-[#94A3B8] leading-tight mt-0.5">Khai phá & phân tích dữ liệu thị trường</p>
                                    </div>
                                </a>
                            </div>

                            <div class="mt-3.5 pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between text-xs">
                                <a href="{{ route('products.index') }}" class="text-[#168BD2] font-bold hover:underline flex items-center gap-1">
                                    <span>{{ __('All Products') }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                <span class="text-[11px] text-[#718096]">Windows 10/11 & macOS & Web App</span>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ route('solutions.index') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('solutions.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('Solutions') }}
                </a>
                <a href="{{ route('pricing.index') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('pricing.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('Pricing') }}
                </a>
                <a href="{{ route('downloads.index') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('downloads.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('Download') }}
                </a>
                <a href="{{ route('articles.index') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('articles.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('News') }}
                </a>
                <a href="{{ route('about') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('about') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('About Us') }}
                </a>
                <a href="{{ route('contact') }}" class="px-3 py-1.5 rounded-full whitespace-nowrap transition-all duration-150 {{ request()->routeIs('contact') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:bg-[#168BD2]/5' }}">
                    {{ __('Contact') }}
                </a>
            </nav>

            <!-- Header Right Controls (Unified Height & Elegant Spacing) -->
            <div class="flex items-center gap-2 shrink-0">
                <!-- Global Spotlight Search Trigger (Ctrl+K Pill) -->
                <button type="button" id="spotlight-search-btn" class="h-9 px-3 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#101923] hover:bg-white dark:hover:bg-[#131D27] hover:border-[#168BD2]/50 text-[#718096] dark:text-[#94A3B8] transition-all flex items-center gap-2 group cursor-pointer shadow-2xs" title="Tìm kiếm phần mềm & tin tức (Ctrl+K)">
                    <svg class="w-3.5 h-3.5 text-[#168BD2] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden sm:inline text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] whitespace-nowrap">Tìm kiếm</span>
                    <kbd class="hidden md:inline-flex items-center px-1.5 py-0.5 text-[10px] font-mono text-[#718096] bg-white dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#1E2D3D] rounded-md shadow-2xs">Ctrl K</kbd>
                </button>

                <!-- Language Selector Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button type="button" class="h-9 px-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0] hover:border-[#168BD2] transition-colors flex items-center gap-1.5 shadow-2xs">
                        <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="uppercase tracking-wider text-[11px] font-bold">{{ app()->getLocale() }}</span>
                        <svg class="w-3 h-3 text-[#718096] group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 top-full pt-1.5 w-36 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                        <div class="py-1 bg-white dark:bg-[#131D27] rounded-xl shadow-xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <a href="{{ route('locale.switch', 'vi') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'vi' ? 'text-[#168BD2] font-bold bg-[#168BD2]/5' : '' }}">
                                <span>Tiếng Việt</span>
                                <span class="text-[10px] text-[#718096]">VI</span>
                            </a>
                            <a href="{{ route('locale.switch', 'en') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'en' ? 'text-[#168BD2] font-bold bg-[#168BD2]/5' : '' }}">
                                <span>English</span>
                                <span class="text-[10px] text-[#718096]">EN</span>
                            </a>
                            <a href="{{ route('locale.switch', 'zh') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'zh' ? 'text-[#168BD2] font-bold bg-[#168BD2]/5' : '' }}">
                                <span>中文</span>
                                <span class="text-[10px] text-[#718096]">ZH</span>
                            </a>
                            <a href="{{ route('locale.switch', 'ko') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'ko' ? 'text-[#168BD2] font-bold bg-[#168BD2]/5' : '' }}">
                                <span>한국어</span>
                                <span class="text-[10px] text-[#718096]">KO</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Theme Toggle Button (Light/Dark) -->
                <button type="button" class="theme-toggle-btn h-9 w-9 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:border-[#168BD2] flex items-center justify-center transition-colors shadow-2xs" title="{{ __('Light Mode') }} / {{ __('Dark Mode') }}">
                    <!-- Sun icon for dark mode -->
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <!-- Moon icon for light mode -->
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <div class="hidden sm:block h-5 w-px bg-[#E8EDF2] dark:bg-[#1E2D3D] mx-0.5"></div>

                <!-- Auth Buttons / User Profile (Desktop) -->
                <div class="hidden sm:flex items-center gap-2">
                    @auth
                        <div class="relative group">
                            <button type="button" class="h-9 px-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] hover:border-[#168BD2] transition-colors flex items-center gap-2 text-xs font-semibold shadow-2xs">
                                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-5.5 h-5.5 rounded-lg object-cover ring-1 ring-[#168BD2]/30">
                                <span class="max-w-[85px] truncate text-xs font-semibold text-[#172B3A] dark:text-white">{{ auth()->user()->name }}</span>
                                <svg class="w-3 h-3 text-[#718096] group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <!-- User Dropdown Menu -->
                            <div class="absolute right-0 top-full pt-1.5 w-48 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                                <div class="py-1 bg-white dark:bg-[#131D27] rounded-xl shadow-xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                    @if(auth()->user()->canAccessAdmin())
                                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-semibold text-[#168BD2] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endif
                                    <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2 text-xs text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634]">
                                        <svg class="w-4 h-4 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        {{ __('Profile') }}
                                    </a>
                                    <div class="border-t border-[#E8EDF2] dark:border-[#1E2D3D] my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/30">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            {{ __('Sign Out') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="h-9 px-3 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] transition-colors flex items-center">
                            {{ __('Sign In') }}
                        </a>
                        <a href="{{ route('register') }}" class="lush-btn-primary !h-9 !py-0 !px-4 !text-xs !rounded-xl">
                            {{ __('Sign Up') }}
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <button type="button" id="mobile-drawer-open" class="lg:hidden h-9 w-9 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] text-[#172B3A] dark:text-[#E2E8F0] flex items-center justify-center hover:border-[#168BD2] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Drawer & Backdrop -->
    <div id="drawer-backdrop" class="fixed inset-0 bg-black/40 backdrop-blur-xs z-50 hidden transition-opacity"></div>
    <div id="mobile-drawer" class="fixed top-0 right-0 bottom-0 w-80 max-w-full bg-white dark:bg-[#0B1118] border-l border-[#E8EDF2] dark:border-[#1E2D3D] z-50 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
        <div class="p-5 flex items-center justify-between border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#168BD2] flex items-center justify-center text-white font-bold">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
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

            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-3">
                <span class="text-xs uppercase font-bold text-[#718096]">{{ __('Language') }}</span>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('locale.switch', 'vi') }}" class="px-3 py-2 rounded-lg text-xs font-semibold text-center border {{ app()->getLocale() === 'vi' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/5' : 'border-[#E8EDF2] dark:border-[#1E2D3D]' }}">Tiếng Việt</a>
                    <a href="{{ route('locale.switch', 'en') }}" class="px-3 py-2 rounded-lg text-xs font-semibold text-center border {{ app()->getLocale() === 'en' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/5' : 'border-[#E8EDF2] dark:border-[#1E2D3D]' }}">English</a>
                    <a href="{{ route('locale.switch', 'zh') }}" class="px-3 py-2 rounded-lg text-xs font-semibold text-center border {{ app()->getLocale() === 'zh' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/5' : 'border-[#E8EDF2] dark:border-[#1E2D3D]' }}">中文</a>
                    <a href="{{ route('locale.switch', 'ko') }}" class="px-3 py-2 rounded-lg text-xs font-semibold text-center border {{ app()->getLocale() === 'ko' ? 'border-[#168BD2] text-[#168BD2] bg-[#168BD2]/5' : 'border-[#E8EDF2] dark:border-[#1E2D3D]' }}">한국어</a>
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
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#168BD2] to-[#48B4E5] flex items-center justify-center text-white font-bold text-xl shadow-md shadow-[#168BD2]/20">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
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
                        <li><a href="{{ route('products.show', 'lush-marketing-pro') }}" class="hover:text-[#168BD2] transition-colors">Lush Marketing Pro</a></li>
                        <li><a href="{{ route('products.show', 'lush-social-hub') }}" class="hover:text-[#168BD2] transition-colors">Lush Social Hub</a></li>
                        <li><a href="{{ route('products.show', 'lush-crm-enterprise') }}" class="hover:text-[#168BD2] transition-colors">Lush CRM Enterprise</a></li>
                        <li><a href="{{ route('products.show', 'lush-data-scraper') }}" class="hover:text-[#168BD2] transition-colors">Lush Data Scraper</a></li>
                        <li><a href="{{ route('products.show', 'lush-chatbot-ai') }}" class="hover:text-[#168BD2] transition-colors">Lush Chatbot AI</a></li>
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

