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
                <!-- Software Licenses & Orders Section -->
                <div class="lush-card p-6 sm:p-8 border border-[#168BD2]/30 shadow-md">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-4 mb-6">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                <h3 class="text-base font-black text-[#172B3A] dark:text-white uppercase tracking-wider">Bản Quyền Phần Mềm & Giấy Phép Của Bạn</h3>
                            </div>
                            <p class="text-xs text-[#718096] dark:text-[#94A3B8] mt-0.5">Danh sách key bản quyền và thời hạn kích hoạt liên kết với tài khoản của bạn</p>
                        </div>
                        <a href="{{ route('pricing.index') }}" class="lush-btn-primary !text-xs !py-2 !px-4 shrink-0">
                            + Mua Thêm Bản Quyền
                        </a>
                    </div>

                    @if($orders->count() > 0)
                        <div class="space-y-4">
                            @foreach($orders as $order)
                                <div class="p-4 sm:p-5 rounded-2xl bg-[#F8FAFC] dark:bg-[#0E1722] border border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2">
                                            <h4 class="text-sm font-black text-[#172B3A] dark:text-white">{{ $order->product_name }}</h4>
                                            <span class="badge-lush text-[10px]">{{ $order->plan_name }}</span>
                                            @if($order->isActive())
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800">
                                                    ✓ Đang hoạt động
                                                </span>
                                            @elseif($order->payment_status === 'pending')
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800">
                                                    Chờ duyệt thanh toán
                                                </span>
                                            @else
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600">
                                                    {{ $order->payment_status }}
                                                </span>
                                            @endif
                                        </div>

                                        @if($order->license_key)
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs text-[#718096]">Key:</span>
                                                <span class="font-mono text-xs font-black text-[#168BD2] bg-white dark:bg-[#1A2634] px-2.5 py-1 rounded-lg border border-[#168BD2]/30">{{ $order->license_key }}</span>
                                                <button type="button" onclick="navigator.clipboard.writeText('{{ $order->license_key }}'); alert('Đã sao chép License Key!')" class="text-[11px] text-[#168BD2] hover:underline font-bold">
                                                    Sao chép
                                                </button>
                                            </div>
                                        @else
                                            <p class="text-xs text-amber-500 font-medium">Hệ thống đang kiểm tra giao dịch VietQR để cấp key trong 5 phút...</p>
                                        @endif

                                        <p class="text-[11px] text-[#718096]">
                                            Thời hạn: 
                                            @if(is_null($order->license_expires_at) || strtolower($order->billing_cycle) === 'lifetime')
                                                <strong class="text-emerald-600">Vĩnh viễn (Lifetime)</strong>
                                            @else
                                                <strong class="text-[#172B3A] dark:text-white">{{ $order->license_expires_at->format('d/m/Y') }}</strong>
                                                ({{ $order->license_expires_at->diffForHumans() }})
                                            @endif
                                            • Mã đơn: <span class="font-mono">{{ $order->order_code }}</span>
                                        </p>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('downloads.index') }}" class="lush-btn-secondary !text-xs !py-2 !px-4">
                                            Tải Bộ Cài Đặt
                                        </a>
                                        <a href="https://zalo.me/0988123456" target="_blank" class="lush-btn-primary !text-xs !py-2 !px-3" title="Hỗ trợ Ultraview">
                                            Hỗ Trợ 1-1
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="py-8 text-center space-y-3">
                            <div class="w-12 h-12 rounded-full bg-[#168BD2]/10 text-[#168BD2] mx-auto flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
                            </div>
                            <h4 class="text-sm font-bold text-[#172B3A] dark:text-white">Bạn chưa đăng ký bản quyền phần mềm nào</h4>
                            <p class="text-xs text-[#718096] max-w-sm mx-auto">
                                Khám phá các giải pháp tự động hóa tiếp thị và công cụ tăng trưởng doanh số với ưu đãi kích hoạt ngay hôm nay.
                            </p>
                            <a href="{{ route('pricing.index') }}" class="lush-btn-primary !text-xs !py-2.5 !px-5 inline-block">
                                Xem Bảng Giá Phần Mềm &rarr;
                            </a>
                        </div>
                    @endif
                </div>

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

