@extends('layouts.admin')

@section('page_title', 'Tổng Quan Quản Trị Hệ Thống')

@section('content')
<div class="space-y-8">
    <!-- Top Metric Counters -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-5">
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
        <!-- Metric 5: Doanh Thu & Đơn Hàng -->
        <div class="lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider">Doanh Thu & Đơn</span>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="flex items-baseline justify-between">
                <span class="text-2xl font-black text-emerald-600 dark:text-emerald-400">{{ number_format($stats['total_revenue'] ?? 0, 0, ',', '.') }} đ</span>
            </div>
            <div class="flex items-center justify-between mt-3 pt-2 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-[11px]">
                <span class="text-amber-500 font-bold">{{ $stats['pending_orders'] ?? 0 }} đơn chờ cấp key</span>
                <a href="{{ route('admin.orders.index') }}" class="text-[#168BD2] hover:underline font-semibold">Xem &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Masterpiece SEO Health & Google Indexing Audit Console -->
    <div class="lush-card p-6 sm:p-8 bg-gradient-to-br from-white via-[#F8FAFC] to-[#F0F8FF] dark:from-[#111A24] dark:via-[#131F2E] dark:to-[#0B1522] border border-[#168BD2]/30 shadow-xl relative overflow-hidden">
        <!-- Ambient Background Glow -->
        <div class="absolute -top-20 -right-20 w-60 h-60 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-6 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_10px_#10B981] animate-pulse"></span>
                    <span class="text-xs font-black uppercase tracking-wider text-[#168BD2]">TRUNG TÂM GIÁM SÁT SEO GOOGLE 2026</span>
                    <span class="text-[11px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 px-2.5 py-0.5 rounded-full border border-emerald-500/20">
                        RankBrain & EEAT Optimized
                    </span>
                </div>
                <h3 class="text-xl font-black text-[#172B3A] dark:text-white">Sức Khỏe SEO Toàn Trang & Chỉ Mục Tìm Kiếm</h3>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8]">Toàn bộ bài viết, sản phẩm và trang đích đều được áp dụng Schema.org JSON-LD, thẻ Canonical và chuẩn On-Page.</p>
            </div>

            <div class="flex items-center gap-4 bg-white dark:bg-[#0B1118] px-5 py-3 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
                <div class="text-right">
                    <span class="text-[10px] uppercase font-bold text-[#718096] block">SEO Health Score</span>
                    <span class="text-xs font-bold text-emerald-600">Tuyệt Vời (Xanh)</span>
                </div>
                <div class="flex items-baseline gap-1">
                    <span class="text-3xl font-black text-[#168BD2]">{{ $seoAudit['overall_health_score'] ?? 96 }}</span>
                    <span class="text-xs text-[#718096]">/100</span>
                </div>
            </div>
        </div>

        <!-- 4 SEO Metric Highlights -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 pt-6">
            <div class="p-4 rounded-xl bg-white dark:bg-[#0E1722] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div class="flex items-center justify-between text-[#718096] mb-1 text-xs">
                    <span>Bài Viết Chuẩn SEO</span>
                    <span class="text-emerald-600 font-bold">{{ $seoAudit['articles_percent'] }}%</span>
                </div>
                <div class="flex items-baseline gap-1">
                    <span class="text-xl font-black text-[#172B3A] dark:text-white">{{ $seoAudit['articles_optimized'] }}</span>
                    <span class="text-xs text-[#718096]">/ {{ $seoAudit['articles_total'] }} bài</span>
                </div>
                <div class="w-full bg-[#E8EDF2] dark:bg-[#1E2D3D] h-1.5 rounded-full mt-2 overflow-hidden">
                    <div class="bg-emerald-500 h-full rounded-full" style="width: {{ $seoAudit['articles_percent'] }}%"></div>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white dark:bg-[#0E1722] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div class="flex items-center justify-between text-[#718096] mb-1 text-xs">
                    <span>Sản Phẩm Tối Ưu SEO</span>
                    <span class="text-emerald-600 font-bold">{{ $seoAudit['products_percent'] }}%</span>
                </div>
                <div class="flex items-baseline gap-1">
                    <span class="text-xl font-black text-[#172B3A] dark:text-white">{{ $seoAudit['products_optimized'] }}</span>
                    <span class="text-xs text-[#718096]">/ {{ $seoAudit['products_total'] }} sản phẩm</span>
                </div>
                <div class="w-full bg-[#E8EDF2] dark:bg-[#1E2D3D] h-1.5 rounded-full mt-2 overflow-hidden">
                    <div class="bg-[#168BD2] h-full rounded-full" style="width: {{ $seoAudit['products_percent'] }}%"></div>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-white dark:bg-[#0E1722] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div class="flex items-center justify-between text-[#718096] mb-1 text-xs">
                    <span>Sitemap XML URLs</span>
                    <span class="text-[#168BD2] font-bold">Live</span>
                </div>
                <div class="flex items-baseline gap-1">
                    <span class="text-xl font-black text-[#172B3A] dark:text-white">{{ $seoAudit['sitemap_urls'] }}</span>
                    <span class="text-xs text-[#718096]">liên kết index</span>
                </div>
                <a href="{{ url('/sitemap.xml') }}" target="_blank" class="text-[11px] text-[#168BD2] hover:underline font-bold mt-1.5 inline-block">Xem Sitemap.xml &rarr;</a>
            </div>

            <div class="p-4 rounded-xl bg-white dark:bg-[#0E1722] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div class="flex items-center justify-between text-[#718096] mb-1 text-xs">
                    <span>Google Robots & Tag</span>
                    <span class="text-emerald-600 font-bold">200 OK</span>
                </div>
                <div class="flex items-baseline gap-1">
                    <span class="text-xl font-black text-emerald-600">index, follow</span>
                </div>
                <a href="{{ url('/robots.txt') }}" target="_blank" class="text-[11px] text-[#718096] hover:underline font-medium mt-1.5 inline-block">Xem robots.txt &rarr;</a>
            </div>
        </div>

        <!-- Quick SEO Actions Bar -->
        <div class="mt-6 pt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-col sm:flex-row items-center justify-between gap-3">
            <span class="text-xs text-[#718096] dark:text-[#94A3B8]">Tác vụ quản trị SEO nhanh:</span>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.articles.create') }}" class="lush-btn-primary !text-xs !py-2 !px-4 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    <span>Viết Bài Chuẩn SEO Ngay</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="lush-btn-secondary !text-xs !py-2 !px-4 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
                    <span>Cấu Hình Webmaster Tag</span>
                </a>
            </div>
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

        <!-- Visual Bar Chart Dynamic -->
        <div class="h-44 flex items-end gap-3 sm:gap-6 pt-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-2">
            @foreach($dailyInquiries as $item)
                <div class="flex-1 flex flex-col items-center gap-2 group relative">
                    <div class="w-full bg-[#168BD2]/30 group-hover:bg-[#168BD2] rounded-t-md transition-colors" style="height: {{ $item['height'] }}px;"></div>
                    <span class="text-[10px] text-[#718096] text-center truncate w-full">{{ $item['date'] }}</span>
                    <!-- Tooltip -->
                    <div class="absolute -top-7 bg-[#172B3A] text-white text-[10px] py-0.5 px-1.5 rounded opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none whitespace-nowrap">
                        {{ $item['count'] }} yêu cầu
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Two Columns: Recent Contacts & Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Recent Orders & License Activations -->
        <div class="lg:col-span-12 lush-card p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white">Đơn Hàng Bản Quyền Mới Nhất</h3>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="text-xs text-[#168BD2] hover:underline font-semibold">Quản lý tất cả đơn &rarr;</a>
            </div>

            @if($recentOrders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <tr>
                                <th class="pb-3 font-semibold">Mã đơn</th>
                                <th class="pb-3 font-semibold">Khách hàng</th>
                                <th class="pb-3 font-semibold">Phần mềm</th>
                                <th class="pb-3 font-semibold">Số tiền</th>
                                <th class="pb-3 font-semibold">Trạng thái</th>
                                <th class="pb-3 font-semibold">Mã Key</th>
                                <th class="pb-3 font-semibold text-right">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                            @foreach($recentOrders as $ro)
                                <tr>
                                    <td class="py-3 font-mono font-bold text-[#168BD2]">{{ $ro->order_code }}</td>
                                    <td class="py-3">
                                        <p class="font-bold text-[#172B3A] dark:text-white">{{ $ro->customer_name }}</p>
                                        <p class="text-[#718096] text-[11px]">{{ $ro->customer_phone }}</p>
                                    </td>
                                    <td class="py-3">
                                        <span class="font-bold text-[#172B3A] dark:text-white">{{ $ro->product_name }}</span>
                                        <span class="text-[10px] text-[#718096] block">{{ $ro->plan_name }}</span>
                                    </td>
                                    <td class="py-3 font-mono font-bold text-emerald-600">{{ number_format($ro->amount, 0, ',', '.') }} đ</td>
                                    <td class="py-3">
                                        @if($ro->payment_status === 'paid')
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Đã kích hoạt</span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Chờ duyệt key</span>
                                        @endif
                                    </td>
                                    <td class="py-3 font-mono text-[11px] font-bold text-[#168BD2]">{{ $ro->license_key ?? 'Chưa cấp' }}</td>
                                    <td class="py-3 text-right">
                                        <a href="{{ route('admin.orders.show', $ro->id) }}" class="text-[#168BD2] font-semibold hover:underline">Chi tiết &rarr;</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-xs text-[#718096] py-6 text-center">Chưa có đơn hàng nào.</p>
            @endif
        </div>

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

