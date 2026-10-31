@extends('layouts.app')

@section('title', __('Solutions') . ' – LushSoftware')
@section('meta_description', 'Khám phá các giải pháp công nghệ bứt phá tăng trưởng từ LushSoftware: Tự động hóa tiếp thị, quản trị dàn nick đa kênh, CRM bán hàng và khai thác dữ liệu thị trường.')

@section('content')
<div class="relative py-12 lg:py-20 bg-white dark:bg-[#0B1118] overflow-hidden">
    <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>
    <div class="absolute top-1/4 -right-32 w-80 h-80 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 -left-32 w-80 h-80 bg-[#48B4E5]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <div class="mb-4">
            <x-breadcrumb :items="[['label' => __('Solutions')]]" />
        </div>

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-16" data-aos="fade-up">
            <!-- High-tech VIP Announcement Pill -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs mb-4 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                </span>
                <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">KIẾN TRÚC GIẢI PHÁP DOANH NGHIỆP 2026</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• All-in-one Growth System</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-[#172B3A] dark:text-white tracking-tight leading-[1.12]">
                Hệ Thống Giải Pháp <br />
                <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                    Công Nghệ Bứt Phá
                </span>
                Tăng Trưởng Bền Vững
            </h1>

            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto font-normal">
                Mỗi bộ giải pháp của LushSoftware được thiết kế chuyên sâu giải quyết triệt để từng nút thắt doanh nghiệp: từ tiếp thị đa kênh, quản trị dàn tài khoản, chuyển đổi phễu bán hàng đến khai thác dữ liệu insight thị trường.
            </p>

            <!-- 4 High-Impact KPI Proof Bento Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                <div class="bg-white/80 dark:bg-[#131D27]/80 rounded-2xl p-4 sm:p-5 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm text-center group hover:border-[#168BD2]/40 hover:-translate-y-0.5 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mx-auto mb-2.5 group-hover:bg-[#168BD2] group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white tracking-tight">+350%</p>
                    <p class="text-[11px] font-semibold text-[#718096] dark:text-[#94A3B8] mt-1">Tốc Độ Tiếp Cận Lead</p>
                </div>

                <div class="bg-white/80 dark:bg-[#131D27]/80 rounded-2xl p-4 sm:p-5 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm text-center group hover:border-[#168BD2]/40 hover:-translate-y-0.5 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mx-auto mb-2.5 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white tracking-tight">-60%</p>
                    <p class="text-[11px] font-semibold text-[#718096] dark:text-[#94A3B8] mt-1">Chi Phí Nhân Sự & Vận Hành</p>
                </div>

                <div class="bg-white/80 dark:bg-[#131D27]/80 rounded-2xl p-4 sm:p-5 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm text-center group hover:border-[#168BD2]/40 hover:-translate-y-0.5 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-600 flex items-center justify-center mx-auto mb-2.5 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white tracking-tight">99.99%</p>
                    <p class="text-[11px] font-semibold text-[#718096] dark:text-[#94A3B8] mt-1">Kháng Checkpoint & Uptime</p>
                </div>

                <div class="bg-white/80 dark:bg-[#131D27]/80 rounded-2xl p-4 sm:p-5 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm text-center group hover:border-[#168BD2]/40 hover:-translate-y-0.5 transition-all">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center mx-auto mb-2.5 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white tracking-tight">15 Phút</p>
                    <p class="text-[11px] font-semibold text-[#718096] dark:text-[#94A3B8] mt-1">Triển Khai Kỹ Thuật 1-1</p>
                </div>
            </div>
        </div>

        <!-- Sticky Architecture Quick Navigator Bar -->
        <div class="sticky top-[69px] z-30 bg-white/90 dark:bg-[#0B1118]/90 backdrop-blur-xl py-3 border-y border-[#E8EDF2] dark:border-[#1E2D3D] -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mb-12 shadow-xs">
            <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none sm:justify-center max-w-7xl mx-auto">
                @foreach($categories as $idx => $cat)
                    <a href="#solution-{{ $cat->slug }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2] hover:shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-[#168BD2]"></span>
                        <span>0{{ $idx + 1 }}. {{ $cat->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Masterpiece Solution Architecture Blocks -->
        <div class="space-y-16 lg:space-y-20">
            @foreach($categories as $idx => $category)
                <div id="solution-{{ $category->slug }}" class="lush-card-vip p-8 sm:p-10 lg:p-12 relative overflow-hidden group scroll-mt-28" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
                        <!-- Solution Architecture Left Column -->
                        <div class="lg:col-span-5 space-y-6">
                            <!-- Strategy Pill -->
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider border border-[#168BD2]/20">
                                <span>GIẢI PHÁP CHIẾN LƯỢC 0{{ $idx + 1 }}</span>
                            </div>

                            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight leading-snug">
                                {{ $category->name }}
                            </h2>

                            <p class="text-sm sm:text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed font-normal">
                                {{ $category->description }}
                            </p>

                            <!-- Key Business Outcomes Checklist with Emerald Green Checkmarks -->
                            <div class="space-y-3 pt-2">
                                <div class="flex items-start gap-3 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                    <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span class="font-medium leading-relaxed">Tự động hóa luồng tiếp cận & chăm sóc khách hàng liên tục 24/7 không gián đoạn</span>
                                </div>
                                <div class="flex items-start gap-3 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                    <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span class="font-medium leading-relaxed">Cấu hình bảo mật độc lập, chống quét thuật toán và checkpoint tài khoản triệt để</span>
                                </div>
                                <div class="flex items-start gap-3 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                    <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span class="font-medium leading-relaxed">Báo cáo telemetry trực quan, đo lường chính xác hiệu quả chuyển đổi đơn hàng</span>
                                </div>
                            </div>

                            <!-- CTAs -->
                            <div class="flex flex-wrap items-center gap-3 pt-3">
                                <a href="{{ route('contact', ['solution' => $category->slug]) }}" class="lush-btn-primary lush-btn-vip !text-xs !py-3 !px-6 shadow-lg shadow-[#168BD2]/25 font-bold">
                                    <svg class="w-4 h-4 text-amber-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    <span>Tư vấn lộ trình triển khai 1-1</span>
                                </a>
                                <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="lush-btn-secondary !text-xs !py-3 !px-5 font-bold">
                                    <span>Xem tất cả công cụ ({{ $category->products->count() }})</span>
                                </a>
                            </div>
                        </div>

                        <!-- Right Column: Interactive Ecosystem Software Grid -->
                        <div class="lg:col-span-7">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                @forelse($category->products as $p)
                                    <div class="relative bg-[#F8FAFC]/90 dark:bg-[#0E1722]/90 rounded-2xl p-5 border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2]/50 hover:bg-white dark:hover:bg-[#111A24] hover:shadow-xl hover:shadow-[#168BD2]/10 hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group/card">
                                        <div>
                                            <!-- Mini 3D Boxshot Stage -->
                                            <div class="w-full h-36 rounded-xl bg-white dark:bg-[#152332] border border-[#E8EDF2] dark:border-[#1E2D3D] p-3 flex items-center justify-center mb-4 relative overflow-hidden">
                                                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:12px_12px] opacity-10"></div>
                                                @if($p->banner_url)
                                                    <img src="{{ $p->banner_url }}" alt="{{ $p->name }}" class="relative z-10 max-h-full max-w-full object-contain drop-shadow-md group-hover/card:scale-106 transition-transform duration-300">
                                                @else
                                                    <x-product-icon :slug="$p->slug" size="lg" />
                                                @endif

                                                <span class="absolute top-2 right-2 text-[9.5px] font-mono font-bold text-[#168BD2] bg-white/90 dark:bg-[#0B1118]/90 px-1.5 py-0.5 rounded border border-[#168BD2]/20">
                                                    {{ $p->version ?? 'v2.4' }}
                                                </span>
                                            </div>

                                            <h3 class="text-base font-bold text-[#172B3A] dark:text-white group-hover/card:text-[#168BD2] transition-colors mb-1">
                                                <a href="{{ route('products.show', $p->slug) }}">{{ $p->name }}</a>
                                            </h3>

                                            <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] line-clamp-2 mb-3">
                                                {{ $p->tagline }}
                                            </p>

                                            <!-- Key Features Mini List -->
                                            @if($p->features->count() > 0)
                                                <div class="space-y-1.5 pt-2 mb-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                                    @foreach($p->features->take(2) as $f)
                                                        <div class="flex items-center gap-1.5 text-[11px] text-[#172B3A] dark:text-[#CBD5E1]">
                                                            <svg class="w-3 h-3 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                            <span class="truncate">{{ $f->title }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                        <div class="pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between">
                                            <a href="{{ route('products.show', $p->slug) }}" class="text-xs font-bold text-[#168BD2] hover:text-[#0878BD] flex items-center gap-1 group-hover/card:translate-x-1 transition-transform">
                                                <span>Chi tiết phần mềm</span>
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </a>
                                            <span class="text-[10px] text-emerald-600 dark:text-emerald-400 font-semibold flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                                Sẵn sàng
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="sm:col-span-2 p-8 text-center bg-white dark:bg-[#131D27] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                        <p class="text-xs text-[#718096]">Đang cập nhật thêm giải pháp trong danh mục này.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- 4-Step Implementation Roadmap -->
        <div class="mt-24 lg:mt-32">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    QUY TRÌNH CHUYÊN NGHIỆP
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Lộ Trình Triển Khai 4 Bước Chuẩn Doanh Nghiệp
                </h2>
                <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                    Chuyển giao công nghệ trực tiếp 1-1, tối ưu hóa quy trình ngay từ ngày đầu tiên.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Step 1 -->
                <div class="lush-card-vip p-6 relative group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-4 shadow-md shadow-[#168BD2]/30">
                        01
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Khảo Sát & Phân Tích</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Đội ngũ kỹ sư phân tích hiện trạng kinh doanh, quy mô dàn nick và nút thắt chuyển đổi để đề xuất bộ giải pháp chính xác.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="lush-card-vip p-6 relative group" data-aos="fade-up" data-aos-delay="80">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-4 shadow-md shadow-[#168BD2]/30">
                        02
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Thiết Lập Môi Trường</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Cấu hình phần mềm, phân tầng IPv6 Clean Proxy, cô lập môi trường vân tay phần cứng Canvas độc lập 100%.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="lush-card-vip p-6 relative group" data-aos="fade-up" data-aos-delay="160">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-4 shadow-md shadow-[#168BD2]/30">
                        03
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Chuyển Giao Kịch Bản</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Nạp sẵn bộ kịch bản tự động nuôi nick, lọc data và chốt deal thực chiến theo thuật toán mới nhất 2026.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="lush-card-vip p-6 relative group" data-aos="fade-up" data-aos-delay="240">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-4 shadow-md shadow-[#168BD2]/30">
                        04
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Đồng Hành Kỹ Thuật 24/7</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Kỹ sư trực tiếp Ultraview xử lý sự cố trong vòng 15 phút, tự động cập nhật phần mềm khi các nền tảng update.
                    </p>
                </div>
            </div>
        </div>

        <!-- Enterprise Proof & Comparison Matrix -->
        <div class="mt-24 lg:mt-32">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    SO SÁNH HIỆU NĂNG
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Vì Sao Doanh Nghiệp Chọn LushSoftware?
                </h2>
            </div>

            <div class="bg-white dark:bg-[#111A24] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden shadow-xs" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm">
                        <thead>
                            <tr class="bg-[#F8FAFC] dark:bg-[#152332] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <th class="p-4 sm:p-5 font-bold text-[#172B3A] dark:text-white">Tiêu chí so sánh</th>
                                <th class="p-4 sm:p-5 font-bold text-[#168BD2] bg-[#168BD2]/5">Giải pháp LushSoftware 2026</th>
                                <th class="p-4 sm:p-5 font-bold text-[#718096]">Vận hành thủ công truyền thống</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Tốc độ & Công suất tiếp cận</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    45,000+ tương tác/ngày, tự động 24/7
                                </td>
                                <td class="p-4 sm:p-5 text-[#718096]">Giới hạn 100 - 200 lượt/ngày/nhân sự</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Tỷ lệ kháng checkpoint / Khóa nick</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">
                                    99.9% nhờ vân tay Canvas và Proxy IPv6 độc lập
                                </td>
                                <td class="p-4 sm:p-5 text-[#718096]">Thường xuyên checkpoint do trùng IP và thiết bị</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Chi phí nhân sự hàng tháng</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">
                                    Tiết kiệm lên đến 60% quỹ lương
                                </td>
                                <td class="p-4 sm:p-5 text-[#718096]">Cần đội ngũ đông đảo, chi phí cao và dễ nghỉ việc</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Thích ứng thuật toán nền tảng</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">
                                    Auto-sync thuật toán mới 2026 ngay trong ngày
                                </td>
                                <td class="p-4 sm:p-5 text-[#718096]">Mất hàng tuần tự nghiên cứu và sửa lỗi</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Hỗ trợ kỹ thuật</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">
                                    Kỹ sư trực tiếp Ultraview phản hồi dưới 15 phút
                                </td>
                                <td class="p-4 sm:p-5 text-[#718096]">Tự mày mò xử lý rủi ro kỹ thuật</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Grand Finale Consultation CTA -->
        <div class="mt-24 lg:mt-32 relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-14 lg:p-18 text-center overflow-hidden" data-aos="zoom-in">
            <!-- Radiant Ambient Spotlight -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    TƯ VẤN KIẾN TRÚC MIỄN PHÍ
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Sẵn Sàng Số Hóa & Tự Động Hóa <br />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Toàn Bộ Quy Trình Doanh Nghiệp
                    </span>?
                </h2>

                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-xl mx-auto font-normal">
                    Liên hệ ngay để nhận bản demo trực tiếp 1-1 qua Ultraview và phân tích bài toán tăng trưởng riêng biệt cho mô hình của bạn.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact') }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Đăng Ký Tư Vấn & Demo 1-1</span>
                    </a>

                    <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-3.5 !px-8 font-bold">
                        <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection\n