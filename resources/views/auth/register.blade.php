@extends('layouts.app')

@section('title', __('Sign Up') . ' – LushSoftware')

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
                <h1 class="text-2xl font-bold text-[#172B3A] dark:text-white">{{ __('Sign Up') }}</h1>
                <p class="text-xs text-[#718096] mt-1">Tạo tài khoản thành viên trải nghiệm LushSoftware</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Full Name') }}</label>
                    <input type="text" name="name" required autofocus value="{{ old('name') }}" placeholder="Nguyễn Văn Minh" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Email Address') }}</label>
                    <input type="email" name="email" required value="{{ old('email') }}" placeholder="minh@doanhnghiep.vn" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('email') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Phone Number') }}</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="0912 345 678" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('phone') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Mật khẩu</label>
                    <input type="password" name="password" required placeholder="Tối thiểu 6 ký tự" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('password') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Xác nhận mật khẩu</label>
                    <input type="password" name="password_confirmation" required placeholder="Nhập lại mật khẩu" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>

                <div class="pt-2">
                    <button type="submit" class="lush-btn-primary w-full !py-3 !text-sm !justify-center">
                        {{ __('Sign Up') }}
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-center text-xs text-[#718096]">
                Đã có tài khoản?
                <a href="{{ route('login') }}" class="font-bold text-[#168BD2] hover:underline">{{ __('Sign In') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection

