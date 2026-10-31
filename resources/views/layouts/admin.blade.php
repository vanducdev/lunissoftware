<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') – LushSoftware Management</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

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
<body class="bg-[#F8FAFC] text-[#172B3A] dark:bg-[#0B1118] dark:text-[#F8FAFC] antialiased">
    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-5 right-5 z-50 flex flex-col gap-2 max-w-sm w-full pointer-events-none *:pointer-events-auto"></div>

    <div class="min-h-screen flex">
        <!-- Admin Sidebar -->
        <aside class="w-64 bg-white dark:bg-[#131D27] border-r border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-col flex-shrink-0 min-h-screen">
            <!-- Brand -->
            <div class="h-20 flex items-center px-6 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl overflow-hidden bg-white dark:bg-[#101923] shadow-sm ring-1 ring-[#E8EDF2] dark:ring-[#1E2D3D]">
                        <img src="{{ asset('images/logo.png') }}" alt="LushAdmin" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <span class="font-bold text-base tracking-tight text-[#172B3A] dark:text-white flex items-center gap-1">
                            Lush<span class="text-[#168BD2]">Admin</span>
                        </span>
                        <span class="text-[10px] text-[#718096] uppercase font-semibold">HQ Console</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="flex-1 overflow-y-auto px-4 py-6 space-y-1">
                <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-[#718096]">Quản trị hệ thống</span>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Sản phẩm</span>
                </a>

                <a href="{{ route('admin.product-categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.product-categories.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                    <span>Danh mục sản phẩm</span>
                </a>

                <a href="{{ route('admin.articles.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    <span>Bài viết & Blog</span>
                </a>

                <a href="{{ route('admin.article-categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.article-categories.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                    <span>Chuyên mục bài viết</span>
                </a>

                <a href="{{ route('admin.banners.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.banners.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Banner Quảng bá</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.testimonials.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    <span>Đánh giá khách hàng</span>
                </a>

                <a href="{{ route('admin.partners.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.partners.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                    <span>Đối tác chiến lược</span>
                </a>

                <a href="{{ route('admin.media.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.media.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Thư viện Tệp tin</span>
                </a>

                <a href="{{ route('admin.customers.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.customers.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Khách hàng & User</span>
                </a>

                <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.contacts.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>Yêu cầu Tư vấn</span>
                </a>

                <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-1">
                    <span class="px-3 text-[11px] font-bold uppercase tracking-wider text-[#718096]">Cài đặt</span>

                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Cấu hình Website</span>
                    </a>

                    <a href="{{ route('admin.translations.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.translations.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/></svg>
                        <span>Quản lý Đa ngôn ngữ</span>
                    </a>

                    <a href="{{ route('admin.activity-logs.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-xs font-medium transition-colors {{ request()->routeIs('admin.activity-logs.*') ? 'bg-[#168BD2]/10 text-[#168BD2] font-semibold' : 'text-[#718096] dark:text-[#94A3B8] hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] hover:text-[#172B3A] dark:hover:text-white' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                        <span>Nhật ký Hoạt động</span>
                    </a>
                </div>
            </div>

            <!-- Footer link to Main Site -->
            <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2 px-3 text-xs font-semibold rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>Xem Website Bên Ngoài</span>
                </a>
            </div>
        </aside>

        <!-- Main Admin Content Area -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
            <!-- Topbar -->
            <header class="h-20 bg-white dark:bg-[#131D27] border-b border-[#E8EDF2] dark:border-[#1E2D3D] px-6 lg:px-8 flex items-center justify-between sticky top-0 z-30">
                <div class="flex items-center gap-4">
                    <h1 class="text-lg font-bold text-[#172B3A] dark:text-white">@yield('page_title', 'Bảng điều khiển')</h1>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Theme toggle -->
                    <button type="button" class="theme-toggle-btn p-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#718096] dark:text-[#94A3B8] hover:text-[#168BD2] transition-colors">
                        <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    </button>

                    <!-- Admin Profile Dropdown -->
                    <div class="flex items-center gap-3 pl-3 border-l border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full object-cover">
                        <div class="hidden sm:block text-left">
                            <span class="text-xs font-bold block text-[#172B3A] dark:text-white">{{ auth()->user()->name }}</span>
                            <span class="text-[10px] text-emerald-600 font-semibold uppercase">Administrator</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="p-2 text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-950/30 rounded-lg transition-colors" title="Đăng xuất">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 lg:p-8 flex-1">
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 dark:bg-emerald-950/30 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-sm flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-xl bg-rose-50 dark:bg-rose-950/30 border border-rose-200 dark:border-rose-800 text-rose-800 dark:text-rose-300 text-sm flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
