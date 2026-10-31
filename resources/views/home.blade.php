@extends('layouts.app')

@section('title', \App\Models\WebsiteSetting::get('meta_title', 'LushSoftware – Nền tảng phần mềm & Tự động hóa tăng trưởng doanh nghiệp'))

@section('content')
    <!-- 5.1. Hero Section -->
    <section class="relative pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden bg-white dark:bg-[#0B1118]">
        <!-- Subtle background glow (White 95%, Ocean Blue Accent 5%) -->
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-[#168BD2]/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/4 w-96 h-96 bg-[#48B4E5]/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Hero Left: Copy & CTAs -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left" data-aos="fade-up">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-bold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                        {{ $heroBanner->badge ?? 'CÔNG NGHỆ BỨT PHÁ 2026' }}
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-[#172B3A] dark:text-white leading-[1.18]">
                        {{ $heroBanner->title ?? 'Hệ Sinh Thái Phần Mềm Tăng Trưởng Toàn Diện' }}
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-base sm:text-lg text-[#718096] dark:text-[#94A3B8] leading-relaxed max-w-2xl mx-auto lg:mx-0">
                        {{ $heroBanner->subtitle ?? 'Tự động hóa tiếp thị, quản trị quan hệ khách hàng và mở rộng quy mô kinh doanh không giới hạn với công nghệ thuần điện toán đám mây.' }}
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="{{ route('products.index') }}" class="lush-btn-primary w-full sm:w-auto text-base !py-3.5 !px-7 shadow-lg shadow-[#168BD2]/25">
                            <span>{{ __('Explore Products') }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-3.5 !px-7">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <span>{{ __('Get Free Consultation') }}</span>
                        </a>
                    </div>

                    <!-- Trust indicators -->
                    <div class="pt-6 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-wrap items-center justify-center lg:justify-start gap-6 text-xs text-[#718096] dark:text-[#94A3B8]">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">Dùng thử miễn phí 7 ngày</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">Bảo mật cấp doanh nghiệp</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span class="font-medium">Hỗ trợ kỹ thuật 24/7</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right: Interactive Live SaaS Console Mockup (Apple / Linear Design) -->
                <div class="lg:col-span-5 relative" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative mx-auto max-w-lg lg:max-w-none">
                        <!-- Clean white frame with soft shadow & ocean blue border -->
                        <div class="bg-white dark:bg-[#111A24] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-[0_25px_60px_-15px_rgba(22,139,210,0.18)] p-5 sm:p-6 relative overflow-hidden">
                            <!-- Window Chrome bar -->
                            <div class="flex items-center justify-between pb-3.5 mb-3.5 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-3 h-3 rounded-full bg-rose-400 inline-block"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-400 inline-block"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-400 inline-block"></span>
                                </div>
                                <span class="text-[11px] font-mono font-semibold text-[#5A6E85] dark:text-[#94A3B8] bg-[#F8FAFC] dark:bg-[#0B1118] px-3 py-1 rounded-full border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                    app.lushsoftware.vn/console
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full">v2.4 Live</span>
                            </div>

                            <!-- Live Dashboard Header Metric -->
                            <div class="bg-gradient-to-br from-[#F8FAFC] to-[#F1F7FB] dark:from-[#152332] dark:to-[#1B2C3F] p-4 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] mb-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#718096] dark:text-[#94A3B8] block">Lưu lượng tự động hóa tháng này</span>
                                        <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white mt-0.5 tracking-tight">1,248,950 <span class="text-xs font-bold text-emerald-600 bg-emerald-500/10 px-2 py-0.5 rounded-full">+42.8%</span></p>
                                    </div>
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center shadow-md shadow-[#168BD2]/30">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                    </div>
                                </div>

                                <!-- Dynamic Live Sparkline Bars -->
                                <div class="h-16 flex items-end gap-1.5 pt-3">
                                    <div class="flex-1 bg-[#168BD2]/20 hover:bg-[#168BD2] rounded-t-sm h-[35%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/25 hover:bg-[#168BD2] rounded-t-sm h-[50%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/30 hover:bg-[#168BD2] rounded-t-sm h-[40%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/40 hover:bg-[#168BD2] rounded-t-sm h-[70%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/45 hover:bg-[#168BD2] rounded-t-sm h-[60%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/60 hover:bg-[#168BD2] rounded-t-sm h-[85%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2]/75 hover:bg-[#168BD2] rounded-t-sm h-[75%] transition-all"></div>
                                    <div class="flex-1 bg-[#168BD2] rounded-t-sm h-[100%] transition-all shadow-sm shadow-[#168BD2]/50"></div>
                                </div>
                            </div>

                            <!-- Live Active Modules Feed -->
                            <div class="space-y-2.5">
                                <div class="p-3 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/40 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#168BD2] to-[#2094DB] text-white flex items-center justify-center shrink-0 shadow-xs">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-[#172B3A] dark:text-white">Lush Marketing Pro</p>
                                            <p class="text-[10px] text-[#718096]">Chiến dịch đa luồng đang chạy: 45,000 sent</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-emerald-600 bg-emerald-500/10 px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                                        100% OK
                                    </span>
                                </div>

                                <div class="p-3 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/40 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#4F46E5] to-[#168BD2] text-white flex items-center justify-center shrink-0 shadow-xs">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-[#172B3A] dark:text-white">Lush Social Hub</p>
                                            <p class="text-[10px] text-[#718096]">Quản trị 120 nick: Kháng checkpoint tự động</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full">
                                        Safe Mode
                                    </span>
                                </div>

                                <div class="p-3 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/40 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-[#059669] to-[#0D9488] text-white flex items-center justify-center shrink-0 shadow-xs">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-[#172B3A] dark:text-white">Lush CRM Enterprise</p>
                                            <p class="text-[10px] text-[#718096]">Chuyển đổi phễu: +85 khách hàng chốt deal</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-amber-600 bg-amber-500/10 px-2 py-0.5 rounded-full">
                                        +285M ₫
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Stat Badge Top Right -->
                        <div class="absolute -top-4 -right-4 bg-white/95 dark:bg-[#131D27]/95 backdrop-blur-md p-3.5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center font-bold shadow-sm shadow-emerald-500/30">
                                99.9%
                            </div>
                            <div>
                                <p class="text-[11px] font-black text-[#172B3A] dark:text-white">Uptime SLA</p>
                                <p class="text-[10px] text-[#718096]">Cloud Phân Tán</p>
                            </div>
                        </div>

                        <!-- Floating Stat Badge Bottom Left -->
                        <div class="absolute -bottom-4 -left-4 bg-white/95 dark:bg-[#131D27]/95 backdrop-blur-md p-3.5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#2094DB] text-white flex items-center justify-center font-bold shadow-sm shadow-[#168BD2]/30">
                                ⚡
                            </div>
                            <div>
                                <p class="text-[11px] font-black text-[#172B3A] dark:text-white">AI Core 2.4</p>
                                <p class="text-[10px] text-[#718096]">12+ Công Cụ Tự Động</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.6. Statistics Bar -->
    <section class="py-12 bg-white dark:bg-[#0B1118] border-y border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                <div class="pt-4 md:pt-0" data-aos="fade-up" data-aos-delay="50">
                    <p class="text-3xl sm:text-4xl font-extrabold text-[#168BD2]">{{ $stats['clients'] }}</p>
                    <p class="text-xs sm:text-sm text-[#718096] dark:text-[#94A3B8] font-medium mt-1">Doanh Nghiệp Tin Dùng</p>
                </div>
                <div class="pt-4 md:pt-0" data-aos="fade-up" data-aos-delay="100">
                    <p class="text-3xl sm:text-4xl font-extrabold text-[#168BD2]">{{ $stats['products'] }}</p>
                    <p class="text-xs sm:text-sm text-[#718096] dark:text-[#94A3B8] font-medium mt-1">Giải Pháp Chuyên Biệt</p>
                </div>
                <div class="pt-4 md:pt-0" data-aos="fade-up" data-aos-delay="150">
                    <p class="text-3xl sm:text-4xl font-extrabold text-[#168BD2]">{{ $stats['users'] }}</p>
                    <p class="text-xs sm:text-sm text-[#718096] dark:text-[#94A3B8] font-medium mt-1">Người Dùng Hoạt Động</p>
                </div>
                <div class="pt-4 md:pt-0" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-3xl sm:text-4xl font-extrabold text-[#168BD2]">{{ $stats['years'] }}</p>
                    <p class="text-xs sm:text-sm text-[#718096] dark:text-[#94A3B8] font-medium mt-1">Năm Phát Triển & Đồng Hành</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.3. Danh mục & Hệ sinh thái sản phẩm -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="badge-lush mb-3">{{ __('Ecosystem Products') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                    Hệ Sinh Thái Phần Mềm LushSoftware
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                    Mỗi sản phẩm đều được thiết kế chuyên sâu để giải quyết triệt để từng bài toán tăng trưởng: từ thu hút khách hàng tiềm năng đến quản trị bán hàng và dữ liệu thị trường.
                </p>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $idx => $product)
                    <div class="lush-card overflow-hidden flex flex-col justify-between group hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-[#168BD2]/15 transition-all duration-300 border border-[#E8EDF2] dark:border-[#1E2D3D]" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                        <div>
                            <!-- Top Mockup Image Container (MKT Style Boxshot) -->
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

                            <div class="p-6">
                                <!-- Category & Version Badge Header -->
                                <div class="flex items-center justify-between gap-2 mb-3">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                                        {{ $product->category->name ?? 'SaaS' }}
                                    </span>
                                    <span class="px-2 py-0.5 rounded-full text-[10.5px] font-mono font-bold bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                                        {{ $product->version ?? 'v2.4' }}
                                    </span>
                                </div>

                                <!-- Name & Logo -->
                                <div class="flex items-start gap-3 mb-2.5">
                                    <div class="shrink-0 mt-0.5">
                                        @if($product->logo_url)
                                            <img src="{{ $product->logo_url }}" alt="{{ $product->name }}" class="w-9 h-9 rounded-xl object-contain border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs">
                                        @else
                                            <x-product-icon :slug="$product->slug" size="sm" />
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors leading-snug">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                {{ $product->trans('name') }}
                                            </a>
                                        </h3>
                                        <p class="text-xs font-semibold text-[#168BD2] mt-0.5 line-clamp-1">
                                            {{ $product->trans('tagline') }}
                                        </p>
                                    </div>
                                </div>

                                <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-2 leading-relaxed mb-4">
                                    {{ $product->trans('description') }}
                                </p>

                                <!-- Key Features Pills -->
                                @if($product->features->count() > 0)
                                    <div class="space-y-2 pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
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
                            </div>
                        </div>

                        <!-- Card Action Buttons -->
                        <div class="p-6 pt-0">
                            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-2.5">
                                <a href="{{ route('products.show', $product->slug) }}" class="lush-btn-primary flex-1 !text-xs !py-2.5 !justify-center shadow-md shadow-[#168BD2]/20">
                                    <span>{{ __('View Details') }}</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-secondary !text-xs !py-2.5 !px-3" title="Đăng ký trải nghiệm">
                                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>{{ __('Try Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('products.index') }}" class="lush-btn-secondary !py-3 !px-8 text-sm font-bold">
                    {{ __('All Products') }} &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- 5.4. Giải pháp công nghệ -->
    <section class="py-20 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="badge-lush mb-3">{{ __('Our Technology Solutions') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                    Giải Pháp Công Nghệ Cho Doanh Nghiệp Thời Đại Số
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                    Chúng tôi giúp bạn số hóa quy trình kinh doanh, tối đa hóa chuyển đổi và giải phóng sức lao động của đội ngũ.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Solution 1 -->
                <div class="lush-card p-6" data-aos="fade-up" data-aos-delay="50">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white shadow-lg shadow-[#168BD2]/25 ring-1 ring-white/20 flex items-center justify-center font-bold mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Tự Động Hóa Tiếp Thị</h3>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">Tiếp cận đúng khách hàng tiềm năng qua Email, SMS và Zalo với kịch bản cá nhân hóa tự động.</p>
                </div>

                <!-- Solution 2 -->
                <div class="lush-card p-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#059669] to-[#0D9488] text-white shadow-lg shadow-[#059669]/25 ring-1 ring-white/20 flex items-center justify-center font-bold mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Quản Trị Bán Hàng CRM</h3>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">Theo dõi chi tiết phễu khách hàng, tự động chia lead và kiểm soát doanh thu từng nhân sự theo thời gian thực.</p>
                </div>

                <!-- Solution 3 -->
                <div class="lush-card p-6" data-aos="fade-up" data-aos-delay="150">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#8B5CF6] to-[#7C3AED] text-white shadow-lg shadow-[#8B5CF6]/25 ring-1 ring-white/20 flex items-center justify-center font-bold mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Hội Tụ Đa Kênh Chat</h3>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">Gom toàn bộ tin nhắn từ Fanpage, TikTok và Website về một màn hình duy nhất, trả lời tức thì.</p>
                </div>

                <!-- Solution 4 -->
                <div class="lush-card p-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#0284C7] to-[#0369A1] text-white shadow-lg shadow-[#0284C7]/25 ring-1 ring-white/20 flex items-center justify-center font-bold mb-5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Dữ Liệu & Insight Thị Trường</h3>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">Thu thập và phân tích dữ liệu ngành, đối thủ để đưa ra các quyết định kinh doanh chuẩn xác.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.5. Vì sao chọn LushSoftware -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5" data-aos="fade-right">
                    <span class="badge-lush mb-3">{{ __('Why Choose LushSoftware') }}</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight leading-tight">
                        Đối Tác Công Nghệ Đáng Tin Cậy Của Doanh Nghiệp
                    </h2>
                    <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base leading-relaxed">
                        Khác biệt với các công cụ chắp vá trên thị trường, LushSoftware đem lại một nền tảng đồng bộ, ổn định và tối ưu toàn diện theo tiêu chuẩn quốc tế.
                    </p>
                    <div class="pt-6">
                        <a href="{{ route('about') }}" class="lush-btn-primary !py-3 !px-6 text-sm">
                            <span>Khám phá tầm nhìn LushSoftware</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6" data-aos="fade-left">
                    <div class="p-5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] hover:shadow-lg hover:border-[#168BD2]/30 transition-all duration-300">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#48B4E5] text-white shadow-md shadow-[#168BD2]/25 flex items-center justify-center font-bold mb-3">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h4 class="font-bold text-[#172B3A] dark:text-white mb-1.5">Tốc Độ Xử Lý Tối Ưu</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Cấu trúc hạ tầng điện toán đám mây phân tán cho độ trễ dưới 50ms ở mọi tác vụ.</p>
                    </div>

                    <div class="p-5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] hover:shadow-lg hover:border-[#059669]/30 transition-all duration-300">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#059669] to-[#10B981] text-white shadow-md shadow-[#059669]/25 flex items-center justify-center font-bold mb-3">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h4 class="font-bold text-[#172B3A] dark:text-white mb-1.5">Bảo Mật Tiêu Chuẩn Cao</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Mã hóa đa tầng và sao lưu dữ liệu tự động hàng ngày đảm bảo dữ liệu luôn an toàn.</p>
                    </div>

                    <div class="p-5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] hover:shadow-lg hover:border-[#6366F1]/30 transition-all duration-300">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#6366F1] to-[#8B5CF6] text-white shadow-md shadow-[#6366F1]/25 flex items-center justify-center font-bold mb-3">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        </div>
                        <h4 class="font-bold text-[#172B3A] dark:text-white mb-1.5">Cập Nhật Liên Tục</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Luôn nâng cấp và thích ứng theo các thay đổi thuật toán của Facebook, TikTok, Google.</p>
                    </div>

                    <div class="p-5 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] hover:shadow-lg hover:border-[#EA580C]/30 transition-all duration-300">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#EA580C] to-[#F59E0B] text-white shadow-md shadow-[#EA580C]/25 flex items-center justify-center font-bold mb-3">
                            <svg class="w-5.5 h-5.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <h4 class="font-bold text-[#172B3A] dark:text-white mb-1.5">Chăm Sóc Tận Tâm 24/7</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Đội ngũ kỹ sư và chuyên viên tư vấn hỗ trợ từ xa qua Ultraview, Zalo và Hotline.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.7. Đánh giá khách hàng & Đối tác -->
    <section class="py-20 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="badge-lush mb-3">{{ __('Customer Testimonials') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                    Khách Hàng Nói Gì Về Chúng Tôi
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                    Sự hài lòng và tăng trưởng doanh số của khách hàng là thước đo thành công lớn nhất của LushSoftware.
                </p>
            </div>

            <!-- Swiper Testimonials Slider -->
            <div class="swiper testimonial-swiper pb-12" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testi)
                        <div class="swiper-slide h-auto">
                            <div class="lush-card p-6 h-full flex flex-col justify-between">
                                <div>
                                    <!-- Star rating -->
                                    <div class="flex items-center gap-1 text-amber-400 mb-4">
                                        @for($i = 0; $i < $testi->rating; $i++)
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        @endfor
                                    </div>
                                    <p class="text-sm text-[#172B3A] dark:text-[#E2E8F0] italic leading-relaxed mb-6">
                                        "{{ $testi->content }}"
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                    <div class="w-10 h-10 rounded-full bg-[#168BD2] text-white font-bold flex items-center justify-center text-sm">
                                        {{ mb_substr($testi->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-[#172B3A] dark:text-white">{{ $testi->name }}</p>
                                        <p class="text-xs text-[#718096] dark:text-[#94A3B8]">{{ $testi->position }} - {{ $testi->company }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- Partners Logo Row -->
            <div class="pt-12 border-t border-[#E8EDF2] dark:border-[#1E2D3D]" data-aos="fade-up">
                <p class="text-center text-xs uppercase font-bold text-[#718096] tracking-wider mb-8">{{ __('Trusted By Businesses') }}</p>
                <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-14 opacity-70 grayscale hover:grayscale-0 transition-all duration-300">
                    @foreach($partners as $partner)
                        <div class="flex items-center gap-2 font-bold text-lg text-[#718096] dark:text-[#94A3B8]">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#168BD2]"></span>
                            <span>{{ $partner->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- 5.8. Tin tức mới nhất -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between mb-14" data-aos="fade-up">
                <div>
                    <span class="badge-lush mb-3">{{ __('Latest News & Insights') }}</span>
                    <h2 class="text-3xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                        Kiến Thức & Tin Tức Công Nghệ
                    </h2>
                </div>
                <a href="{{ route('articles.index') }}" class="mt-4 md:mt-0 text-sm font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                    <span>Xem tất cả bài viết</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                    <article class="lush-card overflow-hidden flex flex-col justify-between" data-aos="fade-up">
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-[#718096] mb-3">
                                <span class="text-[#168BD2] font-semibold">{{ $article->category->name ?? 'Công nghệ' }}</span>
                                <span>•</span>
                                <span>{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-3 hover:text-[#168BD2] transition-colors leading-snug">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-3 leading-relaxed">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                        <div class="px-6 pb-6 pt-2">
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                                <span>{{ __('Read More') }}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5.9. High-converting CTA -->
    <section class="py-20 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#131D27] rounded-3xl border border-[#168BD2]/30 shadow-xl p-8 sm:p-12 lg:p-16 text-center relative overflow-hidden" data-aos="zoom-in">
                <div class="max-w-3xl mx-auto relative z-10 space-y-6">
                    <span class="badge-lush">SẴN SÀNG BỨT PHÁ DOANH SỐ?</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                        Tăng Tốc Tăng Trưởng Doanh Nghiệp Cùng LushSoftware
                    </h2>
                    <p class="text-base sm:text-lg text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                        Đăng ký nhận tư vấn lộ trình tự động hóa chuyên biệt cho ngành hàng của bạn. Đội ngũ chuyên gia LushSoftware sẽ liên hệ trong vòng 15 phút.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                        <a href="{{ route('contact') }}" class="lush-btn-primary w-full sm:w-auto text-base !py-3.5 !px-8 shadow-lg shadow-[#168BD2]/30">
                            {{ __('Get Free Consultation') }}
                        </a>
                        <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-3.5 !px-8">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

