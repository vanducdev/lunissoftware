@extends('layouts.app')

@section('title', __('All Products') . ' – LushSoftware')
@section('meta_description', 'Khám phá hệ sinh thái phần mềm LushSoftware: Tự động hóa tiếp thị, nuôi nick đa kênh, quản trị CRM và quét dữ liệu thị trường chuyên nghiệp.')

@section('content')
<div class="relative py-12 lg:py-20 bg-white dark:bg-[#0B1118] overflow-hidden">
    <!-- VIP Ambient Radiant Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>
    <div class="absolute top-1/3 -right-32 w-80 h-80 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -left-32 w-80 h-80 bg-[#48B4E5]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs with sleek Glass Style -->
        <div class="mb-4">
            <x-breadcrumb :items="[['label' => __('Products')]]" />
        </div>

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-14" data-aos="fade-up">
            <!-- High-tech VIP Announcement Pill -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs mb-4 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                </span>
                <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">HỆ SINH THÁI CÔNG NGHỆ 2026</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• Thế Hệ Phần Mềm Bứt Phá Doanh Số</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-[#172B3A] dark:text-white tracking-tight leading-[1.12]">
                Hệ Thống Phần Mềm <br />
                <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                    LushSoftware Bứt Phá
                </span>
            </h1>

            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto font-normal">
                Bộ công cụ tự động hóa tiếp thị, quản trị hàng nghìn tài khoản, khai thác khách hàng tiềm năng và tối ưu phễu chuyển đổi toàn diện cho cá nhân và doanh nghiệp.
            </p>

            <!-- Quick Trust Badges with Crisp Bespoke SVG Icons -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 mt-7 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0]">
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>100% Bản quyền chính hãng</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span>Auto-Sync Thuật toán 2026</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Kỹ sư hỗ trợ 1-1 Ultraview</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M5 12h14M12 5l7 7-7 7"/></svg>
                    <span class="text-[#168BD2] font-bold">Dùng thử 7 ngày miễn phí</span>
                </div>
            </div>

            <!-- Real Rating Proof Line -->
            <div class="flex items-center justify-center gap-3 mt-5 pt-3">
                <div class="flex items-center -space-x-2">
                    <img class="inline-block h-7 w-7 rounded-full ring-2 ring-white dark:ring-[#0B1118] object-cover" src="{{ asset('images/avatars/avatar-1.jpg') }}" alt="User">
                    <img class="inline-block h-7 w-7 rounded-full ring-2 ring-white dark:ring-[#0B1118] object-cover" src="{{ asset('images/avatars/avatar-2.jpg') }}" alt="User">
                    <img class="inline-block h-7 w-7 rounded-full ring-2 ring-white dark:ring-[#0B1118] object-cover" src="{{ asset('images/avatars/avatar-3.jpg') }}" alt="User">
                    <div class="inline-flex items-center justify-center h-7 w-7 rounded-full bg-[#168BD2] text-white text-[10px] font-black ring-2 ring-white dark:ring-[#0B1118]">
                        +15k
                    </div>
                </div>
                <div class="flex items-center gap-1 text-amber-400">
                    @for($i = 0; $i < 5; $i++)
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <span class="text-xs font-bold text-[#172B3A] dark:text-white">4.9/5</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">(Hơn 15,000+ cá nhân & doanh nghiệp tin dùng)</span>
            </div>
        </div>

        <!-- Category Tabs Sticky Filter Bar (Glassmorphism Pill Bar) -->
        <div class="sticky top-[69px] z-30 bg-white/90 dark:bg-[#0B1118]/90 backdrop-blur-xl py-3 border-y border-[#E8EDF2] dark:border-[#1E2D3D] -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mb-8 shadow-xs transition-all">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none sm:justify-center max-w-7xl mx-auto">
                <!-- All tab -->
                <a href="{{ route('products.index', array_filter(['search' => request('search'), 'sort' => request('sort')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ !request('category') ? 'bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                    <span>Tất Cả Sản Phẩm</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ !request('category') ? 'bg-white/25 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096] dark:text-[#94A3B8]' }}">
                        {{ $categories->sum('products_count') }}
                    </span>
                </a>

                @foreach($categories as $cat)
                    <a href="{{ route('products.index', array_filter(['category' => $cat->slug, 'search' => request('search'), 'sort' => request('sort')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ request('category') === $cat->slug ? 'bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                        <span>{{ $cat->name }}</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ request('category') === $cat->slug ? 'bg-white/25 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096] dark:text-[#94A3B8]' }}">
                            {{ $cat->products_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Smart Search & Filter Control Bar -->
        <div class="mb-10 p-3 sm:p-4 rounded-2xl bg-white dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
            <form action="{{ route('products.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <!-- Search Input with Keyboard Shortcut hint -->
                <div class="md:col-span-8 relative">
                    <svg class="w-4 h-4 text-[#718096] dark:text-[#94A3B8] absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm phần mềm hoặc tính năng (Marketing, Nuôi nick, CRM, Quét Data...)" class="w-full pl-10 pr-24 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#0B1118] text-xs sm:text-sm text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2] focus:bg-white dark:focus:bg-[#111A24] focus:ring-2 focus:ring-[#168BD2]/15 transition-all">

                    <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center gap-1.5">
                        @if(request('search'))
                            <a href="{{ route('products.index', array_filter(['category' => request('category'), 'sort' => request('sort')])) }}" class="text-[#718096] hover:text-[#172B3A] dark:hover:text-white p-1 text-xs" title="Xóa tìm kiếm">✕</a>
                        @endif
                        <kbd class="hidden sm:inline-block px-2 py-0.5 text-[10px] font-mono font-bold bg-white dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52] rounded text-[#718096]">Ctrl + K</kbd>
                    </div>
                </div>

                <!-- Sort select with custom sleek styling -->
                <div class="md:col-span-4 relative">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#0B1118] text-xs sm:text-sm text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2] focus:bg-white dark:focus:bg-[#111A24] focus:ring-2 focus:ring-[#168BD2]/15 transition-all cursor-pointer">
                        <option value="order" {{ request('sort') === 'order' ? 'selected' : '' }}>Sắp xếp: Mặc định tối ưu</option>
                        <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Sắp xếp: Xem nhiều nhất</option>
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Sắp xếp: Phiên bản mới nhất</option>
                        <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Sắp xếp: Tên A – Z</option>
                    </select>
                </div>
            </form>

            <!-- Results Count Summary -->
            <div class="flex items-center justify-between text-xs text-[#718096] dark:text-[#94A3B8] px-1 pt-2.5 mt-2.5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                <div>
                    Hiển thị <span class="font-bold text-[#168BD2]">{{ $products->count() }}</span> / <span class="font-bold text-[#172B3A] dark:text-white">{{ $products->total() }}</span> giải pháp bản quyền
                    @if(request('search'))
                        cho từ khóa "<span class="font-semibold text-[#172B3A] dark:text-white">{{ request('search') }}</span>"
                    @endif
                </div>
                <div class="flex items-center gap-1.5 text-[11px] text-emerald-600 dark:text-emerald-400 font-semibold">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                    Sẵn sàng kích hoạt ngay
                </div>
            </div>
        </div>

        <!-- Product Grid (Luxury SaaS Masterpiece Bento Cards) -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="lush-card-vip flex flex-col justify-between group" data-aos="fade-up">
                        <div>
                            <!-- Top 3D Boxshot Stage -->
                            <div class="relative w-full h-64 sm:h-72 bg-gradient-to-tr from-[#F8FAFC] via-[#F0F6FB] to-[#EAF5FC] dark:from-[#0D151F] dark:via-[#111A24] dark:to-[#162230] p-6 flex items-center justify-center overflow-hidden border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <!-- Micro-dot grid background -->
                                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-[#168BD2]/5 to-transparent group-hover:via-[#168BD2]/15 transition-all duration-500"></div>

                                <!-- Floating Status Badge Top-Left -->
                                <div class="absolute top-3.5 left-3.5 z-20">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/90 dark:bg-[#111A24]/90 text-[#172B3A] dark:text-white border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Bản Quyền 2026
                                    </span>
                                </div>

                                <!-- Floating Version & Hot Badges Top-Right -->
                                <div class="absolute top-3.5 right-3.5 z-20 flex items-center gap-1.5">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-mono font-bold bg-white/90 dark:bg-[#111A24]/90 text-[#168BD2] border border-[#168BD2]/20 shadow-2xs backdrop-blur-md">
                                        {{ $product->version ?? 'v2.4' }}
                                    </span>
                                    @if($product->is_featured)
                                        <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase tracking-wider bg-gradient-to-r from-amber-500 to-amber-600 text-white shadow-xs">
                                            HOT
                                        </span>
                                    @endif
                                </div>

                                <!-- 3D Product Boxshot Image -->
                                @if($product->banner_url)
                                    <a href="{{ route('products.show', $product->slug) }}" class="relative z-10 w-full h-full flex items-center justify-center">
                                        <img src="{{ $product->banner_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain transform group-hover:scale-108 group-hover:-translate-y-2.5 transition-all duration-500 drop-shadow-[0_15px_30px_rgba(22,139,210,0.22)]">
                                    </a>
                                @else
                                    <div class="relative z-10 flex flex-col items-center justify-center">
                                        <x-product-icon :slug="$product->slug" size="xl" class="group-hover:scale-110 transition-transform duration-500 shadow-xl" />
                                    </div>
                                @endif
                            </div>

                            <!-- Card Body Content -->
                            <div class="p-6">
                                <!-- Category Pill Header -->
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                                        {{ $product->category->name ?? 'SaaS Solution' }}
                                    </span>
                                    <span class="text-[11px] font-medium text-emerald-600 dark:text-emerald-400 flex items-center gap-1">
                                        <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        Live v2026
                                    </span>
                                </div>

                                <!-- Product Title with Logo/Icon -->
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
                                <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] line-clamp-2 leading-relaxed mb-4">
                                    {{ $product->trans('description') }}
                                </p>

                                <!-- Key Features Bullet Points with Emerald Checkmarks -->
                                @if($product->features->count() > 0)
                                    <div class="bg-[#F8FAFC]/80 dark:bg-[#0E1722]/80 rounded-xl p-3 border border-[#E8EDF2]/80 dark:border-[#1E2D3D] space-y-2 mb-4">
                                        <span class="text-[10px] font-black uppercase tracking-wider text-[#718096] dark:text-[#94A3B8] block">TÍNH NĂNG NỔI BẬT:</span>
                                        @foreach($product->features->take(3) as $feature)
                                            <div class="flex items-start gap-2 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                                <div class="w-4 h-4 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                </div>
                                                <span class="truncate font-medium">{{ $feature->title }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Supported OS / Platforms -->
                                <div class="flex items-center gap-2 text-[10.5px] text-[#718096] dark:text-[#94A3B8]">
                                    <span class="font-semibold text-[#172B3A] dark:text-white">Nền tảng:</span>
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52] font-mono">Windows 10/11</span>
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52] font-mono">macOS</span>
                                    <span class="px-2 py-0.5 rounded-md bg-[#F8FAFC] dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52] font-mono">Cloud</span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Buttons (Footer) -->
                        <div class="p-6 pt-0">
                            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-2.5">
                                <a href="{{ route('products.show', $product->slug) }}" class="lush-btn-primary flex-1 !text-xs !py-2.5 !justify-center shadow-md shadow-[#168BD2]/20 group/btn">
                                    <span>{{ __('View Details') }}</span>
                                    <svg class="w-3.5 h-3.5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 5l7 7-7 7"/></svg>
                                </a>

                                @if($product->download_url)
                                    <a href="{{ $product->download_url }}" target="_blank" class="lush-btn-secondary !text-xs !py-2.5 !px-3.5" title="Tải bộ cài đặt">
                                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        <span>Tải về</span>
                                    </a>
                                @else
                                    <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-secondary !text-xs !py-2.5 !px-3.5" title="Đăng ký nhận bản dùng thử">
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
            <div class="mt-14">
                {{ $products->links() }}
            </div>
        @else
            <!-- Modern Empty State -->
            <div class="text-center py-20 bg-white dark:bg-[#131D27] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-8 max-w-xl mx-auto shadow-sm" data-aos="zoom-in">
                <div class="w-16 h-16 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-1">Không tìm thấy phần mềm phù hợp</h3>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mb-6">Vui lòng thử tìm với từ khóa khác hoặc chuyển danh mục sản phẩm.</p>
                <a href="{{ route('products.index') }}" class="lush-btn-primary !text-xs !py-2.5 !px-6 shadow-md shadow-[#168BD2]/20">
                    <span>Xem tất cả giải pháp</span>
                </a>
            </div>
        @endif

        <!-- Bottom Assistance & Consultation Banner (Grand Finale SaaS Banner) -->
        <div class="mt-20 relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-xl shadow-[#168BD2]/10 p-8 sm:p-12 lg:p-14 overflow-hidden" data-aos="fade-up">
            <!-- Radiant ambient spot -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                <div class="lg:col-span-8 space-y-3">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-[11px] font-black uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                        TƯ VẤN LỘ TRÌNH MIỄN PHÍ 1-1
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight leading-snug">
                        Chưa rõ phần mềm nào phù hợp nhất với mô hình của bạn?
                    </h2>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-2xl font-normal">
                        Đội ngũ kỹ sư giải pháp LushSoftware sẽ phân tích mô hình kinh doanh, quy mô đội ngũ và đề xuất bộ công cụ tối ưu nhất kèm lộ trình chuyển giao công nghệ 1-1.
                    </p>
                </div>
                <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                    <a href="{{ route('contact') }}" class="lush-btn-primary lush-btn-vip !py-3.5 !text-sm !justify-center shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Đăng Ký Tư Vấn & Demo 1-1</span>
                    </a>
                    <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary !py-3.5 !text-sm !justify-center font-bold">
                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection\n