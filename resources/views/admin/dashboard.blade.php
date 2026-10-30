@extends('layouts.admin')

@section('page_title', 'Tổng Quan Quản Trị Hệ Thống')

@section('content')
<div class="space-y-8">
    <!-- Top Metric Counters -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Metric 1: Khách hàng / User -->
        <div class="lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider">Người Dùng & Khách Hàng</span>
                <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-[#172B3A] dark:text-white">{{ $stats['total_users'] }}</span>
                <span class="text-xs text-emerald-600 font-semibold bg-emerald-50 dark:bg-emerald-950/40 px-2 py-0.5 rounded-full">Tài khoản</span>
            </div>
            <a href="{{ route('admin.customers.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold mt-3 block">Xem danh sách &rarr;</a>
        </div>

        <!-- Metric 2: Sản phẩm -->
        <div class="lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider">Tổng Sản Phẩm</span>
                <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-[#172B3A] dark:text-white">{{ $stats['total_products'] }}</span>
                <span class="text-xs text-[#168BD2] font-semibold bg-[#168BD2]/10 px-2 py-0.5 rounded-full">Phần mềm</span>
            </div>
            <a href="{{ route('admin.products.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold mt-3 block">Quản lý sản phẩm &rarr;</a>
        </div>

        <!-- Metric 3: Bài viết -->
        <div class="lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider">Bài Viết CMS</span>
                <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-[#172B3A] dark:text-white">{{ $stats['total_articles'] }}</span>
                <span class="text-xs text-purple-600 font-semibold bg-purple-50 dark:bg-purple-950/40 px-2 py-0.5 rounded-full">Tin tức</span>
            </div>
            <a href="{{ route('admin.articles.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold mt-3 block">Quản lý bài viết &rarr;</a>
        </div>

        <!-- Metric 4: Yêu cầu tư vấn -->
        <div class="lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider">Yêu Cầu Chưa Xử Lý</span>
                <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/40 text-amber-500 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-amber-500">{{ $stats['pending_contacts'] }}</span>
                <span class="text-xs text-[#718096]">/ {{ $stats['total_contacts'] }} tổng số</span>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold mt-3 block">Xem chi tiết &rarr;</a>
        </div>
    </div>

    <!-- Analytics Chart & Quick Stat -->
    <div class="lush-card p-6 sm:p-8">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h3 class="text-base font-bold text-[#172B3A] dark:text-white">Lưu Lượng Truy Cập & Tương Tác Hệ Thống</h3>
                <p class="text-xs text-[#718096]">Thống kê lượt quan tâm theo tuần gần nhất</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="w-3 h-3 rounded-full bg-[#168BD2]"></span>
                <span class="text-xs text-[#718096]">Lượt tải & đăng ký</span>
            </div>
        </div>

        <!-- Visual Bar Chart -->
        <div class="h-44 flex items-end gap-3 sm:gap-6 pt-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-2">
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/30 hover:bg-[#168BD2] rounded-t-md h-20 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 2</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/40 hover:bg-[#168BD2] rounded-t-md h-28 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 3</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/30 hover:bg-[#168BD2] rounded-t-md h-24 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 4</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/50 hover:bg-[#168BD2] rounded-t-md h-32 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 5</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/60 hover:bg-[#168BD2] rounded-t-md h-36 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 6</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2]/70 hover:bg-[#168BD2] rounded-t-md h-40 transition-colors"></div>
                <span class="text-[10px] text-[#718096]">Thứ 7</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full bg-[#168BD2] rounded-t-md h-44 shadow-md shadow-[#168BD2]/30 transition-colors"></div>
                <span class="text-[10px] font-bold text-[#168BD2]">Chủ Nhật</span>
            </div>
        </div>
    </div>

    <!-- Two Columns: Recent Contacts & Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Recent Consultation Inquiries -->
        <div class="lg:col-span-7 lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-base font-bold text-[#172B3A] dark:text-white">Yêu Cầu Tư Vấn Mới</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold">Tất cả &rarr;</a>
            </div>

            @if($recentContacts->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <tr>
                                <th class="pb-3 font-semibold">Khách hàng</th>
                                <th class="pb-3 font-semibold">Sản phẩm</th>
                                <th class="pb-3 font-semibold">Trạng thái</th>
                                <th class="pb-3 font-semibold text-right">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                            @foreach($recentContacts as $c)
                                <tr>
                                    <td class="py-3">
                                        <p class="font-bold text-[#172B3A] dark:text-white">{{ $c->name }}</p>
                                        <p class="text-[#718096] text-[11px]">{{ $c->email }}</p>
                                    </td>
                                    <td class="py-3 text-[#718096]">{{ $c->product_interest ?: 'Tư vấn chung' }}</td>
                                    <td class="py-3">
                                        @if($c->status === 'pending')
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Chờ xử lý</span>
                                        @elseif($c->status === 'processing')
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-blue-600 border border-blue-200">Đang xử lý</span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Hoàn thành</span>
                                        @endif
                                    </td>
                                    <td class="py-3 text-right">
                                        <a href="{{ route('admin.contacts.show', $c->id) }}" class="text-[#168BD2] font-semibold hover:underline">Xem</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-xs text-[#718096] py-6 text-center">Chưa có yêu cầu tư vấn mới.</p>
            @endif
        </div>

        <!-- Recent Activity Logs -->
        <div class="lg:col-span-5 lush-card p-6">
            <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-4">Nhật Ký Hoạt Động Hệ Thống</h3>
            <div class="space-y-3.5">
                @foreach($recentActivities as $act)
                    <div class="flex items-start gap-3 text-xs pb-3 border-b border-[#E8EDF2] dark:border-[#1E2D3D] last:border-0 last:pb-0">
                        <div class="w-2 h-2 rounded-full bg-[#168BD2] mt-1.5 flex-shrink-0"></div>
                        <div class="flex-1">
                            <p class="font-bold text-[#172B3A] dark:text-white">{{ $act->action }}</p>
                            <p class="text-[#718096] text-[11px] mt-0.5">{{ $act->description }}</p>
                        </div>
                        <span class="text-[10px] text-[#718096] flex-shrink-0">{{ $act->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
