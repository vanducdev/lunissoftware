<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Đăng Nhập Quản Trị Hệ Thống – LushSoftware Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <!-- Script chống giật theme sáng/tối -->
    <script>
        (function() {
            try {
                var theme = localStorage.getItem('lush_theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
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
<body class="h-full bg-[#F0F2F5] dark:bg-[#080D14] text-[#1E293B] dark:text-[#E2E8F0] antialiased flex flex-col justify-center items-center p-4 sm:p-6 transition-colors duration-200 relative selection:bg-[#168BD2] selection:text-white">

    <!-- Top Right Quick Controls: Theme Toggle & Back Button -->
    <div class="fixed top-4 right-4 sm:top-6 sm:right-6 flex items-center gap-2 z-20">
        <!-- Theme Toggle Button -->
        <button type="button" onclick="toggleAdminTheme()" class="w-9 h-9 rounded-xl bg-white/80 dark:bg-[#131D27]/80 backdrop-blur-md border border-[#CBD5E1]/70 dark:border-white/10 shadow-sm hover:border-[#168BD2] flex items-center justify-center text-[#64748B] dark:text-[#94A3B8] hover:text-[#168BD2] transition-all cursor-pointer" title="Đổi giao diện Sáng / Tối">
            <svg id="theme-sun-icon" class="w-4 h-4 hidden dark:block text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
            </svg>
            <svg id="theme-moon-icon" class="w-4 h-4 block dark:hidden text-[#168BD2]" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>

    <!-- Background Subtle Glow Accents -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-gradient-to-tr from-[#168BD2]/15 via-[#38BDF8]/10 to-transparent rounded-full blur-3xl dark:from-[#168BD2]/10 dark:via-[#0878BD]/5"></div>
    </div>

    <!-- Centered WordPress-Style Login Wrapper -->
    <div class="w-full max-w-[390px] sm:max-w-[420px] mx-auto flex flex-col items-center">
        
        <!-- WordPress-Style Brand Header (Centered Above Form) -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-block group transition-transform duration-300 hover:scale-105" title="Về trang chủ LushSoftware">
                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-white dark:bg-[#131D27] p-2.5 shadow-md shadow-[#168BD2]/15 ring-1 ring-[#CBD5E1]/80 dark:ring-white/10 mx-auto flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="LushSoftware" class="w-full h-full object-contain">
                </div>
            </a>
            <h1 class="text-xl sm:text-2xl font-black text-[#0F172A] dark:text-white mt-3.5 tracking-tight flex items-center justify-center gap-1.5">
                Lush<span class="text-[#168BD2]">Admin</span>
            </h1>
            <div class="inline-flex items-center gap-1.5 mt-1 px-2.5 py-0.5 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-[10.5px] font-bold uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2] animate-pulse"></span>
                <span>Hệ Thống Quản Trị Nội Bộ</span>
            </div>
        </div>

        <!-- WordPress-Style Isolated Login Card -->
        <div class="w-full bg-white dark:bg-[#111A24] rounded-2xl p-6 sm:p-8 shadow-[0_15px_40px_-10px_rgba(0,0,0,0.08),0_2px_6px_rgba(0,0,0,0.04)] dark:shadow-[0_20px_50px_-10px_rgba(0,0,0,0.6)] border border-[#CBD5E1]/70 dark:border-white/10 relative">
            
            <!-- Top Subtle Blue Highlight Line -->
            <div class="absolute inset-x-8 top-0 h-[2px] bg-gradient-to-r from-transparent via-[#168BD2] to-transparent"></div>

            <!-- Flash Error Alert -->
            @if(session('error'))
                <div class="mb-5 p-3 rounded-xl bg-rose-50 dark:bg-rose-950/40 border border-rose-200 dark:border-rose-900/50 text-rose-700 dark:text-rose-300 text-xs font-semibold flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Flash Success Alert -->
            @if(session('success'))
                <div class="mb-5 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 text-xs font-semibold flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-4.5" id="admin-login-form">
                @csrf

                <!-- Username / Email Field -->
                <div>
                    <label for="admin-email" class="block text-xs font-bold text-[#334155] dark:text-[#CBD5E1] mb-1.5">
                        Tên đăng nhập hoặc Địa chỉ Email
                    </label>
                    <div class="relative">
                        <input type="email" id="admin-email" name="email" required autofocus value="{{ old('email') }}" placeholder="admin@lushsoftware.vn" class="w-full pl-10 pr-3.5 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-white/10 bg-white dark:bg-[#0B1118] text-sm text-[#0F172A] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:border-[#168BD2] focus:ring-2 focus:ring-[#168BD2]/20 transition-all font-medium">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#94A3B8] pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    </div>
                    @error('email') <span class="text-xs text-rose-500 mt-1.5 block font-semibold">{{ $message }}</span> @enderror
                </div>

                <!-- Password Field with Show/Hide Toggle -->
                <div>
                    <label for="admin-password" class="block text-xs font-bold text-[#334155] dark:text-[#CBD5E1] mb-1.5">
                        Mật khẩu
                    </label>
                    <div class="relative">
                        <input type="password" id="admin-password" name="password" required placeholder="••••••••" class="w-full pl-10 pr-10 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-white/10 bg-white dark:bg-[#0B1118] text-sm text-[#0F172A] dark:text-white placeholder-[#94A3B8] focus:outline-none focus:border-[#168BD2] focus:ring-2 focus:ring-[#168BD2]/20 transition-all font-medium">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#94A3B8] pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <!-- Toggle Password Visibility Eye Button -->
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute right-2.5 top-1/2 -translate-y-1/2 p-1 text-[#94A3B8] hover:text-[#168BD2] focus:outline-none transition-colors cursor-pointer" title="Ẩn/Hiện mật khẩu">
                            <!-- Eye Open -->
                            <svg id="eye-open" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <!-- Eye Closed -->
                            <svg id="eye-closed" class="w-4 h-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                    @error('password') <span class="text-xs text-rose-500 mt-1.5 block font-semibold">{{ $message }}</span> @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-[#CBD5E1] text-[#168BD2] focus:ring-[#168BD2] cursor-pointer">
                        <span class="text-xs font-medium text-[#64748B] dark:text-[#94A3B8]">Tự động đăng nhập</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" id="submit-btn" class="w-full h-11 rounded-xl bg-gradient-to-r from-[#168BD2] via-[#2094DB] to-[#0878BD] hover:from-[#0878BD] hover:to-[#066199] text-white text-sm font-bold shadow-md shadow-[#168BD2]/30 hover:shadow-lg hover:shadow-[#168BD2]/40 transition-all hover:scale-[1.01] flex items-center justify-center gap-2 cursor-pointer">
                        <span>Đăng nhập</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- WordPress-Style Under-Card Links -->
        <div class="w-full mt-5 px-2 flex flex-col items-center gap-2.5 text-center text-xs">
            <a href="{{ route('home') }}" class="font-medium text-[#64748B] dark:text-[#94A3B8] hover:text-[#168BD2] dark:hover:text-[#38BDF8] transition-colors inline-flex items-center gap-1.5">
                <span>&larr;</span>
                <span>Quay lại LushSoftware</span>
            </a>
            <span class="text-[11px] text-[#94A3B8] dark:text-[#64748B]">
                &copy; {{ date('Y') }} LushSoftware Enterprise. Khu vực quản trị bảo mật.
            </span>
        </div>

    </div>

    <!-- Interactive Scripts for Password Visibility & Theme Toggle -->
    <script>
        function togglePasswordVisibility() {
            const input = document.getElementById('admin-password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');
            if (input.type === 'password') {
                input.type = 'text';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            }
        }

        function toggleAdminTheme() {
            const isDark = document.documentElement.classList.toggle('dark');
            try {
                localStorage.setItem('lush_theme', isDark ? 'dark' : 'light');
            } catch (e) {}
        }
    </script>
</body>
</html>
