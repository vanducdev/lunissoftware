@extends('layouts.app')

@section('title', __('All Products') . ' – LushSoftware')
@section('meta_description', 'Khám phá hệ sinh thái phần mềm LushSoftware: Tự động hóa tiếp thị, nuôi nick đa kênh, quản trị CRM và quét dữ liệu thị trường chuyên nghiệp.')

@section('content')
<div class="py-12 lg:py-20 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('Products')]]" />

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-12" data-aos="fade-up">
            <span class="badge-lush mb-3">HỆ SINH THÁI CÔNG NGHỆ LUSH</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                Hệ Thống Phần Mềm <span class="bg-gradient-to-r from-[#168BD2] via-[#2094DB] to-[#48B4E5] bg-clip-text text-transparent">LushSoftware</span>
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto">
                Giải pháp toàn diện giúp doanh nghiệp tự động hóa tiếp thị, tối ưu chi phí vận hành và nhân sự lên đến 60%, bứt phá doanh số trên đa nền tảng.
            </p>

            <!-- Quick Trust Badges -->
            <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-6 mt-6 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0]">
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>100% Bản quyền chính hãng</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2]"></span>
                    <span>Cập nhật liên tục 2026</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                    <span>Hỗ trợ kỹ thuật Ultraview 24/7</span>
                </div>
            </div>
        </div>

        <!-- Category Tabs Sticky Filter Bar -->
        <div class="sticky top-[69px] z-30 bg-white/95 dark:bg-[#0B1118]/95 backdrop-blur-xl py-3.5 border-b border-[#E8EDF2] dark:border-[#1E2D3D] -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mb-8 shadow-xs transition-all">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none sm:justify-center max-w-7xl mx-auto">
                <!-- All tab -->
                <a href="{{ route('products.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ !request('category') ? 'bg-[#168BD2] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-[#F8FAFC] dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                    <span>Tất Cả Sản Phẩm</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] {{ !request('category') ? 'bg-white/20 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096]' }}">
                        {{ $categories->sum('products_count') }}
                    </span>
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('products.index', array_filter(['category' => $cat->slug, 'search' => request('search'), 'sort' => request('sort')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ request('category') === $cat->slug ? 'bg-[#168BD2] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-[#F8FAFC] dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                        <span>{{ $cat->name }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] {{ request('category') === $cat->slug ? 'bg-white/20 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096]' }}">
                            {{ $cat->products_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Filter & Search Dock -->
        <div class="bg-white dark:bg-[#131D27] p-4 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs mb-10" data-aos="fade-up">
            <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <!-- Search input -->
                <div class="md:col-span-8 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm theo tên phần mềm hoặc tính năng (VD: marketing, nuôi nick, CRM...)" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs sm:text-sm focus:outline-none focus:border-[#168BD2] transition-colors">
                    <svg class="w-4 h-4 text-[#718096] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Sort select -->
                <div class="md:col-span-4">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs sm:text-sm focus:outline-none focus:border-[#168BD2] transition-colors cursor-pointer">
                        <option value="order" {{ request('sort') === 'order' ? 'selected' : '' }}>Sắp xếp: Mặc định</option>
                        <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Sắp xếp: Xem nhiều nhất</option>
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Sắp xếp: Mới nhất</option>
                        <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Sắp xếp: Tên A-Z</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Product Grid (MKT Style Software Cards with Mockup Graphic) -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="lush-card overflow-hidden flex flex-col justify-between group hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-[#168BD2]/15 transition-all duration-300 border border-[#E8EDF2] dark:border-[#1E2D3D]" data-aos="fade-up">
                        <div>
                            <!-- Top Mockup Image Container (Clean Unobstructed Mockup) -->
                            <div class="relative w-full h-64 sm:h-72 bg-gradient-to-tr from-[#F8FAFC] via-[#F0F6FB] to-[#E8F3FA] dark:from-[#0D151F] dark:via-[#111A24] dark:to-[#162230] p-6 flex items-center justify-center overflow-hidden border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-[#168BD2]/5 to-transparent group-hover:via-[#168BD2]/15 transition-all duration-500"></div>

                                @if($product->banner_url)
                                    <a href="{{ route('products.show', $product->slug) }}" class="relative z-10 w-full h-full flex items-center justify-center">
                                        <img src="{{ $product->banner_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain transform group-hover:scale-105 transition-transform duration-500 drop-shadow-xl">
                                    </a>
                                @else
                                    <div class="relative z-10 flex flex-col items-center justify-center">
                                        <x-product-icon :slug="$product->slug" size="xl" class="group-hover:scale-110 transition-transform duration-500 shadow-xl" />
                                    </div>
                                @endif
                            </div>

                            <!-- Card Body Content -->
                            <div class="p-6">
                                <!-- Category & Version Badge Header -->
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                                        {{ $product->category->name ?? 'SaaS' }}
                                    </span>
                                    <div class="flex items-center gap-1.5">
                                        <span class="px-2 py-0.5 rounded-full text-[10.5px] font-mono font-bold bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                                            {{ $product->version ?? 'v2.4' }}
                                        </span>
                                        @if($product->is_featured)
                                            <span class="px-2 py-0.5 rounded-full text-[9.5px] font-black uppercase tracking-wider bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-2xs">
                                                HOT
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Title with App Icon -->
                                <div class="flex items-start gap-3 mb-2.5">
                                    <div class="shrink-0 mt-0.5">
                                        @if($product->logo_url)
                                            <img src="{{ $product->logo_url }}" alt="{{ $product->name }}" class="w-9 h-9 rounded-xl object-contain border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs">
                                        @else
                                            <x-product-icon :slug="$product->slug" size="sm" />
                                        @endif
                                    </div>
                                    <div>
                                        <h2 class="text-lg font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors leading-snug">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                {{ $product->trans('name') }}
                                            </a>
                                        </h2>
                                        <p class="text-xs font-semibold text-[#168BD2] mt-0.5 line-clamp-1">
                                            {{ $product->trans('tagline') }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Brief Description -->
                                <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-2 leading-relaxed mb-4">
                                    {{ $product->trans('description') }}
                                </p>

                                <!-- Key Features Bullet Points (Dấu tích xanh giống MKT Software) -->
                                @if($product->features->count() > 0)
                                    <div class="space-y-2 pt-3 pb-2 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#718096] block mb-1.5">Tính năng nổi bật:</span>
                                        @foreach($product->features->take(3) as $feature)
                                            <div class="flex items-start gap-2 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                                <div class="w-4 h-4 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                </div>
                                                <span class="truncate font-medium">{{ $feature->title }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Supported OS / Platforms -->
                                <div class="flex items-center gap-2 pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-[10.5px] text-[#718096] dark:text-[#94A3B8]">
                                    <span class="font-semibold text-[#172B3A] dark:text-white">Hệ điều hành:</span>
                                    <span class="px-1.5 py-0.5 rounded bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52]">Windows 10/11</span>
                                    <span class="px-1.5 py-0.5 rounded bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52]">macOS</span>
                                    <span class="px-1.5 py-0.5 rounded bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52]">Cloud</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons (Footer) -->
                        <div class="p-6 pt-0">
                            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-2.5">
                                <a href="{{ route('products.show', $product->slug) }}" class="lush-btn-primary flex-1 !text-xs !py-2.5 !justify-center shadow-md shadow-[#168BD2]/20">
                                    <span>{{ __('View Details') }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                @if($product->download_url)
                                    <a href="{{ $product->download_url }}" target="_blank" class="lush-btn-secondary !text-xs !py-2.5 !px-3" title="Tải bộ cài đặt">
                                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        <span>Tải về</span>
                                    </a>
                                @else
                                    <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-secondary !text-xs !py-2.5 !px-3" title="Đăng ký nhận bản dùng thử">
                                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>Dùng thử</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white dark:bg-[#131D27] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-8 max-w-xl mx-auto shadow-sm">
                <div class="w-16 h-16 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-1">Không tìm thấy phần mềm phù hợp</h3>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mb-6">Vui lòng thử tìm với từ khóa khác hoặc chuyển danh mục.</p>
                <a href="{{ route('products.index') }}" class="lush-btn-primary !text-xs !py-2.5 !px-6">Xem tất cả giải pháp</a>
            </div>
        @endif

        <!-- Bottom Assistance & Consultation Banner -->
        <div class="mt-20 p-8 sm:p-12 rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#EDF6FC] to-[#E3F2FB] dark:from-[#111A24] dark:to-[#182330] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-3">
                    <span class="text-xs font-black uppercase tracking-wider text-[#168BD2]">TƯ VẤN LỘ TRÌNH MIỄN PHÍ</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                        Chưa biết phần mềm nào phù hợp nhất với mô hình của bạn?
                    </h2>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed max-w-2xl">
                        Đội ngũ kỹ sư giải pháp của LushSoftware sẽ phân tích mô hình kinh doanh, quy mô đội ngũ và đề xuất bộ công cụ tối ưu nhất kèm lộ trình chuyển giao công nghệ 1-1.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('contact') }}" class="lush-btn-primary !py-3.5 !text-sm !justify-center shadow-lg shadow-[#168BD2]/30">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Đăng Ký Tư Vấn & Demo 1-1</span>
                    </a>
                    <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary !py-3.5 !text-sm !justify-center">
                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
