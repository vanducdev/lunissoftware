@extends('layouts.app')

@section('title', __('Sign In') . ' – LushSoftware')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118] flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4" data-aos="fade-up">
        <div class="lush-card p-8 sm:p-10 shadow-xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#168BD2] to-[#48B4E5] flex items-center justify-center text-white font-bold">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                </a>
                <h1 class="text-2xl font-bold text-[#172B3A] dark:text-white">{{ __('Sign In') }}</h1>
                <p class="text-xs text-[#718096] mt-1">Truy cập tài khoản phần mềm LushSoftware</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Email Address') }}</label>
                    <input type="email" name="email" required autofocus value="{{ old('email') }}" placeholder="admin@lushsoftware.vn" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('email') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">Mật khẩu</label>
                        <a href="{{ route('password.request') }}" class="text-xs text-[#168BD2] hover:underline">Quên mật khẩu?</a>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('password') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                        <span class="text-xs text-[#718096]">Ghi nhớ đăng nhập</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="lush-btn-primary w-full !py-3 !text-sm !justify-center">
                        {{ __('Sign In') }}
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-center text-xs text-[#718096]">
                Chưa có tài khoản?
                <a href="{{ route('register') }}" class="font-bold text-[#168BD2] hover:underline">{{ __('Sign Up') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

