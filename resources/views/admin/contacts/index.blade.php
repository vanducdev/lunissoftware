@extends('layouts.admin')

@section('page_title', 'Quản Lý Yêu Cầu Liên Hệ & Tư Vấn')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Danh Sách Yêu Cầu Tư Vấn</h2>
        <p class="text-xs text-[#718096]">Theo dõi thông tin khách hàng tiềm năng, nhu cầu phần mềm và tiến độ chăm sóc</p>
    </div>

    <!-- Filter Bar -->
    <div class="lush-card p-4">
        <form method="GET" action="{{ route('admin.contacts.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3">
            <div class="sm:col-span-8 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên khách hàng, email, số điện thoại hoặc công ty..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                <svg class="w-4 h-4 text-[#718096] absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="sm:col-span-4">
                <select name="status" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả trạng thái</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Chờ xử lý (Pending)</option>
                    <option value="processing" {{ request('status') === 'processing' ? 'selected' : '' }}>Đang xử lý (Processing)</option>
                    <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Đã hoàn thành (Resolved)</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Contacts Table -->
    <div class="lush-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <tr>
                        <th class="px-6 py-3.5 font-bold">Khách hàng</th>
                        <th class="px-6 py-3.5 font-bold">Liên hệ</th>
                        <th class="px-6 py-3.5 font-bold">Quan tâm</th>
                        <th class="px-6 py-3.5 font-bold">Trạng thái</th>
                        <th class="px-6 py-3.5 font-bold">Thời gian gửi</th>
                        <th class="px-6 py-3.5 font-bold text-right">Chi tiết</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-bold text-[#172B3A] dark:text-white">{{ $msg->name }}</p>
                                <p class="text-[11px] text-[#718096]">{{ $msg->company ?: 'Cá nhân' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-[#172B3A] dark:text-white font-mono">{{ $msg->phone ?: 'N/A' }}</p>
                                <p class="text-[#718096] text-[11px]">{{ $msg->email }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded-md text-[11px] font-semibold bg-[#168BD2]/10 text-[#168BD2]">
                                    {{ $msg->product_interest ?: 'Tư vấn giải pháp' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($msg->status === 'pending')
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Chờ xử lý</span>
                                @elseif($msg->status === 'processing')
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Đang xử lý</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Hoàn thành</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-[#718096]">{{ $msg->created_at->format('H:i d/m/Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.contacts.show', $msg->id) }}" class="lush-btn-secondary !text-xs !py-1 !px-2.5">
                                    Chi tiết &rarr;
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-[#718096]">Chưa có yêu cầu liên hệ nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
