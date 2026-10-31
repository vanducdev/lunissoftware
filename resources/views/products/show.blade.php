@extends('layouts.app')

@section('title', $product->trans('name') . ' – LushSoftware')
@section('meta_description', Str::limit(strip_tags($product->trans('description')), 160))

@section('content')
<!-- 1. Product Hero Section (Masterpiece SaaS Presentation) -->
<section class="relative pt-8 pb-20 lg:pt-12 lg:pb-28 bg-white dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden">
    <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>
    <div class="absolute top-1/3 -right-32 w-80 h-80 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <div class="mb-6">
            <x-breadcrumb :items="[['label' => __('Products'), 'url' => route('products.index')], ['label' => $product->name]]" />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-14 items-center">
            <!-- Hero Left: Product Info & CTAs -->
            <div class="lg:col-span-7 space-y-6" data-aos="fade-right">
                <!-- Badges Header -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                        {{ $product->category->name ?? 'SaaS Solution' }}
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-mono font-bold bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        Phiên bản: {{ $product->version ?? 'v2.4' }}
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                        <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        Bản Quyền 2026
                    </span>
                </div>

                <!-- Product Name with Vibrant Accent -->
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    {{ $product->trans('name') }}
                </h1>

                <!-- Tagline in Ocean Blue -->
                <p class="text-lg sm:text-xl font-bold bg-gradient-to-r from-[#168BD2] to-[#0878BD] bg-clip-text text-transparent">
                    {{ $product->trans('tagline') }}
                </p>

                <!-- Description -->
                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed font-normal">
                    {{ $product->trans('description') }}
                </p>

                <!-- Trust Points with Crisp Bespoke SVG Icons -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
                    <div class="flex items-center gap-2.5 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                        <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium">Dùng thử 7 ngày không rủi ro</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                        <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium">Cài đặt & hỗ trợ 1-1 Ultraview</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                        <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium">Tự động sync thuật toán mới 2026</span>
                    </div>
                    <div class="flex items-center gap-2.5 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                        <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="font-medium">Cam kết hoàn tiền 100% nếu lỗi</span>
                    </div>
                </div>

                <!-- CTAs Group with VIP Shimmer -->
                <div class="flex flex-wrap items-center gap-4 pt-3">
                    <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-primary lush-btn-vip !py-3.5 !px-8 text-sm shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Nhận Tư Vấn & Dùng Thử Ngay</span>
                    </a>

                    @if($product->download_url)
                        <a href="{{ $product->download_url }}" target="_blank" class="lush-btn-secondary !py-3.5 !px-7 text-sm font-bold">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>Tải Bản Cài Đặt</span>
                        </a>
                    @else
                        <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary !py-3.5 !px-6 text-sm font-bold">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                        </a>
                    @endif
                </div>

                <!-- Live Rating Stack -->
                <div class="flex items-center gap-3 pt-2">
                    <div class="flex items-center gap-1 text-amber-400">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <span class="text-xs font-bold text-[#172B3A] dark:text-white">4.9/5</span>
                    <span class="text-xs text-[#718096] dark:text-[#94A3B8]">từ hơn 2,400+ đánh giá thực tế của khách hàng</span>
                </div>
            </div>

            <!-- Hero Right: 3D Floating Showcase Chassis -->
            <div class="lg:col-span-5" data-aos="fade-left">
                <div class="relative group">
                    <!-- Ambient Glow Behind Chassis -->
                    <div class="absolute -inset-4 bg-gradient-to-r from-[#168BD2]/20 to-[#48B4E5]/15 rounded-[2.5rem] blur-2xl group-hover:blur-3xl transition-all duration-500 opacity-75"></div>

                    <div class="relative bg-white dark:bg-[#111A24] p-6 sm:p-7 rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xl">
                        <!-- macOS Window Header Bar -->
                        <div class="flex items-center justify-between pb-4 mb-4 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <div class="flex items-center gap-1.5">
                                <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                            </div>
                            <div class="text-[11px] font-mono text-[#718096] dark:text-[#94A3B8] bg-[#F8FAFC] dark:bg-[#1A2634] px-3 py-0.5 rounded-full border border-[#E8EDF2] dark:border-[#2D3F52]">
                                app.lushsoftware.vn/{{ $product->slug }}
                            </div>
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                        </div>

                        <!-- 3D Boxshot Visual Stage -->
                        @if($product->banner_url)
                            <div class="w-full h-72 sm:h-80 rounded-2xl overflow-hidden bg-gradient-to-tr from-[#F8FAFC] via-[#F0F6FB] to-[#EAF5FC] dark:from-[#0D151F] dark:via-[#111A24] dark:to-[#162230] p-6 flex items-center justify-center mb-5 border border-[#E8EDF2] dark:border-[#1E2D3D] relative">
                                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                                <img src="{{ $product->banner_url }}" alt="{{ $product->name }}" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-[0_20px_35px_rgba(22,139,210,0.25)] transform group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @else
                            <div class="w-full h-72 sm:h-80 rounded-2xl overflow-hidden bg-gradient-to-tr from-[#F8FAFC] to-[#EDF6FC] dark:from-[#0D151F] dark:to-[#162230] p-6 flex items-center justify-center mb-5 border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <x-product-icon :slug="$product->slug" size="xl" class="shadow-2xl" />
                            </div>
                        @endif

                        <div class="text-center mb-4">
                            <h3 class="text-lg font-bold text-[#172B3A] dark:text-white">{{ $product->name }}</h3>
                            <p class="text-xs text-[#718096] dark:text-[#94A3B8]">Tối ưu hóa đa nền tảng • Windows 10/11 & macOS & Cloud</p>
                        </div>

                        <!-- Telemetry Specs Matrix -->
                        <div class="p-4 rounded-2xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] text-left space-y-2 text-xs">
                            <div class="flex justify-between items-center text-[#718096] dark:text-[#94A3B8]">
                                <span>Dung lượng cài đặt:</span>
                                <span class="font-mono font-bold text-[#172B3A] dark:text-white">~ 85 MB (Siêu nhẹ)</span>
                            </div>
                            <div class="flex justify-between items-center text-[#718096] dark:text-[#94A3B8]">
                                <span>Hệ điều hành:</span>
                                <span class="font-semibold text-[#172B3A] dark:text-white">Windows 10/11, macOS, Cloud</span>
                            </div>
                            <div class="flex justify-between items-center text-[#718096] dark:text-[#94A3B8]">
                                <span>Phiên bản ổn định:</span>
                                <span class="font-mono font-bold text-[#168BD2]">{{ $product->version ?? 'v2.4' }} (Live 2026)</span>
                            </div>
                            <div class="flex justify-between items-center text-[#718096] dark:text-[#94A3B8]">
                                <span>Cập nhật gần nhất:</span>
                                <span class="font-semibold text-[#172B3A] dark:text-white">{{ $product->updated_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 2. Features Grid (Interactive Bento Features) -->
@if($product->features->count() > 0)
<section class="relative py-20 lg:py-24 bg-[#F8FAFC]/90 dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_0%,rgba(22,139,210,0.06),transparent)] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                TÍNH NĂNG VƯỢT TRỘI
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                Khám Phá Sức Mạnh Đột Phá Của {{ $product->name }}
            </h2>
            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                Thiết kế chuyên sâu giải quyết triệt để nút thắt vận hành, giúp tiết kiệm tối đa thời gian và chi phí nhân sự.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($product->features as $idx => $feature)
                <div class="lush-card-vip p-6 flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
                    <div>
                        <!-- Feature SVG Icon Box -->
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2]/15 to-[#48B4E5]/15 text-[#168BD2] flex items-center justify-center mb-5 group-hover:scale-110 group-hover:bg-[#168BD2] group-hover:text-white transition-all duration-300 shadow-2xs">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>

                        <h3 class="text-base font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors mb-2.5">
                            {{ $feature->title }}
                        </h3>

                        <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                            {{ $feature->description }}
                        </p>
                    </div>

                    <div class="pt-4 mt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between text-[11px] font-semibold text-emerald-600 dark:text-emerald-400">
                        <span>Sẵn sàng hoạt động</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 3. Screenshot & Interface Gallery (Browser Mockup Viewports) -->
@if($product->images->count() > 0)
<section class="py-20 lg:py-24 bg-white dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                TRẢI NGHIỆM GIAO DIỆN THỰC TẾ
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                Giao Diện Sử Dụng Thực Tế Của {{ $product->name }}
            </h2>
            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                Trực quan, tốc độ xử lý tức thì, thiết kế công thái học giúp người mới tiếp cận chỉ trong 5 phút.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($product->images as $img)
                <div class="lush-card-vip overflow-hidden group p-3.5" data-aos="fade-up">
                    <!-- Browser Window Mockup Bar -->
                    <div class="flex items-center gap-1.5 pb-2.5 px-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
                    </div>

                    <div class="rounded-xl overflow-hidden bg-white dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] aspect-video flex items-center justify-center relative">
                        <img src="{{ $img->url }}" alt="{{ $img->caption }}" class="w-full h-full object-cover group-hover:scale-106 transition-transform duration-500">
                    </div>

                    @if($img->caption)
                        <p class="text-xs font-bold text-[#172B3A] dark:text-white mt-3.5 px-1 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2]"></span>
                            {{ $img->caption }}
                        </p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 4. Rich Content / Overview Section -->
@if($product->content)
<section class="py-18 bg-[#F8FAFC]/80 dark:bg-[#0E1722] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-[#111A24] p-8 sm:p-12 rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm">
            <div class="prose prose-slate dark:prose-invert max-w-none prose-headings:font-black prose-headings:text-[#172B3A] dark:prose-headings:text-white prose-p:text-[#5A6E85] dark:prose-p:text-[#94A3B8] prose-p:leading-relaxed prose-a:text-[#168BD2] prose-strong:text-[#172B3A] dark:prose-strong:text-white">
                {!! $product->content !!}
            </div>
        </div>
    </div>
</section>
@endif

<!-- 5. Pricing Section (Bento SaaS Pricing Plans) -->
@if($product->pricings->count() > 0)
<section class="py-20 lg:py-24 bg-white dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                BẢNG GIÁ MINH BẠCH
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                Bảng Giá Bản Quyền {{ $product->name }}
            </h2>
            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                Không chi phí ẩn, kích hoạt ngay lập tức, hỗ trợ kỹ thuật 1-1 trong suốt thời gian sử dụng.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            @foreach($product->pricings as $pricing)
                <div class="relative bg-white dark:bg-[#111A24] rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 {{ $pricing->is_popular ? 'border-2 border-[#168BD2] shadow-2xl shadow-[#168BD2]/20 ring-4 ring-[#168BD2]/10 -translate-y-2' : 'border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm hover:shadow-xl hover:border-[#168BD2]/40' }}" data-aos="fade-up">
                    @if($pricing->is_popular)
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                            <span class="bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white text-[11px] font-black px-4 py-1.5 rounded-full uppercase tracking-wider shadow-md shadow-[#168BD2]/30 flex items-center gap-1.5">
                                <span class="text-amber-300">★</span>
                                {{ __('Most Popular') }}
                            </span>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-xl font-black text-[#172B3A] dark:text-white mb-2">{{ $pricing->plan_name }}</h3>
                        
                        <div class="flex items-baseline gap-1 my-5 pb-5 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <span class="text-3xl sm:text-4xl font-black text-[#168BD2] tracking-tight">{{ number_format($pricing->price, 0, ',', '.') }}</span>
                            <span class="text-lg font-bold text-[#172B3A] dark:text-white">{{ $pricing->currency }}</span>
                            <span class="text-xs text-[#718096] dark:text-[#94A3B8]">/ {{ $pricing->billing_cycle === 'monthly' ? __('Monthly') : ($pricing->billing_cycle === 'yearly' ? __('Yearly') : __('Lifetime')) }}</span>
                        </div>

                        <!-- Features list with Emerald Checkmarks -->
                        @if(is_array($pricing->features) && count($pricing->features) > 0)
                            <ul class="space-y-3.5 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                @foreach($pricing->features as $item)
                                    <li class="flex items-start gap-2.5">
                                        <div class="w-4 h-4 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                            <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        <span class="leading-relaxed font-medium">{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="pt-8">
                        <a href="{{ $pricing->cta_link ?: route('contact', ['product' => $product->slug, 'plan' => $pricing->plan_name]) }}" class="{{ $pricing->is_popular ? 'lush-btn-primary lush-btn-vip shadow-xl shadow-[#168BD2]/30' : 'lush-btn-secondary' }} w-full !justify-center !text-sm !py-3 font-bold">
                            {{ $pricing->cta_text ?: 'Đăng Ký Bản Quyền' }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 6. FAQs Section -->
@if($product->faqs->count() > 0)
<section class="py-20 lg:py-24 bg-[#F8FAFC]/90 dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                HỎI ĐÁP PHỔ BIẾN
            </span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                Giải Đáp Thắc Mắc Về {{ $product->name }}
            </h2>
        </div>

        <div class="space-y-4">
            @foreach($product->faqs as $faq)
                <details class="group bg-white dark:bg-[#111A24] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5 sm:p-6 cursor-pointer transition-all hover:border-[#168BD2]/40 open:border-[#168BD2]/50 open:shadow-md">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        <span>{{ $faq->question }}</span>
                        <div class="w-8 h-8 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#168BD2] flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition-transform duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </summary>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4 font-normal">
                        {{ $faq->answer }}
                    </p>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 7. Related Products (Masterpiece 3D Mini Cards) -->
@if($relatedProducts->count() > 0)
<section class="py-20 bg-white dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-10">
            <div>
                <span class="text-xs font-black uppercase tracking-wider text-[#168BD2] block mb-1">HỆ SINH THÁI LIÊN QUAN</span>
                <h3 class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white tracking-tight">Sản Phẩm Cùng Danh Mục</h3>
            </div>
            <a href="{{ route('products.index') }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                <span>Xem tất cả</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProducts as $rel)
                <div class="lush-card-vip flex flex-col justify-between group">
                    <div class="p-6">
                        <div class="w-full h-44 rounded-xl bg-gradient-to-tr from-[#F8FAFC] to-[#EDF6FC] dark:from-[#0D151F] dark:to-[#162230] p-4 flex items-center justify-center mb-4 border border-[#E8EDF2] dark:border-[#1E2D3D]">
                            @if($rel->banner_url)
                                <img src="{{ $rel->banner_url }}" alt="{{ $rel->name }}" class="max-h-full max-w-full object-contain group-hover:scale-106 transition-transform duration-300 drop-shadow-md">
                            @else
                                <x-product-icon :slug="$rel->slug" size="lg" />
                            @endif
                        </div>

                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full">{{ $rel->version ?? 'v2.0' }}</span>
                        </div>

                        <h4 class="font-bold text-base text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors mb-1">
                            <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                        </h4>
                        <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] line-clamp-2">{{ $rel->tagline }}</p>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="{{ route('products.show', $rel->slug) }}" class="lush-btn-primary w-full !text-xs !py-2.5 !justify-center">
                            <span>Khám phá ngay</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- 8. Grand Bottom CTA Banner -->
<section class="py-16 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-12 lg:p-16 text-center overflow-hidden" data-aos="zoom-in">
            <!-- Radiant Ambient Spotlight -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    TRIỂN KHAI VẬN HÀNH NGAY HÔM NAY
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Sẵn Sàng Bứt Phá Doanh Thu Cùng <br />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        {{ $product->name }}
                    </span>?
                </h2>

                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-xl mx-auto font-normal">
                    Liên hệ ngay với chuyên gia kỹ thuật để nhận tài khoản trải nghiệm 7 ngày miễn phí và được cấu hình trực tiếp 1-1.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Nhận Tư Vấn & Dùng Thử 7 Ngày</span>
                    </a>

                    <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-3.5 !px-8 font-bold">
                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection\n