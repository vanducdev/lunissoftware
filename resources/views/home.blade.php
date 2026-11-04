@extends('layouts.app')

@section('title', \App\Models\WebsiteSetting::get('meta_title', 'LushSoftware – Nền tảng phần mềm & Tự động hóa tăng trưởng doanh nghiệp'))
@section('meta_description', \App\Models\WebsiteSetting::get('meta_description', 'LushSoftware - Hệ sinh thái phần mềm tự động hóa tiếp thị, nuôi nick đa kênh và CRM tăng trưởng doanh nghiệp 2026.'))
@section('canonical_url', route('home'))

@section('content')
    <!-- 5.1. Hero Section -->
    <section class="relative pt-2.5 pb-14 sm:pt-3.5 lg:pt-4 lg:pb-16 overflow-hidden bg-white dark:bg-[#0B1118]">
        <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-20%,rgba(22,139,210,0.18),rgba(255,255,255,0))] pointer-events-none"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.07] dark:opacity-[0.14] pointer-events-none"></div>
        <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-[#168BD2]/12 rounded-full blur-3xl pointer-events-none animate-pulse-glow"></div>
        <div class="absolute bottom-10 left-1/4 w-80 h-80 bg-[#48B4E5]/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Hero Left: Copy & CTAs -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left" data-aos="fade-up">
                    <!-- High-tech VIP Announcement Pill -->
                    <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs hover:border-[#168BD2] hover:shadow-md hover:shadow-[#168BD2]/15 transition-all duration-300 group cursor-pointer backdrop-blur-md">
                        <span class="flex h-2 w-2 relative">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                        </span>
                        <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">{{ $heroBanner->badge ?? 'CÔNG NGHỆ BỨT PHÁ 2026' }}</span>
                        <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• Thế Hệ Phần Mềm Tự Động Mới</span>
                        <svg class="w-3.5 h-3.5 text-[#168BD2] group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <!-- Main Headline with Perfectly Balanced Line Wrapping & Gradient Glow -->
                    <h1 class="text-3xl sm:text-5xl lg:text-[3.35rem] font-black tracking-tight text-[#172B3A] dark:text-white leading-[1.14]">
                        Hệ Sinh Thái Phần Mềm <br />
                        <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                            Tăng Trưởng Bứt Phá
                        </span>
                        <br class="hidden sm:inline" /> Toàn Diện Doanh Nghiệp
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-base sm:text-lg text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-2xl mx-auto lg:mx-0 font-normal">
                        {{ $heroBanner->subtitle ?? 'Giải pháp tự động hóa tiếp thị đa kênh, quản trị dàn tài khoản, khai thác dữ liệu thị trường và chốt đơn toàn diện — giúp doanh nghiệp bứt phá doanh thu bền vững.' }}
                    </p>

                    <!-- CTAs with VIP Shimmer Sweep -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-1">
                        <a href="{{ route('products.index') }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all group font-bold">
                            <span class="text-amber-300 mr-1 text-sm">✦</span>
                            <span>Khám Phá Sản Phẩm</span>
                            <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-3.5 !px-7 hover:-translate-y-0.5 transition-all group backdrop-blur-md">
                            <svg class="w-4 h-4 text-[#168BD2] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <span>Nhận Tư Vấn Miễn Phí</span>
                        </a>
                    </div>

                    <!-- Customer Social Proof Strip (Luxury Glass Pill Widget) -->
                    <div class="pt-2 flex items-center justify-center lg:justify-start">
                        <div class="inline-flex flex-col sm:flex-row items-center gap-3 sm:gap-4 p-2.5 sm:p-2 sm:pr-5 rounded-2xl bg-white/90 dark:bg-[#111A24]/90 backdrop-blur-xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm hover:shadow-md hover:border-[#168BD2]/35 transition-all duration-300">
                            <!-- Real Customer Avatars Stack -->
                            <div class="flex items-center -space-x-3 overflow-visible">
                                <img src="{{ asset('images/avatars/avatar-1.jpg') }}" alt="Customer" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full ring-2 ring-white dark:ring-[#111A24] object-cover shadow-xs hover:scale-115 hover:z-20 transition-transform duration-200" />
                                <img src="{{ asset('images/avatars/avatar-2.jpg') }}" alt="Customer" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full ring-2 ring-white dark:ring-[#111A24] object-cover shadow-xs hover:scale-115 hover:z-20 transition-transform duration-200" />
                                <img src="{{ asset('images/avatars/avatar-3.jpg') }}" alt="Customer" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full ring-2 ring-white dark:ring-[#111A24] object-cover shadow-xs hover:scale-115 hover:z-20 transition-transform duration-200" />
                                <img src="{{ asset('images/avatars/avatar-4.jpg') }}" alt="Customer" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full ring-2 ring-white dark:ring-[#111A24] object-cover shadow-xs hover:scale-115 hover:z-20 transition-transform duration-200" />
                                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full ring-2 ring-white dark:ring-[#111A24] bg-gradient-to-br from-[#168BD2] via-[#0878BD] to-[#055B91] text-white font-extrabold text-[11px] flex items-center justify-center shadow-xs hover:scale-115 hover:z-20 transition-transform duration-200 cursor-pointer">
                                    +15k
                                </div>
                            </div>

                            <!-- Divider (desktop) -->
                            <div class="hidden sm:block h-8 w-px bg-[#E8EDF2] dark:border-[#1E2D3D]"></div>

                            <!-- Rating Details & Verified Badge -->
                            <div class="flex flex-col text-center sm:text-left">
                                <div class="flex items-center justify-center sm:justify-start gap-1.5">
                                    <!-- Sharp glowing SVG stars -->
                                    <div class="flex items-center gap-0.5 text-amber-400">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg class="w-3.5 h-3.5 fill-current drop-shadow-[0_1px_2px_rgba(245,158,11,0.35)]" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="font-black text-[#172B3A] dark:text-white text-xs">4.9/5</span>
                                    <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-full">
                                        <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        Đã xác thực
                                    </span>
                                </div>
                                <p class="text-[11px] text-[#5A6E85] dark:text-[#94A3B8] font-medium mt-0.5">
                                    Hơn <strong class="text-[#172B3A] dark:text-white font-bold">15,000+</strong> cá nhân &amp; doanh nghiệp tin dùng
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Trust indicators with Glass Pill styling -->
                    <div class="pt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-wrap items-center justify-center lg:justify-start gap-4 text-xs">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs">
                            <div class="w-4 h-4 rounded-full bg-emerald-500/15 flex items-center justify-center text-emerald-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="font-semibold text-[#172B3A] dark:text-[#E2E8F0]">Dùng thử miễn phí 7 ngày</span>
                        </div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs">
                            <div class="w-4 h-4 rounded-full bg-[#168BD2]/15 flex items-center justify-center text-[#168BD2]">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <span class="font-semibold text-[#172B3A] dark:text-[#E2E8F0]">Bảo mật cấp doanh nghiệp</span>
                        </div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs">
                            <div class="w-4 h-4 rounded-full bg-amber-500/15 flex items-center justify-center text-amber-600">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                            <span class="font-semibold text-[#172B3A] dark:text-[#E2E8F0]">Hỗ trợ kỹ thuật 24/7 Ultraview</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right: Next-Gen 3D SaaS Console (Clean, Premium, No Emoji) -->
                <div class="lg:col-span-5 relative lush-hero-3d-wrap" data-aos="fade-left" data-aos-delay="150">
                    <div class="relative mx-auto max-w-lg lg:max-w-none">
                        <!-- Glass Chassis with 3D Perspective Tilt & Multi-Layer Depth Shadow -->
                        <div class="lush-hero-3d-chassis bg-white/95 dark:bg-[#111A24]/95 backdrop-blur-2xl rounded-3xl border border-[#E2E8F0] dark:border-[#1E2D3D] shadow-[0_30px_80px_-15px_rgba(22,139,210,0.22),0_10px_25px_rgba(0,0,0,0.04)] p-5 sm:p-6 relative overflow-hidden transition-all">
                            <!-- Window Chrome bar -->
                            <div class="flex items-center justify-between pb-3.5 mb-3.5 border-b border-[#E8EDF2] dark:border-[#1E2D3D] relative z-10">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-3 h-3 rounded-full bg-rose-400 inline-block shadow-2xs"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-400 inline-block shadow-2xs"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-400 inline-block shadow-2xs"></span>
                                </div>
                                <span class="text-[11px] font-mono font-semibold text-[#5A6E85] dark:text-[#94A3B8] bg-[#F8FAFC] dark:bg-[#0B1118] px-3.5 py-1 rounded-full border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-1.5 shadow-2xs">
                                    <svg class="w-3 h-3 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    app.lushsoftware.vn/hub
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#168BD2] bg-[#168BD2]/10 border border-[#168BD2]/20 px-2.5 py-0.5 rounded-full flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2]"></span>
                                    Live v2.4
                                </span>
                            </div>

                            <!-- Live Telemetry Card with Glowing Spline Curve -->
                            <div class="bg-gradient-to-br from-[#F8FAFC] via-[#F1F7FB] to-[#EBF5FB] dark:from-[#152332] dark:via-[#182839] dark:to-[#1B2D40] p-4 sm:p-4.5 rounded-2xl border border-[#E2E8F0] dark:border-[#1E2D3D] mb-3.5 shadow-xs relative overflow-hidden">
                                <div class="flex items-center justify-between relative z-10">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-[10px] font-black uppercase tracking-wider text-[#718096] dark:text-[#94A3B8] block">Lưu lượng tự động hóa tháng này</span>
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                        </div>
                                        <p class="text-2xl sm:text-3xl font-black text-[#172B3A] dark:text-white mt-0.5 tracking-tight flex items-center gap-2.5">
                                            1,248,950 
                                            <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-full flex items-center gap-1">
                                                <svg class="w-3 h-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                                +42.8%
                                            </span>
                                        </p>
                                    </div>
                                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center shadow-md shadow-[#168BD2]/30 shrink-0">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                                    </div>
                                </div>

                                <!-- Futuristic Glowing SVG Spline Curve -->
                                <div class="relative mt-2 pt-2">
                                    <svg viewBox="0 0 400 80" class="w-full h-16 overflow-visible" fill="none">
                                        <defs>
                                            <linearGradient id="heroChartGrad" x1="0" y1="0" x2="0" y2="1">
                                                <stop offset="0%" stop-color="#168BD2" stop-opacity="0.35" />
                                                <stop offset="100%" stop-color="#168BD2" stop-opacity="0.0" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Gradient area fill -->
                                        <path d="M 0,65 C 60,60 100,38 160,42 C 220,46 260,20 320,24 C 360,28 385,8 400,10 L 400,80 L 0,80 Z" fill="url(#heroChartGrad)" />
                                        <!-- Crisp line stroke -->
                                        <path d="M 0,65 C 60,60 100,38 160,42 C 220,46 260,20 320,24 C 360,28 385,8 400,10" stroke="#168BD2" stroke-width="2.5" stroke-linecap="round" />
                                        <!-- Pulsing data points -->
                                        <circle cx="160" cy="42" r="3.5" fill="#168BD2" class="drop-shadow-[0_0_6px_#168BD2]" />
                                        <circle cx="320" cy="24" r="3.5" fill="#168BD2" class="drop-shadow-[0_0_6px_#168BD2]" />
                                        <circle cx="400" cy="10" r="4.5" fill="#48B4E5" class="drop-shadow-[0_0_8px_#48B4E5]" />
                                    </svg>
                                    <div class="flex items-center justify-between text-[10px] text-[#718096] dark:text-[#94A3B8] font-mono pt-1">
                                        <span>Tuần 1: 240k</span>
                                        <span>Tuần 2: 410k</span>
                                        <span>Tuần 3: 780k</span>
                                        <span class="text-[#168BD2] font-bold">Hiện tại: 1.25M</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Live Active Modules Feed (Custom Bespoke SVG Icons - No Generic Industrial Emojis) -->
                            <div class="space-y-2.5">
                                <!-- Module 1: LushCare -->
                                <div class="p-3 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/50 hover:shadow-md transition-all group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center shrink-0 shadow-xs shadow-[#168BD2]/20 group-hover:scale-105 transition-transform">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-1.5">
                                                <p class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors">LushCare v3.5</p>
                                                <span class="text-[9px] font-bold text-[#168BD2] bg-[#168BD2]/10 border border-[#168BD2]/20 px-1.5 py-0.2 rounded">FLAGSHIP</span>
                                            </div>
                                            <p class="text-[10px] text-[#718096] dark:text-[#94A3B8] mt-0.5">Nuôi nick đa kênh • 45,000 tương tác tự động/ngày</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full flex items-center gap-1 shrink-0 shadow-2xs">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                                        Kháng Checkpoint
                                    </span>
                                </div>

                                <!-- Module 2: LushLogin -->
                                <div class="p-3 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/50 hover:shadow-md transition-all group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#6366F1] to-[#4F46E5] text-white flex items-center justify-center shrink-0 shadow-xs shadow-indigo-500/20 group-hover:scale-105 transition-transform">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-1.5">
                                                <p class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors">LushLogin Antidetect</p>
                                                <span class="text-[9px] font-bold text-purple-600 bg-purple-500/10 border border-purple-500/20 px-1.5 py-0.2 rounded">PRO</span>
                                            </div>
                                            <p class="text-[10px] text-[#718096] dark:text-[#94A3B8] mt-0.5">Quản trị 2,450 profiles • Vân tay Canvas 100% độc lập</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-[#168BD2] dark:text-[#48B4E5] bg-[#168BD2]/10 border border-[#168BD2]/20 px-2.5 py-1 rounded-full shrink-0 shadow-2xs">
                                        IPv6 Clean Proxy
                                    </span>
                                </div>

                                <!-- Module 3: LushCRM -->
                                <div class="p-3 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex items-center justify-between shadow-2xs hover:border-[#168BD2]/50 hover:shadow-md transition-all group">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#059669] to-[#0D9488] text-white flex items-center justify-center shrink-0 shadow-xs shadow-emerald-500/20 group-hover:scale-105 transition-transform">
                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-1.5">
                                                <p class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors">LushCRM Enterprise</p>
                                                <span class="text-[9px] font-bold text-emerald-600 bg-emerald-500/10 border border-emerald-500/20 px-1.5 py-0.2 rounded">SUITE</span>
                                            </div>
                                            <p class="text-[10px] text-[#718096] dark:text-[#94A3B8] mt-0.5">Phễu bán hàng tự động: +85 khách chốt đơn hôm nay</p>
                                        </div>
                                    </div>
                                    <span class="text-[10px] font-bold text-amber-600 dark:text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 rounded-full shrink-0 shadow-2xs font-mono">
                                        +285M ₫
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Floating Stat Badge Top Right (Aerospace Grade Glass Pill) -->
                        <div class="absolute -top-6 -right-2 sm:-right-6 z-30 bg-white/95 dark:bg-[#131D27]/95 backdrop-blur-xl px-3.5 py-2.5 rounded-2xl border border-white/80 dark:border-[#1E2D3D] shadow-[0_15px_35px_rgba(16,185,129,0.18)] flex items-center gap-3 animate-lush-float ring-1 ring-emerald-500/20">
                            <div class="relative flex h-3 w-3">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
                            </div>
                            <div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-xs font-black text-[#172B3A] dark:text-white">99.99%</span>
                                    <span class="text-[9px] font-bold text-emerald-600 bg-emerald-500/10 px-1.5 py-0.2 rounded">SLA</span>
                                </div>
                                <p class="text-[10px] text-[#718096] dark:text-[#94A3B8]">Cloud Phân Tán</p>
                            </div>
                        </div>

                        <!-- Floating Stat Badge Bottom Left (Processor Chip SVG - No Emojis) -->
                        <div class="absolute -bottom-6 -left-2 sm:-left-6 z-30 bg-white/95 dark:bg-[#131D27]/95 backdrop-blur-xl px-3.5 py-2.5 rounded-2xl border border-white/80 dark:border-[#1E2D3D] shadow-[0_15px_35px_rgba(22,139,210,0.22)] flex items-center gap-3 animate-lush-float-reverse ring-1 ring-[#168BD2]/20">
                            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center shadow-md shadow-[#168BD2]/30 shrink-0">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-black text-[#172B3A] dark:text-white">Lush AI Core 2.4</p>
                                <p class="text-[10px] text-[#718096] dark:text-[#94A3B8]">12+ Công Cụ Tự Động</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.6. High-Impact Statistics Bento Showcase -->
    <section class="relative py-14 lg:py-18 bg-[#F8FAFC]/80 dark:bg-[#0B1118] border-y border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden">
        <!-- Ambient radial glow behind stats -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_50%,rgba(22,139,210,0.06),transparent)] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">
                <!-- Stat Card 1: Doanh Nghiệp -->
                <div class="group relative bg-white dark:bg-[#111A24] rounded-3xl p-6 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs hover:shadow-xl hover:shadow-[#168BD2]/12 hover:border-[#168BD2]/40 hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="50">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center group-hover:bg-[#168BD2] group-hover:text-white transition-all duration-300 shadow-xs">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Top 1 VN
                        </span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight group-hover:text-[#168BD2] transition-colors">
                            {{ $stats['clients'] }}
                        </p>
                        <p class="text-sm font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                            Doanh Nghiệp Tin Dùng
                        </p>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed pt-1">
                            Quy mô từ cá nhân kinh doanh đến doanh nghiệp lớn toàn quốc.
                        </p>
                    </div>
                    <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-[#168BD2] to-[#48B4E5] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <!-- Stat Card 2: Giải Pháp -->
                <div class="group relative bg-white dark:bg-[#111A24] rounded-3xl p-6 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs hover:shadow-xl hover:shadow-[#168BD2]/12 hover:border-[#168BD2]/40 hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-[#6366F1]/10 text-[#6366F1] flex items-center justify-center group-hover:bg-[#6366F1] group-hover:text-white transition-all duration-300 shadow-xs">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-[10px] font-bold text-[#168BD2] dark:text-[#48B4E5] bg-[#168BD2]/10 border border-[#168BD2]/20 px-2.5 py-1 rounded-full">
                            All-in-One
                        </span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight group-hover:text-[#6366F1] transition-colors">
                            {{ $stats['products'] }}
                        </p>
                        <p class="text-sm font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                            Giải Pháp Chuyên Biệt
                        </p>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed pt-1">
                            Tự động hóa tiếp thị, nuôi nick, bảo mật trình duyệt &amp; CRM.
                        </p>
                    </div>
                    <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-[#6366F1] to-[#168BD2] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <!-- Stat Card 3: Người Dùng -->
                <div class="group relative bg-white dark:bg-[#111A24] rounded-3xl p-6 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs hover:shadow-xl hover:shadow-[#168BD2]/12 hover:border-[#168BD2]/40 hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="150">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300 shadow-xs">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <span class="text-[10px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            Hoạt Động 24/7
                        </span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight group-hover:text-emerald-600 transition-colors">
                            {{ $stats['users'] }}
                        </p>
                        <p class="text-sm font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                            Người Dùng Hoạt Động
                        </p>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed pt-1">
                            Hàng triệu lượt tương tác &amp; chiến dịch chạy ổn định mỗi ngày.
                        </p>
                    </div>
                    <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-emerald-500 to-teal-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>

                <!-- Stat Card 4: Năm Phát Triển -->
                <div class="group relative bg-white dark:bg-[#111A24] rounded-3xl p-6 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs hover:shadow-xl hover:shadow-[#168BD2]/12 hover:border-[#168BD2]/40 hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center group-hover:bg-amber-600 group-hover:text-white transition-all duration-300 shadow-xs">
                            <svg class="w-6 h-6 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        </div>
                        <span class="text-[10px] font-bold text-amber-600 dark:text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-1 rounded-full">
                            Kinh Nghiệm
                        </span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight group-hover:text-amber-600 transition-colors">
                            {{ $stats['years'] }}
                        </p>
                        <p class="text-sm font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                            Năm Phát Triển &amp; Đồng Hành
                        </p>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed pt-1">
                            Tiên phong kiến tạo công cụ số tối ưu hiệu quả doanh số.
                        </p>
                    </div>
                    <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-amber-500 to-orange-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.3. Danh mục & Hệ sinh thái sản phẩm (Masterpiece 3D Grid) -->
    <section class="relative py-20 lg:py-28 bg-white dark:bg-[#0B1118] overflow-hidden">
        <!-- Ambient radial glow behind products -->
        <div class="absolute top-0 right-1/3 w-96 h-96 bg-[#168BD2]/6 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-96 h-96 bg-[#48B4E5]/6 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-6 lg:mb-8" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-bold tracking-wide uppercase mb-3">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    HỆ SINH THÁI BẢN QUYỀN 2026
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Giải Pháp Phần Mềm <br class="hidden sm:inline" />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Đột Phá Doanh Số
                    </span>
                    Toàn Diện
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base leading-relaxed">
                    Mỗi giải pháp được thiết kế chuyên sâu giải quyết triệt để từng nút thắt tăng trưởng: từ tự động hóa tiếp thị, quản trị hàng nghìn tài khoản đến chuyển đổi phễu bán hàng.
                </p>
            </div>

            <!-- Product Grid with Luxury 3D Presentation -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $idx => $product)
                    <div class="lush-card-vip flex flex-col justify-between group" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                        <div>
                            <!-- Top 3D Boxshot Stage -->
                            <div class="relative w-full h-64 sm:h-72 bg-gradient-to-tr from-[#F8FAFC] via-[#F0F6FB] to-[#EAF5FC] dark:from-[#0D151F] dark:via-[#111A24] dark:to-[#162230] p-6 flex items-center justify-center overflow-hidden border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-[#168BD2]/5 to-transparent group-hover:via-[#168BD2]/15 transition-all duration-500"></div>

                                <!-- Floating Badge -->
                                <div class="absolute top-3.5 left-3.5 z-20">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/90 dark:bg-[#111A24]/90 text-[#172B3A] dark:text-white border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Bản Quyền 2026
                                    </span>
                                </div>

                                @if($product->banner_url)
                                    <a href="{{ route('products.show', $product->slug) }}" class="relative z-10 w-full h-full flex items-center justify-center">
                                        <img src="{{ $product->banner_url }}" alt="{{ $product->name }}" class="max-h-full max-w-full object-contain transform group-hover:scale-108 group-hover:-translate-y-2 transition-all duration-500 drop-shadow-[0_15px_25px_rgba(22,139,210,0.22)]">
                                    </a>
                                @else
                                    <div class="relative z-10 flex flex-col items-center justify-center">
                                        <x-product-icon :slug="$product->slug" size="xl" class="group-hover:scale-110 group-hover:-translate-y-1 transition-all duration-500 shadow-xl" />
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
                                            <img src="{{ $product->logo_url }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-xl object-contain border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs group-hover:scale-105 transition-transform">
                                        @else
                                            <x-product-icon :slug="$product->slug" size="sm" />
                                        @endif
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors leading-snug">
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                {{ $product->trans('name') }}
                                            </a>
                                        </h3>
                                        <p class="text-xs font-bold text-[#168BD2] mt-0.5 line-clamp-1">
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
                                <a href="{{ route('products.show', $product->slug) }}" class="lush-btn-primary flex-1 !text-xs !py-2.5 !justify-center shadow-md shadow-[#168BD2]/20 font-bold group-hover:shadow-lg transition-all">
                                    <span>{{ __('View Details') }}</span>
                                    <svg class="w-3.5 h-3.5 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-secondary !text-xs !py-2.5 !px-3.5 font-bold" title="Đăng ký trải nghiệm">
                                    <svg class="w-3.5 h-3.5 text-[#168BD2] mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>{{ __('Try Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-14" data-aos="fade-up">
                <a href="{{ route('products.index') }}" class="lush-btn-secondary !py-3.5 !px-8 text-sm font-bold shadow-sm hover:shadow-md transition-all group">
                    <span>Xem Tất Cả Giải Pháp (12+ Phần Mềm)</span>
                    <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- 5.4. Giải pháp công nghệ (Interactive Bento Architecture) -->
    <section class="relative py-20 lg:py-28 bg-[#F8FAFC]/90 dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D] overflow-hidden">
        <!-- Subtle background glow -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_50%_at_50%_0%,rgba(22,139,210,0.06),transparent)] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-6 lg:mb-8" data-aos="fade-up">
                <span class="badge-lush mb-3">{{ __('Our Technology Solutions') }}</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Giải Pháp Công Nghệ Cho <br class="hidden sm:inline" />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Doanh Nghiệp Thời Đại Số
                    </span>
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base leading-relaxed">
                    Chúng tôi giúp bạn số hóa quy trình kinh doanh, tối đa hóa chuyển đổi và giải phóng 90% sức lao động lặp lại của đội ngũ.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Solution 1 -->
                <div class="lush-card-vip p-6 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="50">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white shadow-lg shadow-[#168BD2]/25 ring-1 ring-white/20 flex items-center justify-center font-bold group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 border border-[#168BD2]/20 px-2.5 py-1 rounded-full">
                                45k lead/ngày
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white mb-2 group-hover:text-[#168BD2] transition-colors">
                            Tự Động Hóa Tiếp Thị
                        </h3>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                            Tiếp cận đúng khách hàng tiềm năng qua Email, SMS và Zalo với kịch bản cá nhân hóa tự động theo phễu.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#168BD2] group-hover:translate-x-1 transition-transform">
                            <span>Khám phá giải pháp</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Solution 2 -->
                <div class="lush-card-vip p-6 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#059669] to-[#0D9488] text-white shadow-lg shadow-[#059669]/25 ring-1 ring-white/20 flex items-center justify-center font-bold group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-emerald-600 bg-emerald-500/10 border border-emerald-500/20 px-2.5 py-1 rounded-full">
                                Tăng 3.5x Deal
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white mb-2 group-hover:text-emerald-600 transition-colors">
                            Quản Trị Bán Hàng CRM
                        </h3>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                            Theo dõi chi tiết phễu khách hàng, tự động chia lead và kiểm soát doanh thu từng nhân sự theo thời gian thực.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 group-hover:translate-x-1 transition-transform">
                            <span>Khám phá giải pháp</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Solution 3 -->
                <div class="lush-card-vip p-6 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="150">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#8B5CF6] to-[#7C3AED] text-white shadow-lg shadow-[#8B5CF6]/25 ring-1 ring-white/20 flex items-center justify-center font-bold group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-purple-600 bg-purple-500/10 border border-purple-500/20 px-2.5 py-1 rounded-full">
                                0s Trễ Tin
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white mb-2 group-hover:text-purple-600 transition-colors">
                            Hội Tụ Đa Kênh Chat
                        </h3>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                            Gom toàn bộ tin nhắn từ Fanpage, TikTok và Website về một màn hình duy nhất, trả lời tức thì bằng AI Chatbot.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-purple-600 group-hover:translate-x-1 transition-transform">
                            <span>Khám phá giải pháp</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Solution 4 -->
                <div class="lush-card-vip p-6 group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#0284C7] to-[#0369A1] text-white shadow-lg shadow-[#0284C7]/25 ring-1 ring-white/20 flex items-center justify-center font-bold group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-sky-600 bg-sky-500/10 border border-sky-500/20 px-2.5 py-1 rounded-full">
                                AI Insights
                            </span>
                        </div>
                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white mb-2 group-hover:text-sky-600 transition-colors">
                            Dữ Liệu &amp; Insight Thị Trường
                        </h3>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                            Thu thập và phân tích dữ liệu ngành, đối thủ để đưa ra các quyết định kinh doanh chuẩn xác và kịp thời.
                        </p>
                    </div>
                    <div class="pt-5 mt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-600 group-hover:translate-x-1 transition-transform">
                            <span>Khám phá giải pháp</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.5. Vì sao chọn LushSoftware (Enterprise Proof Showcase) -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                    <span class="badge-lush">{{ __('Why Choose LushSoftware') }}</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                        Đối Tác Công Nghệ <br />
                        <span class="bg-gradient-to-r from-[#168BD2] to-[#48B4E5] bg-clip-text text-transparent">
                            Đáng Tin Cậy
                        </span>
                        Của Doanh Nghiệp
                    </h2>
                    <p class="text-[#718096] dark:text-[#94A3B8] text-base leading-relaxed">
                        Khác biệt với các công cụ rời rạc trên thị trường, LushSoftware đem lại một nền tảng đồng bộ, ổn định và tối ưu toàn diện theo tiêu chuẩn quốc tế.
                    </p>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 text-sm text-[#172B3A] dark:text-[#E2E8F0] font-semibold">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Cam kết Uptime SLA 99.99% Cloud Phân Tán</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-[#172B3A] dark:text-[#E2E8F0] font-semibold">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Hỗ trợ kỹ thuật 24/7 trực tiếp qua Ultraview / Zalo</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm text-[#172B3A] dark:text-[#E2E8F0] font-semibold">
                            <div class="w-5 h-5 rounded-full bg-emerald-500/10 text-emerald-600 flex items-center justify-center shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span>Cập nhật liên tục theo thuật toán Meta, TikTok mới nhất</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <a href="{{ route('about') }}" class="lush-btn-primary lush-btn-vip !py-3.5 !px-8 text-sm font-bold shadow-lg shadow-[#168BD2]/25 group">
                            <span>Khám Phá Tầm Nhìn LushSoftware</span>
                            <svg class="w-4 h-4 ml-1.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-5" data-aos="fade-left">
                    <div class="lush-card-vip p-6 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#48B4E5] text-white shadow-md shadow-[#168BD2]/25 flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h4 class="font-black text-base text-[#172B3A] dark:text-white mb-2 group-hover:text-[#168BD2] transition-colors">Tốc Độ Xử Lý Tối Ưu</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Cấu trúc hạ tầng điện toán đám mây phân tán cho độ trễ dưới 45ms ở mọi tác vụ đa luồng.</p>
                    </div>

                    <div class="lush-card-vip p-6 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#059669] to-[#10B981] text-white shadow-md shadow-[#059669]/25 flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h4 class="font-black text-base text-[#172B3A] dark:text-white mb-2 group-hover:text-emerald-600 transition-colors">Bảo Mật Tiêu Chuẩn Cao</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Mã hóa đa tầng và sao lưu dữ liệu tự động hàng ngày đảm bảo tài sản số luôn an toàn tuyệt đối.</p>
                    </div>

                    <div class="lush-card-vip p-6 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#6366F1] to-[#8B5CF6] text-white shadow-md shadow-[#6366F1]/25 flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        </div>
                        <h4 class="font-black text-base text-[#172B3A] dark:text-white mb-2 group-hover:text-indigo-600 transition-colors">Cập Nhật Thuật Toán Liên Tục</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Luôn nâng cấp và thích ứng tự động theo các thay đổi thuật toán của Facebook, TikTok, Google.</p>
                    </div>

                    <div class="lush-card-vip p-6 group">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#EA580C] to-[#F59E0B] text-white shadow-md shadow-[#EA580C]/25 flex items-center justify-center font-bold mb-4 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <h4 class="font-black text-base text-[#172B3A] dark:text-white mb-2 group-hover:text-amber-600 transition-colors">Chăm Sóc Kỹ Thuật 24/7</h4>
                        <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">Đội ngũ kỹ sư và chuyên viên tư vấn hỗ trợ cài đặt từ xa qua Ultraview, Zalo và Hotline chỉ sau 15 phút.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5.7. Đánh giá khách hàng & Đối tác (Interactive Slider) -->
    <section class="py-20 lg:py-28 bg-[#F8FAFC]/90 dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-6 lg:mb-8" data-aos="fade-up">
                <span class="badge-lush mb-3">{{ __('Customer Testimonials') }}</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Khách Hàng Nói Gì Về <span class="bg-gradient-to-r from-[#168BD2] to-[#48B4E5] bg-clip-text text-transparent">LushSoftware</span>
                </h2>
                <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                    Sự hài lòng và tăng trưởng doanh số thực tế của khách hàng là bảo chứng vàng cho chất lượng của LushSoftware.
                </p>
            </div>

            <!-- Swiper Testimonials Slider -->
            <div class="swiper testimonial-swiper pb-12" data-aos="fade-up">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testi)
                        <div class="swiper-slide h-auto">
                            <div class="lush-card-vip p-7 h-full flex flex-col justify-between">
                                <div>
                                    <!-- Star rating & Verified badge -->
                                    <div class="flex items-center justify-between mb-5">
                                        <div class="flex items-center gap-1 text-amber-400">
                                            @for($i = 0; $i < $testi->rating; $i++)
                                                <svg class="w-4 h-4 fill-current drop-shadow-xs" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @endfor
                                        </div>
                                        <span class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-600 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-full">
                                            <svg class="w-2.5 h-2.5 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            Khách Hàng Thật
                                        </span>
                                    </div>
                                    <p class="text-sm text-[#172B3A] dark:text-[#E2E8F0] leading-relaxed mb-6 font-medium">
                                        "{{ $testi->content }}"
                                    </p>
                                </div>
                                <div class="flex items-center gap-3.5 pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white font-black flex items-center justify-center text-sm shadow-sm ring-2 ring-white dark:ring-[#111A24]">
                                        {{ mb_substr($testi->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-[#172B3A] dark:text-white">{{ $testi->name }}</p>
                                        <p class="text-xs text-[#718096] dark:text-[#94A3B8]">{{ $testi->position }} • {{ $testi->company }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Partners Logo Ribbon (100% Full-Width Bleed Across Screen) -->
    <section class="w-full py-10 sm:py-12 bg-white dark:bg-[#070C12] border-y border-[#E8EDF2] dark:border-white/10 overflow-hidden relative" data-aos="fade-up">
        <!-- Section Title -->
        <p class="text-center text-xs sm:text-[13px] font-bold tracking-[0.2em] uppercase text-[#64748B] dark:text-[#94A3B8] mb-6 sm:mb-8">
            ĐỒNG HÀNH CÙNG HƠN <span class="text-[#168BD2] dark:text-[#38BDF8] font-black">15,000+</span> DOANH NGHIỆP TRÊN TOÀN QUỐC
        </p>

        <!-- Edge-to-Edge 100% Screen Width Infinite Marquee with Gradient Fade Edges -->
        <div class="relative w-full overflow-hidden [mask-image:linear-gradient(to_right,transparent,black_5%,black_95%,transparent)] py-2">
            <div class="animate-marquee flex items-center gap-4 sm:gap-6">
                @php
                    $fullPartners = [
                        ['type' => 'vnpay', 'url' => 'https://vnpay.vn'],
                        ['type' => 'fpt', 'url' => 'https://fptcloud.com'],
                        ['type' => 'zalo', 'url' => 'https://oa.zalo.me'],
                        ['type' => 'viettel', 'url' => 'https://vietteltelecom.vn'],
                        ['type' => 'vnpt', 'url' => 'https://vnpt.com.vn'],
                        ['type' => 'momo', 'url' => 'https://momo.vn'],
                        ['type' => 'techcombank', 'url' => 'https://techcombank.com'],
                        ['type' => 'shopee', 'url' => 'https://shopee.vn'],
                        ['type' => 'tiktok', 'url' => 'https://seller-vn.tiktok.com'],
                        ['type' => 'mbbank', 'url' => 'https://mbbank.com.vn'],
                    ];
                @endphp

                {{-- Loop 1 of authentic brand logo lockups --}}
                @foreach($fullPartners as $b)
                    <a href="{{ $b['url'] }}" target="_blank" rel="noopener noreferrer" class="h-14 sm:h-16 px-6 sm:px-8 rounded-2xl bg-[#F8FAFC] dark:bg-[#111A24] border border-[#CBD5E1]/70 dark:border-white/10 shadow-2xs hover:shadow-lg hover:border-[#168BD2] hover:bg-white dark:hover:bg-[#162230] hover:scale-105 transition-all duration-300 flex items-center justify-center shrink-0 group select-none">
                        @if($b['type'] === 'vnpay')
                            <!-- Official VNPAY Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <path d="M17 2L31 17L17 32L3 17L17 2Z" fill="#005BAA" fill-opacity="0.12"/>
                                <path d="M17 4L28 17L17 30L6 17L17 4Z" stroke="#005BAA" stroke-width="2.5" stroke-linejoin="round"/>
                                <path d="M12.5 12.5L17 22L21.5 12.5" stroke="#ED1C24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <text x="38" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#005BAA" letter-spacing="-0.5">VN<tspan fill="#ED1C24">PAY</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'fpt')
                            <!-- Official FPT Cloud Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 145 34" fill="none">
                                <rect x="2" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#F37021"/>
                                <rect x="13.5" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#005F9E"/>
                                <rect x="25" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#5BB343"/>
                                <text x="38" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#0F172A" class="dark:fill-white" letter-spacing="-0.5">FPT <tspan fill="#168BD2" font-weight="700">Cloud</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'zalo')
                            <!-- Official Zalo Business Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 155 34" fill="none">
                                <rect x="1" y="2" width="30" height="30" rx="9" fill="#0068FF"/>
                                <text x="4.5" y="22.5" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="white" letter-spacing="-0.5">Zalo</text>
                                <text x="40" y="23.5" font-family="system-ui, sans-serif" font-size="18" font-weight="900" fill="#0068FF">Zalo <tspan fill="#64748B" font-size="14" font-weight="700">Business</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'viettel')
                            <!-- Official Viettel Telecom Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <circle cx="17" cy="17" r="15" fill="#EE0033"/>
                                <path d="M10 13c2-2 4 1 7 3 1-2 3-5 5-3M10 21c2-2 4 1 7 3 1-2 3-5 5-3" stroke="white" stroke-width="2.8" stroke-linecap="round"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#EE0033" letter-spacing="-0.5">viettel</text>
                            </svg>
                        @elseif($b['type'] === 'vnpt')
                            <!-- Official VNPT Enterprise Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <circle cx="17" cy="17" r="15" fill="#0066CC"/>
                                <circle cx="17" cy="17" r="6" fill="white"/>
                                <path d="M7 17c0-5.5 4.5-10 10-10s10 4.5 10 10" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-dasharray="2.5 2.5"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" font-style="italic" fill="#0066CC" letter-spacing="-0.5">VNPT</text>
                            </svg>
                        @elseif($b['type'] === 'momo')
                            <!-- Official MoMo Pay Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#A50064"/>
                                <circle cx="12" cy="17" r="4" fill="white"/>
                                <circle cx="22" cy="17" r="4" fill="white"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#A50064">MoMo<tspan fill="#64748B" font-size="13" font-weight="700">Pay</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'techcombank')
                            <!-- Official Techcombank Vector Logo -->
                            <svg class="h-6.5 sm:h-7.5 w-auto" viewBox="0 0 175 34" fill="none">
                                <rect x="3" y="7" width="10" height="10" rx="2" fill="#E01A22"/>
                                <rect x="16" y="17" width="10" height="10" rx="2" fill="#E01A22"/>
                                <text x="33" y="23" font-family="system-ui, sans-serif" font-size="15" font-weight="900" fill="#E01A22" letter-spacing="-0.3">TECHCOMBANK</text>
                            </svg>
                        @elseif($b['type'] === 'shopee')
                            <!-- Official Shopee Partner Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <rect x="3" y="5" width="24" height="26" rx="5" fill="#EE4D2D"/>
                                <path d="M10 7V5a5 5 0 0110 0v2" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                                <text x="11.5" y="22.5" font-family="system-ui, sans-serif" font-size="15" font-weight="900" fill="white">S</text>
                                <text x="35" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#EE4D2D">Shopee</text>
                            </svg>
                        @elseif($b['type'] === 'tiktok')
                            <!-- Official TikTok Shop Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 150 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#000000"/>
                                <path d="M21 8.5c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18.5a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8.5h1.8z" fill="#00F2FE"/>
                                <path d="M20.5 8c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8h1.8z" fill="#FE2C55"/>
                                <path d="M20.7 8.2c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18.2a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8.2h1.8z" fill="white"/>
                                <text x="40" y="23.5" font-family="system-ui, sans-serif" font-size="17" font-weight="900" fill="#0F172A" class="dark:fill-white">TikTok <tspan fill="#FE2C55" font-weight="700">Shop</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'mbbank')
                            <!-- Official MB Bank Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#002B66"/>
                                <path d="M17 7l3 7.5h8l-6.5 5 2.5 8-7-5.5-7 5.5 2.5-8-6.5-5h8z" fill="#EE0033"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#002B66" class="dark:fill-[#38BDF8]">MB<tspan fill="#EE0033" font-size="15" font-weight="700">Bank</tspan></text>
                            </svg>
                        @endif
                    </a>
                @endforeach

                {{-- Loop 2 for seamless infinite marquee loop --}}
                @foreach($fullPartners as $b)
                    <a href="{{ $b['url'] }}" target="_blank" rel="noopener noreferrer" class="h-14 sm:h-16 px-6 sm:px-8 rounded-2xl bg-[#F8FAFC] dark:bg-[#111A24] border border-[#CBD5E1]/70 dark:border-white/10 shadow-2xs hover:shadow-lg hover:border-[#168BD2] hover:bg-white dark:hover:bg-[#162230] hover:scale-105 transition-all duration-300 flex items-center justify-center shrink-0 group select-none">
                        @if($b['type'] === 'vnpay')
                            <!-- Official VNPAY Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <path d="M17 2L31 17L17 32L3 17L17 2Z" fill="#005BAA" fill-opacity="0.12"/>
                                <path d="M17 4L28 17L17 30L6 17L17 4Z" stroke="#005BAA" stroke-width="2.5" stroke-linejoin="round"/>
                                <path d="M12.5 12.5L17 22L21.5 12.5" stroke="#ED1C24" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                <text x="38" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#005BAA" letter-spacing="-0.5">VN<tspan fill="#ED1C24">PAY</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'fpt')
                            <!-- Official FPT Cloud Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 145 34" fill="none">
                                <rect x="2" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#F37021"/>
                                <rect x="13.5" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#005F9E"/>
                                <rect x="25" y="6" width="6.5" height="22" rx="3" transform="skewX(-18)" fill="#5BB343"/>
                                <text x="38" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#0F172A" class="dark:fill-white" letter-spacing="-0.5">FPT <tspan fill="#168BD2" font-weight="700">Cloud</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'zalo')
                            <!-- Official Zalo Business Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 155 34" fill="none">
                                <rect x="1" y="2" width="30" height="30" rx="9" fill="#0068FF"/>
                                <text x="4.5" y="22.5" font-family="system-ui, sans-serif" font-size="14" font-weight="900" fill="white" letter-spacing="-0.5">Zalo</text>
                                <text x="40" y="23.5" font-family="system-ui, sans-serif" font-size="18" font-weight="900" fill="#0068FF">Zalo <tspan fill="#64748B" font-size="14" font-weight="700">Business</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'viettel')
                            <!-- Official Viettel Telecom Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <circle cx="17" cy="17" r="15" fill="#EE0033"/>
                                <path d="M10 13c2-2 4 1 7 3 1-2 3-5 5-3M10 21c2-2 4 1 7 3 1-2 3-5 5-3" stroke="white" stroke-width="2.8" stroke-linecap="round"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#EE0033" letter-spacing="-0.5">viettel</text>
                            </svg>
                        @elseif($b['type'] === 'vnpt')
                            <!-- Official VNPT Enterprise Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <circle cx="17" cy="17" r="15" fill="#0066CC"/>
                                <circle cx="17" cy="17" r="6" fill="white"/>
                                <path d="M7 17c0-5.5 4.5-10 10-10s10 4.5 10 10" stroke="white" stroke-width="2.2" stroke-linecap="round" stroke-dasharray="2.5 2.5"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" font-style="italic" fill="#0066CC" letter-spacing="-0.5">VNPT</text>
                            </svg>
                        @elseif($b['type'] === 'momo')
                            <!-- Official MoMo Pay Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#A50064"/>
                                <circle cx="12" cy="17" r="4" fill="white"/>
                                <circle cx="22" cy="17" r="4" fill="white"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#A50064">MoMo<tspan fill="#64748B" font-size="13" font-weight="700">Pay</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'techcombank')
                            <!-- Official Techcombank Vector Logo -->
                            <svg class="h-6.5 sm:h-7.5 w-auto" viewBox="0 0 175 34" fill="none">
                                <rect x="3" y="7" width="10" height="10" rx="2" fill="#E01A22"/>
                                <rect x="16" y="17" width="10" height="10" rx="2" fill="#E01A22"/>
                                <text x="33" y="23" font-family="system-ui, sans-serif" font-size="15" font-weight="900" fill="#E01A22" letter-spacing="-0.3">TECHCOMBANK</text>
                            </svg>
                        @elseif($b['type'] === 'shopee')
                            <!-- Official Shopee Partner Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 135 34" fill="none">
                                <rect x="3" y="5" width="24" height="26" rx="5" fill="#EE4D2D"/>
                                <path d="M10 7V5a5 5 0 0110 0v2" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
                                <text x="11.5" y="22.5" font-family="system-ui, sans-serif" font-size="15" font-weight="900" fill="white">S</text>
                                <text x="35" y="24" font-family="system-ui, sans-serif" font-size="19" font-weight="900" fill="#EE4D2D">Shopee</text>
                            </svg>
                        @elseif($b['type'] === 'tiktok')
                            <!-- Official TikTok Shop Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 150 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#000000"/>
                                <path d="M21 8.5c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18.5a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8.5h1.8z" fill="#00F2FE"/>
                                <path d="M20.5 8c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8h1.8z" fill="#FE2C55"/>
                                <path d="M20.7 8.2c.8.8 1.8 1.3 2.8 1.4v2.7c-1-.03-2-.3-2.8-.7V18.2a4.5 4.5 0 11-4.5-4.5c.3 0 .6 0 .9.1v2.7a2 2 0 101.8 2V8.2h1.8z" fill="white"/>
                                <text x="40" y="23.5" font-family="system-ui, sans-serif" font-size="17" font-weight="900" fill="#0F172A" class="dark:fill-white">TikTok <tspan fill="#FE2C55" font-weight="700">Shop</tspan></text>
                            </svg>
                        @elseif($b['type'] === 'mbbank')
                            <!-- Official MB Bank Vector Logo -->
                            <svg class="h-7 sm:h-8 w-auto" viewBox="0 0 130 34" fill="none">
                                <rect x="2" y="2" width="30" height="30" rx="9" fill="#002B66"/>
                                <path d="M17 7l3 7.5h8l-6.5 5 2.5 8-7-5.5-7 5.5 2.5-8-6.5-5h8z" fill="#EE0033"/>
                                <text x="40" y="24" font-family="system-ui, sans-serif" font-size="20" font-weight="900" fill="#002B66" class="dark:fill-[#38BDF8]">MB<tspan fill="#EE0033" font-size="15" font-weight="700">Bank</tspan></text>
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </section>
        </div>
    </section>

    <!-- 5.8. Tin tức mới nhất (Tech Insights) -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between mb-14" data-aos="fade-up">
                <div>
                    <span class="badge-lush mb-3">{{ __('Latest News & Insights') }}</span>
                    <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                        Kiến Thức &amp; <span class="bg-gradient-to-r from-[#168BD2] to-[#48B4E5] bg-clip-text text-transparent">Tin Tức Công Nghệ</span>
                    </h2>
                </div>
                <a href="{{ route('articles.index') }}" class="mt-4 md:mt-0 text-sm font-bold text-[#168BD2] hover:underline flex items-center gap-1 group">
                    <span>Xem tất cả bài viết</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                    <article class="lush-card-vip flex flex-col justify-between group" data-aos="fade-up">
                        <div class="p-6">
                            <div class="flex items-center justify-between text-xs text-[#718096] dark:text-[#94A3B8] mb-3">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 border border-[#168BD2]/20">{{ $article->category->name ?? 'Công nghệ' }}</span>
                                <span class="font-mono text-[11px]">{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                            </div>
                            <h3 class="text-base font-black text-[#172B3A] dark:text-white mb-2.5 group-hover:text-[#168BD2] transition-colors leading-snug">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h3>
                            <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-3 leading-relaxed">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                        <div class="px-6 pb-6 pt-0">
                            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between">
                                <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                                    <span>{{ __('Read More') }}</span>
                                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                                <span class="text-[10px] text-[#718096] dark:text-[#94A3B8] font-medium">4 phút đọc</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5.9. High-converting CTA (Grand Finale Luxury SaaS Banner) -->
    <section class="py-20 lg:py-28 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D] relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-14 lg:p-20 text-center overflow-hidden" data-aos="zoom-in">
                <!-- Radiant Ambient Spotlight & Dot Pattern -->
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_60%_at_50%_-15%,rgba(22,139,210,0.18),transparent)] pointer-events-none"></div>
                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-10 pointer-events-none"></div>

                <div class="max-w-3xl mx-auto relative z-10 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/25 text-[#168BD2] text-xs font-black tracking-wider uppercase">
                        <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                        SẴN SÀNG BỨT PHÁ DOANH SỐ?
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                        Tăng Tốc Tăng Trưởng Cùng <br />
                        <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                            LushSoftware Ecosystem
                        </span>
                    </h2>

                    <p class="text-base sm:text-lg text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-2xl mx-auto">
                        Đăng ký nhận tư vấn lộ trình tự động hóa chuyên biệt cho ngành hàng của bạn. Đội ngũ chuyên gia LushSoftware sẽ liên hệ trực tiếp trong vòng 15 phút.
                    </p>

                    <!-- Trust indicators inside CTA -->
                    <div class="flex flex-wrap items-center justify-center gap-5 text-xs text-[#172B3A] dark:text-[#E2E8F0] font-semibold pt-1">
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Dùng thử miễn phí 7 ngày</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Triển khai sau 5 phút</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Hỗ trợ kỹ thuật 24/7 Ultraview</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4">
                        <a href="{{ route('contact') }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-4 !px-9 shadow-xl shadow-[#168BD2]/30 font-bold group">
                            <span class="text-amber-300 mr-1.5">✦</span>
                            <span>{{ __('Get Free Consultation') }}</span>
                            <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary w-full sm:w-auto text-base !py-4 !px-8 backdrop-blur-md font-bold group">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse mr-2"></span>
                            <span>Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

