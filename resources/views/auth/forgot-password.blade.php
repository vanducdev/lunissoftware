@extends('layouts.app')

@section('title', 'Quên Mật Khẩu – LushSoftware')

@section('content')
<div class="pt-3 pb-12 sm:pt-4 lg:pt-6 lg:pb-16 bg-white dark:bg-[#0B1118] flex items-center justify-center">
    <div class="max-w-md w-full mx-auto px-4" data-aos="fade-up">
        <div class="lush-card p-8 sm:p-10 shadow-xl">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-4">
                    <div class="w-12 h-12 rounded-2xl overflow-hidden bg-white dark:bg-[#101923] shadow-md shadow-[#168BD2]/20 ring-1 ring-[#E8EDF2] dark:ring-[#1E2D3D]">
                        <img src="{{ asset('images/logo.png') }}" alt="LushSoftware" class="w-full h-full object-cover">
                    </div>
                </a>
                <h1 class="text-2xl font-bold text-[#172B3A] dark:text-white">Đặt Lại Mật Khẩu</h1>
                <p class="text-xs text-[#718096] mt-1">Nhập email đăng ký tài khoản để nhận đường dẫn đặt lại mật khẩu</p>
            </div>

            @if(session('status'))
                <div class="mb-4 p-3 bg-emerald-50 dark:bg-emerald-950/30 text-emerald-800 dark:text-emerald-300 text-xs rounded-xl border border-emerald-200">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Email Address') }}</label>
                    <input type="email" name="email" required placeholder="email@congty.com" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('email') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="lush-btn-primary w-full !py-3 !text-sm !justify-center">
                        Gửi liên kết khôi phục
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-6 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-center text-xs text-[#718096]">
                <a href="{{ route('login') }}" class="font-bold text-[#168BD2] hover:underline">&larr; Quay lại đăng nhập</a>
            </div>
        </div>
    </div>
</div>
@endsection

