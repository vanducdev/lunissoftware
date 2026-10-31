@extends('layouts.app')

@section('title', __('Profile') . ' – LushSoftware')

@section('content')
<div class="pt-6 pb-16 sm:pt-8 lg:pt-10 lg:pb-20 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-[#172B3A] dark:text-white">
                Quản Lý Tài Khoản Cá Nhân
            </h1>
            <p class="text-xs sm:text-sm text-[#718096] mt-1">
                Cập nhật thông tin hồ sơ, mật khẩu và xem lịch sử đăng nhập bảo mật.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Left Column: User Summary & Avatar -->
            <div class="lg:col-span-4 space-y-6">
                <div class="lush-card p-6 text-center">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full mx-auto object-cover ring-4 ring-[#168BD2]/20 mb-4 shadow-md">
                    <h2 class="text-lg font-bold text-[#172B3A] dark:text-white">{{ $user->name }}</h2>
                    <p class="text-xs text-[#718096] mb-3">{{ $user->email }}</p>

                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $user->isAdmin() ? 'bg-[#168BD2]/10 text-[#168BD2]' : 'bg-emerald-50 text-emerald-600' }}">
                        <span>Vai trò: {{ $user->isAdmin() ? 'Quản trị viên (Admin)' : 'Thành viên (Member)' }}</span>
                    </div>

                    @if($user->isAdmin())
                        <div class="mt-6 pt-6 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <a href="{{ route('admin.dashboard') }}" class="lush-btn-primary w-full !text-xs !py-2.5 !justify-center">
                                Truy cập Admin Dashboard &rarr;
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Update Password Form -->
                <div class="lush-card p-6">
                    <h3 class="text-sm font-bold text-[#172B3A] dark:text-white mb-4">Đổi Mật Khẩu</h3>
                    <form method="POST" action="{{ route('profile.password') }}" class="space-y-3">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-xs font-bold text-[#718096] mb-1">Mật khẩu hiện tại</label>
                            <input type="password" name="current_password" required class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                            @error('current_password') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#718096] mb-1">Mật khẩu mới</label>
                            <input type="password" name="password" required class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                            @error('password') <span class="text-xs text-rose-500 mt-0.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#718096] mb-1">Xác nhận mật khẩu</label>
                            <input type="password" name="password_confirmation" required class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                        </div>

                        <button type="submit" class="lush-btn-secondary w-full !text-xs !py-2 !justify-center mt-2">
                            Lưu mật khẩu mới
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Profile Edit & Activity History -->
            <div class="lg:col-span-8 space-y-6">
                <!-- Profile Edit Form -->
                <div class="lush-card p-6 sm:p-8">
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-6">Thông Tin Cá Nhân</h3>
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Full Name') }}</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Email Address') }}</label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('email') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Phone Number') }}</label>
                                <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('phone') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Ảnh đại diện (Avatar)</label>
                                <input type="file" name="avatar" accept="image/*" class="w-full text-xs text-[#718096] file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#168BD2]/10 file:text-[#168BD2] hover:file:bg-[#168BD2]/20">
                                @error('avatar') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Activity History (Part 8 requirement) -->
                <div class="lush-card p-6 sm:p-8">
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-4">Lịch Sử Hoạt Động Gần Đây</h3>
                    @if($logs->count() > 0)
                        <div class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                            @foreach($logs as $log)
                                <div class="py-3 flex items-start justify-between gap-4 text-xs">
                                    <div>
                                        <p class="font-bold text-[#172B3A] dark:text-white">{{ $log->action }}</p>
                                        <p class="text-[#718096] mt-0.5">{{ $log->description }}</p>
                                    </div>
                                    <div class="text-right flex-shrink-0 text-[#718096]">
                                        <span>{{ $log->created_at->format('H:i d/m/Y') }}</span>
                                        <span class="block text-[10px]">{{ $log->ip_address }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-[#718096] py-4">Chưa có bản ghi hoạt động nào.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

