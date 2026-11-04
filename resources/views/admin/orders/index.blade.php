@extends('layouts.admin')

@section('page_title', 'Quản Lý Đơn Hàng & Bản Quyền')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Quản Lý Đơn Hàng & Cấp Key Bản Quyền</h2>
            <p class="text-xs text-[#718096]">Theo dõi giao dịch VietQR, duyệt đơn thanh toán và quản lý mã bản quyền phần mềm</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.orders.export') }}" class="lush-btn-secondary !text-xs !py-2.5 flex items-center gap-1.5">
                <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                <span>Xuất File CSV</span>
            </a>
        </div>
    </div>

    <!-- Stats Summary Row -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="p-4 rounded-2xl bg-white dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
            <span class="text-[11px] font-bold text-[#718096] uppercase tracking-wider block mb-1">Tổng Số Đơn</span>
            <span class="text-2xl font-black text-[#172B3A] dark:text-white">{{ $stats['total'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-white dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
            <span class="text-[11px] font-bold text-amber-500 uppercase tracking-wider block mb-1">Chờ Duyệt Key</span>
            <span class="text-2xl font-black text-amber-500">{{ $stats['pending'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-white dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
            <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider block mb-1">Đã Kích Hoạt Key</span>
            <span class="text-2xl font-black text-emerald-600">{{ $stats['paid'] }}</span>
        </div>
        <div class="p-4 rounded-2xl bg-white dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
            <span class="text-[11px] font-bold text-[#168BD2] uppercase tracking-wider block mb-1">Doanh Thu Kích Hoạt</span>
            <span class="text-2xl font-black text-[#168BD2]">{{ number_format($stats['revenue'], 0, ',', '.') }} đ</span>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="lush-card p-4">
        <form method="GET" action="{{ route('admin.orders.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3">
            <div class="sm:col-span-8 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo mã đơn, tên khách, số điện thoại, email hoặc license key..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                <svg class="w-4 h-4 text-[#718096] absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="sm:col-span-4">
                <select name="status" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả trạng thái</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Chờ thanh toán & cấp key</option>
                    <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Đã thanh toán (Active)</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="lush-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <tr>
                        <th class="px-5 py-3.5 font-bold">Mã Đơn / Ngày tạo</th>
                        <th class="px-5 py-3.5 font-bold">Khách Hàng</th>
                        <th class="px-5 py-3.5 font-bold">Phần Mềm / Gói</th>
                        <th class="px-5 py-3.5 font-bold">Số Tiền</th>
                        <th class="px-5 py-3.5 font-bold">Trạng Thái</th>
                        <th class="px-5 py-3.5 font-bold">License Key</th>
                        <th class="px-5 py-3.5 font-bold text-right">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                    @forelse($orders as $o)
                        <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                            <td class="px-5 py-4">
                                <a href="{{ route('admin.orders.show', $o->id) }}" class="font-mono font-black text-[#168BD2] hover:underline block text-sm">
                                    {{ $o->order_code }}
                                </a>
                                <span class="text-[11px] text-[#718096]">{{ $o->created_at->format('d/m/Y H:i') }}</span>
                            </td>
                            <td class="px-5 py-4">
                                <p class="font-bold text-[#172B3A] dark:text-white">{{ $o->customer_name }}</p>
                                <p class="text-[11px] text-[#718096] font-mono">{{ $o->customer_phone }}</p>
                                <p class="text-[11px] text-[#718096]">{{ $o->customer_email }}</p>
                            </td>
                            <td class="px-5 py-4">
                                <span class="font-bold text-[#172B3A] dark:text-white block">{{ $o->product_name }}</span>
                                <span class="badge-lush text-[10px] mt-0.5 inline-block">{{ $o->plan_name }} ({{ $o->billing_cycle }})</span>
                            </td>
                            <td class="px-5 py-4 font-mono font-bold text-[#172B3A] dark:text-white">
                                {{ number_format($o->amount, 0, ',', '.') }} đ
                            </td>
                            <td class="px-5 py-4">
                                @if($o->payment_status === 'paid')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 dark:bg-emerald-950/40 border border-emerald-200 dark:border-emerald-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Đã Kích Hoạt
                                    </span>
                                @elseif($o->payment_status === 'pending')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 dark:bg-amber-950/40 border border-amber-200 dark:border-amber-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                        Chờ Duyệt
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        {{ $o->payment_status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-5 py-4">
                                @if($o->license_key)
                                    <div class="flex items-center gap-1.5 font-mono text-xs font-black text-[#168BD2]">
                                        <span>{{ $o->license_key }}</span>
                                    </div>
                                    <span class="text-[10px] text-[#718096] block">
                                        Hết hạn: {{ $o->license_expires_at ? $o->license_expires_at->format('d/m/Y') : 'Vĩnh viễn' }}
                                    </span>
                                @else
                                    <span class="text-[11px] text-[#718096] italic">Chưa cấp key</span>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    @if($o->payment_status === 'pending')
                                        <form method="POST" action="{{ route('admin.orders.approve', $o->id) }}" onsubmit="return confirm('Xác nhận đã nhận tiền và tự động kích hoạt License Key cho đơn này?')">
                                            @csrf
                                            <button type="submit" class="p-1.5 px-2 rounded-lg bg-emerald-600 text-white text-[11px] font-bold hover:bg-emerald-700 transition-colors shadow-xs" title="Duyệt & Kích hoạt Key">
                                                ✓ Cấp Key
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('admin.orders.show', $o->id) }}" class="p-1.5 rounded-lg border border-[#E8EDF2] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2]" title="Chi tiết">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.orders.destroy', $o->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg border border-[#E8EDF2] text-rose-500 hover:bg-rose-50" title="Xóa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-[#718096]">
                                Chưa có đơn hàng nào được tạo.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection

