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
    <header id="main-header" class="sticky top-0 z-40 bg-white/95 dark:bg-[#0B1118]/95 backdrop-blur-md border-b border-[#E8EDF2] dark:border-[#1E2D3D] transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#168BD2] to-[#48B4E5] flex items-center justify-center text-white font-bold text-xl shadow-md shadow-[#168BD2]/20 group-hover:scale-105 transition-transform duration-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight text-[#172B3A] dark:text-white flex items-center gap-0.5">
                        Lush<span class="text-[#168BD2]">Software</span>
                    </span>
                    <span class="text-[10px] uppercase font-semibold tracking-wider text-[#718096] dark:text-[#94A3B8]">Tech Ecosystem</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('home') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('Home') }}
                </a>
                <a href="{{ route('products.index') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('products.*') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('Products') }}
                </a>
                <a href="{{ route('solutions.index') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('solutions.*') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('Solutions') }}
                </a>
                <a href="{{ route('pricing.index') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('pricing.*') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('Pricing') }}
                </a>
                <a href="{{ route('articles.index') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('articles.*') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('News') }}
                </a>
                <a href="{{ route('about') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('about') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('About Us') }}
                </a>
                <a href="{{ route('contact') }}" class="px-3 py-2 text-sm font-medium rounded-md transition-colors {{ request()->routeIs('contact') ? 'text-[#168BD2] font-semibold' : 'text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] dark:hover:text-[#48B4E5]' }}">
                    {{ __('Contact') }}
                </a>
            </nav>

            <!-- Header Right Controls -->
            <div class="flex items-center gap-2 sm:gap-3">
                <!-- Language Selector Dropdown -->
                <div class="relative group" x-data="{ open: false }">
                    <button type="button" class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0] hover:border-[#168BD2] transition-colors">
                        <span class="uppercase">{{ app()->getLocale() }}</span>
                        <svg class="w-3.5 h-3.5 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-1 w-36 py-1 bg-white dark:bg-[#131D27] rounded-xl shadow-xl border border-[#E8EDF2] dark:border-[#1E2D3D] opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                        <a href="{{ route('locale.switch', 'vi') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'vi' ? 'text-[#168BD2] font-bold' : '' }}">
                            <span>Tiếng Việt</span>
                            <span class="text-[10px] text-[#718096]">VI</span>
                        </a>
                        <a href="{{ route('locale.switch', 'en') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'en' ? 'text-[#168BD2] font-bold' : '' }}">
                            <span>English</span>
                            <span class="text-[10px] text-[#718096]">EN</span>
                        </a>
                        <a href="{{ route('locale.switch', 'zh') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'zh' ? 'text-[#168BD2] font-bold' : '' }}">
                            <span>中文</span>
                            <span class="text-[10px] text-[#718096]">ZH</span>
                        </a>
                        <a href="{{ route('locale.switch', 'ko') }}" class="flex items-center justify-between px-3 py-2 text-xs font-medium text-[#172B3A] dark:text-[#E2E8F0] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] {{ app()->getLocale() === 'ko' ? 'text-[#168BD2] font-bold' : '' }}">
                            <span>한국어</span>
                            <span class="text-[10px] text-[#718096]">KO</span>
                        </a>
                    </div>
                </div>

                <!-- Theme Toggle Button (Light/Dark) -->
                <button type="button" class="theme-toggle-btn p-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#718096] dark:text-[#94A3B8] hover:text-[#168BD2] dark:hover:text-[#48B4E5] hover:border-[#168BD2] transition-colors" title="{{ __('Light Mode') }} / {{ __('Dark Mode') }}">
                    <!-- Sun icon for dark mode -->
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <!-- Moon icon for light mode -->
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <!-- Auth Buttons (Desktop) -->
                <div class="hidden sm:flex items-center gap-2">
                    @auth
                        <div class="relative group">
                            <button type="button" class="flex items-center gap-2 px-3 py-1.5 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] transition-colors text-sm font-medium">
                                <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-6 h-6 rounded-full object-cover">
                                <span class="max-w-[100px] truncate text-xs font-semibold">{{ auth()->user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <!-- User Dropdown Menu -->
                            <div class="absolute right-0 mt-1 w-48 py-1 bg-white dark:bg-[#131D27] rounded-xl shadow-xl border border-[#E8EDF2] dark:border-[#1E2D3D] opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-150 z-50">
                                @if(auth()->user()->isAdmin())
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
                    @else
                        <a href="{{ route('login') }}" class="px-3.5 py-1.5 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0] hover:text-[#168BD2] transition-colors">
                            {{ __('Sign In') }}
                        </a>
                        <a href="{{ route('register') }}" class="lush-btn-primary !py-1.5 !px-3.5 !text-xs">
                            {{ __('Sign Up') }}
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <button type="button" id="mobile-drawer-open" class="lg:hidden p-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#E2E8F0]">
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

    @stack('scripts')
</body>
</html>
