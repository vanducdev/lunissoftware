@extends('layouts.app')

@section('title', 'Trung Tâm Tải Phần Mềm & Cài Đặt – LushSoftware')
@section('meta_description', 'Tải bản cài đặt mới nhất của các phần mềm LushCare, LushLogin, LushCRM, LushZalo tương thích Windows 10/11, macOS và Web Cloud. Đã quét mã độc 100%, hỗ trợ cài đặt 1-1.')

@section('content')
<div class="relative pt-4 pb-16 sm:pt-6 lg:pt-8 lg:pb-20 bg-white dark:bg-[#0B1118] overflow-hidden">
    <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>
    <div class="absolute top-1/4 -right-32 w-80 h-80 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 -left-32 w-80 h-80 bg-[#48B4E5]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <div class="mb-4">
            <x-breadcrumb :items="[['label' => __('Download')]]" />
        </div>

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-10 lg:mb-12" data-aos="fade-up">
            <!-- High-tech VIP Announcement Pill -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs mb-4 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                </span>
                <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">TRUNG TÂM PHÁT HÀNH BẢN CẬP NHẬT 2026</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• Official Verified Builds</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-[#172B3A] dark:text-white tracking-tight leading-[1.12]">
                Trung Tâm Tải Về & <br />
                <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                    Cập Nhật Phần Mềm
                </span>
            </h1>

            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto font-normal">
                Tải xuống các bộ cài đặt chính thức, được quét sạch mã độc 100%, ký số bảo mật SHA-256 và luôn cập nhật thuật toán mới nhất từ đội ngũ kỹ sư LushSoftware.
            </p>

            <!-- 4 Security & Quality Certification Badges -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 mt-7 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0]">
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>Quét sạch mã độc 100%</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    <span>Ký số SHA-256 Verified</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    <span>Auto-Sync Thuật toán 2026</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Hỗ trợ cài đặt Ultraview 24/7</span>
                </div>
            </div>

            <!-- Customer Trust Proof Line -->
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
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">(Hơn 15,000+ cá nhân & doanh nghiệp đang vận hành)</span>
            </div>
        </div>

        <!-- Masterpiece Download Cards Grid -->
        <div class="space-y-8">
            @foreach($products as $p)
                <div class="lush-card-vip p-6 sm:p-8 lg:p-10 relative overflow-hidden group" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        <!-- Left: Product Showcase & Technical Specs -->
                        <div class="lg:col-span-7 space-y-4">
                            <div class="flex items-start sm:items-center gap-4">
                                <!-- 3D Product Icon/Banner Stage -->
                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl overflow-hidden bg-gradient-to-tr from-[#F8FAFC] to-[#EDF6FC] dark:from-[#0D151F] dark:to-[#162230] border border-[#E8EDF2] dark:border-[#1E2D3D] shrink-0 p-2 flex items-center justify-center relative shadow-xs">
                                    @if($p->banner_url)
                                        <img src="{{ $p->banner_url }}" alt="{{ $p->name }}" class="max-h-full max-w-full object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-300">
                                    @elseif($p->logo_url)
                                        <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" class="max-h-full max-w-full object-contain drop-shadow-md group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <x-product-icon :slug="$p->slug" size="md" />
                                    @endif
                                </div>

                                <div>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h2 class="text-xl sm:text-2xl font-black text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors">
                                            <a href="{{ route('products.show', $p->slug) }}">{{ $p->name }}</a>
                                        </h2>
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                                            {{ $p->version ?? 'v2.4' }}
                                        </span>
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                            Live 2026
                                        </span>
                                    </div>

                                    <div class="flex flex-wrap items-center gap-2 mt-1.5 text-xs text-[#718096] dark:text-[#94A3B8]">
                                        <span class="font-semibold text-[#172B3A] dark:text-white">{{ $p->category->name ?? 'SaaS Solution' }}</span>
                                        <span>•</span>
                                        <span>Cập nhật: {{ $p->updated_at->format('d/m/Y') }}</span>
                                        <span>•</span>
                                        <span class="font-mono text-[#168BD2]">Dung lượng: ~ 85 MB</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-xs sm:text-sm text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed font-normal">
                                {{ $p->description }}
                            </p>

                            <!-- OS Compatibility Capsules with Custom SVG Icons -->
                            <div class="flex flex-wrap items-center gap-2 pt-1 text-xs">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#CBD5E1]">
                                    <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="currentColor" viewBox="0 0 24 24"><path d="M0 3.449L9.75 2.1v9.451H0m10.949-9.602L24 0v11.4H10.949M0 12.6h9.75v9.451L0 20.699M10.949 12.6H24V24l-12.9-1.801"/></svg>
                                    <span class="font-medium">Windows 10/11 (64-bit)</span>
                                </span>

                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#CBD5E1]">
                                    <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="currentColor" viewBox="0 0 24 24"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.62-.75 1.04-1.8 1.01-2.87-.96.04-2.13.64-2.79 1.41-.58.68-1.1 1.76-.96 2.81 1.07.08 2.12-.6 2.74-1.35z"/></svg>
                                    <span class="font-medium">macOS (Apple / Intel)</span>
                                </span>

                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-[#F8FAFC] dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-[#CBD5E1]">
                                    <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                                    <span class="font-medium">Web Cloud Engine</span>
                                </span>
                            </div>
                        </div>

                        <!-- Right: Action Buttons Group -->
                        <div class="lg:col-span-5 flex flex-col gap-3 justify-center">
                            @if($p->download_url)
                                <a href="{{ $p->download_url }}" target="_blank" class="lush-btn-primary lush-btn-vip !py-3.5 !text-sm !justify-center shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span>Tải Bản Cài Đặt Chính Thức</span>
                                </a>
                            @else
                                <a href="{{ route('contact', ['product' => $p->slug]) }}" data-open-trial="{{ $p->name }}" class="lush-btn-primary lush-btn-vip !py-3.5 !text-sm !justify-center shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                                    <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    <span>Đăng Ký Nhận Bản Cài Đặt Dùng Thử</span>
                                </a>
                            @endif

                            <div class="grid grid-cols-2 gap-2.5">
                                <a href="{{ route('products.show', $p->slug) }}" class="lush-btn-secondary !py-2.5 !text-xs !justify-center font-bold">
                                    <span>Xem tính năng &rarr;</span>
                                </a>

                                <a href="{{ route('contact', ['product' => $p->slug]) }}" class="lush-btn-secondary !py-2.5 !text-xs !justify-center font-bold text-[#168BD2]" title="Kỹ sư hỗ trợ cài đặt Ultraview">
                                    <svg class="w-3.5 h-3.5 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                    <span>Hỗ trợ Ultraview</span>
                                </a>
                            </div>

                            <div class="flex items-center justify-between text-[11px] text-[#718096] dark:text-[#94A3B8] px-1 pt-1">
                                <span class="flex items-center gap-1">
                                    <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                    Không chèn quảng cáo
                                </span>
                                <span class="font-mono text-[#168BD2]">Clean Build 2026</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Interactive 3-Step Quick Setup Guide -->
        <div class="mt-24 lg:mt-32">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    QUY TRÌNH 3 BƯỚC
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Hướng Dẫn Cài Đặt Nhanh Trong 3 Phút
                </h2>
                <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                    Bộ cài đặt tự động nhận diện phần cứng và cấu hình môi trường chuẩn nhất cho máy tính của bạn.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="lush-card-vip p-7 group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-5 shadow-md shadow-[#168BD2]/30">
                        01
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Tải Tệp Cài Đặt</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Bấm nút <span class="font-bold text-[#168BD2]">Tải Bản Cài Đặt</span> tương ứng với phần mềm bạn cần. Tệp tin được tải trực tiếp từ CDN máy chủ tốc độ cao.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="lush-card-vip p-7 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-5 shadow-md shadow-[#168BD2]/30">
                        02
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Chạy Trình Cài Đặt</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Mở tệp (.exe trên Windows hoặc .dmg trên macOS). Trình hướng dẫn sẽ tự động giải nén và thiết lập icon khởi chạy ngoài màn hình.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="lush-card-vip p-7 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center font-black text-lg mb-5 shadow-md shadow-[#168BD2]/30">
                        03
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">Đăng Nhập & Kích Hoạt</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Đăng nhập tài khoản LushSoftware đã đăng ký để bắt đầu trải nghiệm bản quyền hoặc liên hệ kỹ sư Ultraview để nhận hỗ trợ 1-1.
                    </p>
                </div>
            </div>
        </div>

        <!-- Troubleshooting & System Requirements Matrix -->
        <div class="mt-24 lg:mt-32">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    THÔNG SỐ TƯƠNG THÍCH
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Yêu Cầu Cấu Hình Hệ Thống Khuyến Nghị
                </h2>
            </div>

            <div class="bg-white dark:bg-[#111A24] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden shadow-xs" data-aos="fade-up">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm">
                        <thead>
                            <tr class="bg-[#F8FAFC] dark:bg-[#152332] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <th class="p-4 sm:p-5 font-bold text-[#172B3A] dark:text-white">Phần cứng / Môi trường</th>
                                <th class="p-4 sm:p-5 font-bold text-[#168BD2] bg-[#168BD2]/5">Cấu hình khuyến nghị (Tối ưu nhất)</th>
                                <th class="p-4 sm:p-5 font-bold text-[#718096]">Cấu hình tối thiểu</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Hệ điều hành</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">Windows 10 / 11 64-bit hoặc macOS 13+</td>
                                <td class="p-4 sm:p-5 text-[#718096]">Windows 7 SP1 (64-bit)</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Bộ nhớ RAM</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">8 GB - 16 GB RAM (Nuôi nhiều nick đa luồng)</td>
                                <td class="p-4 sm:p-5 text-[#718096]">4 GB RAM</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Bộ vi xử lý CPU</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">Intel Core i5 / AMD Ryzen 5 thế hệ 8+ hoặc Apple M1/M2/M3</td>
                                <td class="p-4 sm:p-5 text-[#718096]">Intel Core i3 thế hệ 4+</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Ổ cứng lưu trữ</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">Ổ SSD còn trống tối thiểu 5 GB</td>
                                <td class="p-4 sm:p-5 text-[#718096]">Ổ cứng còn trống 2 GB</td>
                            </tr>
                            <tr>
                                <td class="p-4 sm:p-5 font-semibold text-[#172B3A] dark:text-white">Kết nối Internet</td>
                                <td class="p-4 sm:p-5 text-[#168BD2] font-bold bg-[#168BD2]/5">Đường truyền ổn định > 30 Mbps, hỗ trợ Clean Proxy</td>
                                <td class="p-4 sm:p-5 text-[#718096]">> 10 Mbps</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Grand Installation Assistance Banner (Grand Finale) -->
        <div class="mt-24 lg:mt-32 relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-14 lg:p-18 text-center overflow-hidden" data-aos="zoom-in">
            <!-- Radiant Ambient Spotlight -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    HỖ TRỢ CÀI ĐẶT TRỰC TIẾP
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Gặp Khó Khăn Trong Quá Trình <br />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Cài Đặt & Cấu Hình
                    </span>?
                </h2>

                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-xl mx-auto font-normal">
                    Kỹ sư phần mềm của LushSoftware luôn sẵn sàng kết nối Ultraview / Teamviewer để trực tiếp kiểm tra cấu hình máy tính và cài đặt hoàn tất cho bạn.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact') }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span>Yêu Cầu Hỗ Trợ Ultraview Ngay</span>
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
@endsection
