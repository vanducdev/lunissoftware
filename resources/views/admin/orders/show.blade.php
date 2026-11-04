@extends('layouts.admin')

@section('page_title', "Chi Tiết Đơn Hàng #{$order->order_code}")

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="text-xs font-bold text-[#718096]">Đơn hàng:</span>
                <span class="font-mono text-lg font-black text-[#168BD2]">{{ $order->order_code }}</span>
                @if($order->payment_status === 'paid')
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">
                        ✓ Đã thanh toán & cấp key
                    </span>
                @elseif($order->payment_status === 'pending')
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">
                        Chờ duyệt thanh toán
                    </span>
                @else
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                        {{ $order->payment_status }}
                    </span>
                @endif
            </div>
            <p class="text-xs text-[#718096]">Khởi tạo lúc {{ $order->created_at->format('d/m/Y H:i:s') }} ({{ $order->created_at->diffForHumans() }})</p>
        </div>

        <div class="flex items-center gap-3">
            @if($order->payment_status === 'pending')
                <form method="POST" action="{{ route('admin.orders.approve', $order->id) }}" onsubmit="return confirm('Xác nhận đã nhận chuyển khoản và cấp License Key cho khách hàng?')">
                    @csrf
                    <button type="submit" class="lush-btn-primary lush-btn-vip !text-xs !py-2.5 !px-5 bg-emerald-600 hover:bg-emerald-700 shadow-md shadow-emerald-600/20">
                        ✓ Duyệt & Sinh Key Bản Quyền
                    </button>
                </form>
            @endif
            <a href="{{ route('admin.orders.index') }}" class="lush-btn-secondary !text-xs !py-2.5">
                &larr; Quay lại danh sách
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Left: Customer & Package Info -->
        <div class="lg:col-span-7 space-y-6">
            <!-- Customer Card -->
            <div class="lush-card p-6 space-y-3">
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3 flex items-center justify-between">
                    <span>1. Thông Tin Khách Hàng</span>
                    @if($order->user)
                        <span class="text-xs font-bold text-[#168BD2]">Tài khoản: ID #{{ $order->user->id }}</span>
                    @else
                        <span class="text-xs text-[#718096]">Khách vãng lai (Guest)</span>
                    @endif
                </h3>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Họ và tên:</span>
                        <span class="font-bold text-[#172B3A] dark:text-white">{{ $order->customer_name }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Số điện thoại / Zalo:</span>
                        <a href="https://zalo.me/{{ preg_replace('/[^0-9]/', '', $order->customer_phone) }}" target="_blank" class="font-bold font-mono text-[#168BD2] hover:underline">
                            {{ $order->customer_phone }} (Chat Zalo &rarr;)
                        </a>
                    </div>
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Email nhận key:</span>
                        <span class="font-mono text-[#172B3A] dark:text-white">{{ $order->customer_email }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-[#718096]">Địa chỉ IP:</span>
                        <span class="font-mono text-[#718096]">{{ $order->ip_address ?? '127.0.0.1' }}</span>
                    </div>
                </div>
            </div>

            <!-- Package & Payment Details -->
            <div class="lush-card p-6 space-y-3">
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">
                    2. Chi Tiết Gói Đăng Ký & Thanh Toán
                </h3>

                <div class="space-y-2 text-xs">
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Phần mềm:</span>
                        <span class="font-bold text-[#172B3A] dark:text-white">{{ $order->product_name }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Gói bản quyền:</span>
                        <span class="font-bold text-[#168BD2]">{{ $order->plan_name }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Chu kỳ thanh toán:</span>
                        <span class="font-bold text-[#172B3A] dark:text-white">{{ $order->billing_cycle }}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <span class="text-[#718096]">Phương thức:</span>
                        <span class="font-bold text-[#172B3A] dark:text-white uppercase">{{ $order->payment_method }} (Ngân Hàng)</span>
                    </div>
                    <div class="flex justify-between py-2 items-center bg-[#F8FAFC] dark:bg-[#0B1118] px-3 rounded-xl">
                        <span class="text-xs font-bold text-[#172B3A] dark:text-white">Tổng tiền thanh toán:</span>
                        <span class="text-xl font-black text-emerald-600 dark:text-emerald-400">
                            {{ number_format($order->amount, 0, ',', '.') }} VNĐ
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: License Configuration Form -->
        <div class="lg:col-span-5 space-y-6">
            <div class="lush-card p-6 space-y-4">
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3 flex items-center justify-between">
                    <span>3. Quản Lý License Key Bản Quyền</span>
                    <span class="w-2.5 h-2.5 rounded-full {{ $order->isActive() ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
                </h3>

                <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Trạng thái thanh toán</label>
                        <select name="payment_status" class="lush-input text-xs w-full py-2 px-3">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Chờ thanh toán (Pending)</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Đã thanh toán (Paid)</option>
                            <option value="cancelled" {{ $order->payment_status === 'cancelled' ? 'selected' : '' }}>Đã hủy (Cancelled)</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Hoàn tiền (Refunded)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Mã Bản Quyền (License Key)</label>
                        <input type="text" name="license_key" value="{{ old('license_key', $order->license_key) }}" placeholder="LUSH-XXXX-YYYY-ZZZZ" class="lush-input font-mono text-xs w-full py-2 px-3 font-bold text-[#168BD2]">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Số thiết bị cho phép</label>
                            <input type="number" name="device_count_allowed" min="1" max="100" value="{{ old('device_count_allowed', $order->device_count_allowed) }}" class="lush-input text-xs w-full py-2 px-3">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Hạn sử dụng</label>
                            <input type="date" name="license_expires_at" value="{{ old('license_expires_at', $order->license_expires_at ? $order->license_expires_at->format('Y-m-d') : '') }}" class="lush-input text-xs w-full py-2 px-3">
                        </div>
                    </div>

                    @if($order->activated_at)
                        <div class="p-3 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs">
                            ✓ Kích hoạt lần đầu: <strong>{{ $order->activated_at->format('d/m/Y H:i') }}</strong>
                        </div>
                    @endif

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Ghi chú quản trị</label>
                        <textarea name="admin_notes" rows="3" placeholder="Nhập ghi chú cho đơn hàng..." class="lush-input text-xs w-full py-2 px-3">{{ old('admin_notes', $order->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="lush-btn-primary w-full !text-xs !py-2.5 !justify-center">
                        Cập Nhật Thông Tin Bản Quyền
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

