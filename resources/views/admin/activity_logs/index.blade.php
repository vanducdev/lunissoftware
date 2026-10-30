@extends('layouts.admin')

@section('title', 'Nhật ký Hoạt động Hệ thống')
@section('page_title', 'Nhật ký Hoạt động (Audit Logs)')

@section('content')
<div class="space-y-6">
    <!-- Header & Filter -->
    <div class="lush-card p-6">
        <form method="GET" action="{{ route('admin.activity-logs.index') }}" class="flex flex-col md:flex-row gap-4 items-center justify-between">
            <div class="flex-1 w-full grid grid-cols-1 md:grid-cols-2 gap-3">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo nội dung ghi chú..." class="lush-input text-xs">
                
                <select name="action" class="lush-input text-xs" onchange="this.form.submit()">
                    <option value="">-- Tất cả hành động --</option>
                    @foreach($actions as $act)
                        <option value="{{ $act }}" {{ request('action') === $act ? 'selected' : '' }}>{{ $act }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex items-center gap-2">
                <button type="submit" class="lush-btn-primary !text-xs !py-2.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Lọc
                </button>
                @if(request()->anyFilled(['search', 'action']))
                    <a href="{{ route('admin.activity-logs.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Xóa bộ lọc</a>
                @endif
            </div>
        </form>
    </div>

    <!-- Logs Table -->
    <div class="lush-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F8FAFC] dark:bg-[#131D27] border-b border-[#E8EDF2] dark:border-[#1E2D3D] text-[#718096] dark:text-[#94A3B8] uppercase tracking-wider font-semibold">
                    <tr>
                        <th class="px-6 py-3.5">Thời gian</th>
                        <th class="px-6 py-3.5">Người thực hiện</th>
                        <th class="px-6 py-3.5">Hành động</th>
                        <th class="px-6 py-3.5">Chi tiết</th>
                        <th class="px-6 py-3.5">Địa chỉ IP</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                    @forelse($logs as $log)
                        <tr class="hover:bg-[#F8FAFC]/60 dark:hover:bg-[#131D27]/60 transition-colors">
                            <td class="px-6 py-3.5 text-[#718096] whitespace-nowrap">
                                {{ $log->created_at->format('d/m/Y H:i:s') }}
                                <span class="block text-[10px] text-[#718096]/80">{{ $log->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="px-6 py-3.5 whitespace-nowrap">
                                @if($log->user)
                                    <div class="flex items-center gap-2">
                                        <img src="{{ $log->user->avatar_url }}" alt="{{ $log->user->name }}" class="w-6 h-6 rounded-full object-cover">
                                        <span class="font-semibold text-[#172B3A] dark:text-white">{{ $log->user->name }}</span>
                                    </div>
                                @else
                                    <span class="text-[#718096] italic">Khách (Guest)</span>
                                @endif
                            </td>
                            <td class="px-6 py-3.5 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-[#168BD2]/10 text-[#168BD2] dark:bg-[#168BD2]/20 dark:text-[#48B4E5]">
                                    {{ $log->action }}
                                </span>
                            </td>
                            <td class="px-6 py-3.5 text-[#172B3A] dark:text-[#E2E8F0] max-w-md break-words">
                                {{ $log->description }}
                            </td>
                            <td class="px-6 py-3.5 text-[#718096] font-mono text-[11px] whitespace-nowrap">
                                {{ $log->ip_address ?? '127.0.0.1' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-[#718096]">
                                Không tìm thấy lịch sử hoạt động nào phù hợp.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
