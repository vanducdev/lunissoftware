@extends('layouts.app')

@section('title', __('Pricing') . ' – LushSoftware')
@section('meta_description', 'Bảng giá bản quyền các phần mềm LushSoftware: Tự động hóa tiếp thị, nuôi nick đa kênh, CRM và phân tích dữ liệu. Cam kết minh bạch, hoàn tiền 100% trong 7 ngày.')

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
            <x-breadcrumb :items="[['label' => __('Pricing')]]" />
        </div>

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-16" data-aos="fade-up">
            <!-- High-tech VIP Announcement Pill -->
            <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs mb-4 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                </span>
                <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">BẢNG GIÁ MINH BẠCH 2026</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• Không Chi Phí Ẩn</span>
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-[#172B3A] dark:text-white tracking-tight leading-[1.12]">
                Đầu Tư Thông Minh Cho <br />
                <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                    Tăng Trưởng Bứt Phá
                </span>
            </h1>

            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-4 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto font-normal">
                Lựa chọn gói bản quyền tối ưu cho cá nhân hoặc doanh nghiệp. Mọi gói đều đi kèm hỗ trợ kỹ thuật Ultraview 1-1, tự động cập nhật thuật toán 2026 và cam kết hoàn tiền 100% trong 7 ngày.
            </p>

            <!-- 4 Security & Guarantee Seals with Crisp Bespoke SVG Icons -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-4 mt-7 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0]">
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>Kích hoạt tự động tức thì</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>Cam kết hoàn tiền trong 7 ngày</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <span>Kỹ sư cài đặt 1-1 Ultraview</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Xuất hóa đơn VAT điện tử</span>
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
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">(Hơn 15,000+ cá nhân & doanh nghiệp kích hoạt bản quyền)</span>
            </div>
        </div>

        <!-- Sticky Product Quick Anchor Bar -->
        <div class="sticky top-[69px] z-30 bg-white/90 dark:bg-[#0B1118]/90 backdrop-blur-xl py-3 border-y border-[#E8EDF2] dark:border-[#1E2D3D] -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mb-14 shadow-xs">
            <div class="flex items-center gap-2.5 overflow-x-auto pb-1 scrollbar-none sm:justify-center max-w-7xl mx-auto">
                <span class="text-xs font-bold text-[#718096] uppercase tracking-wider shrink-0 mr-1 hidden md:inline">Chọn phần mềm:</span>
                @foreach($products as $prod)
                    @if($prod->pricings->count() > 0)
                        <a href="#pricing-{{ $prod->slug }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2] hover:shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-[#168BD2]"></span>
                            <span>{{ $prod->name }}</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Masterpiece Product Pricing Showcase -->
        <div class="space-y-18 lg:space-y-24">
            @foreach($products as $prod)
                @if($prod->pricings->count() > 0)
                    <div id="pricing-{{ $prod->slug }}" class="scroll-mt-28" data-aos="fade-up">
                        <!-- Product Header Bar -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 p-6 rounded-2xl bg-[#F8FAFC]/90 dark:bg-[#111A24] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <div class="flex items-center gap-4">
                                <div class="shrink-0">
                                    @if($prod->logo_url)
                                        <img src="{{ $prod->logo_url }}" alt="{{ $prod->name }}" class="w-12 h-12 rounded-2xl object-contain border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
                                    @else
                                        <x-product-icon :slug="$prod->slug" size="md" />
                                    @endif
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h2 class="text-2xl font-black text-[#172B3A] dark:text-white">{{ $prod->name }}</h2>
                                        <span class="text-[10px] font-mono font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full border border-[#168BD2]/20">
                                            {{ $prod->version ?? 'v2.4' }}
                                        </span>
                                    </div>
                                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] mt-1 font-medium">{{ $prod->tagline }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 px-3 py-1 rounded-full border border-emerald-500/20 flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Bản quyền Live 2026
                                </span>
                                <a href="{{ route('products.show', $prod->slug) }}" class="text-xs font-bold text-[#168BD2] hover:text-[#0878BD] flex items-center gap-1 hover:underline">
                                    <span>Xem chi tiết tính năng</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>

                        <!-- 3-Column Pricing Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-7 items-stretch">
                            @foreach($prod->pricings as $pricing)
                                <div class="relative bg-white dark:bg-[#111A24] rounded-3xl p-7 sm:p-8 flex flex-col justify-between transition-all duration-300 {{ $pricing->is_popular ? 'border-2 border-[#168BD2] shadow-2xl shadow-[#168BD2]/20 ring-4 ring-[#168BD2]/10 -translate-y-2' : 'border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm hover:shadow-xl hover:border-[#168BD2]/40' }}">
                                    @if($pricing->is_popular)
                                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                                            <span class="bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white text-[11px] font-black px-4 py-1.5 rounded-full uppercase tracking-wider shadow-md shadow-[#168BD2]/30 flex items-center gap-1.5">
                                                <span class="text-amber-300">★</span>
                                                {{ __('Most Popular') }}
                                            </span>
                                        </div>
                                    @endif

                                    <div>
                                        <!-- Plan Title -->
                                        <h3 class="text-lg font-black text-[#172B3A] dark:text-white mb-2">{{ $pricing->plan_name }}</h3>

                                        <!-- Price Box -->
                                        <div class="flex items-baseline gap-1 my-5 pb-5 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                            <span class="text-3xl sm:text-4xl font-black text-[#168BD2] tracking-tight">{{ number_format($pricing->price, 0, ',', '.') }}</span>
                                            <span class="text-lg font-bold text-[#172B3A] dark:text-white">{{ $pricing->currency }}</span>
                                            <span class="text-xs text-[#718096] dark:text-[#94A3B8]">/ {{ $pricing->billing_cycle === 'monthly' ? __('Monthly') : ($pricing->billing_cycle === 'yearly' ? __('Yearly') : __('Lifetime')) }}</span>
                                        </div>

                                        <!-- Features Checklist with Emerald Green Checkmarks -->
                                        @if(is_array($pricing->features) && count($pricing->features) > 0)
                                            <ul class="space-y-3 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
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

                                    <!-- Action Button -->
                                    <div class="pt-8">
                                        <a href="{{ $pricing->cta_link ?: route('contact', ['product' => $prod->slug, 'plan' => $pricing->plan_name]) }}" class="{{ $pricing->is_popular ? 'lush-btn-primary lush-btn-vip shadow-xl shadow-[#168BD2]/30' : 'lush-btn-secondary' }} w-full !justify-center !text-sm !py-3 font-bold">
                                            {{ $pricing->cta_text ?: 'Đăng Ký Bản Quyền' }}
                                        </a>
                                        <p class="text-[10px] text-center text-[#718096] dark:text-[#94A3B8] mt-2">Kích hoạt & hỗ trợ cài đặt 1-1 ngay</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Universal Guarantees (Bento 4-Card Showcase) -->
        <div class="mt-28 lg:mt-36">
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    CAM KẾT DỊCH VỤ
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Quyền Lợi Tiêu Chuẩn Đi Kèm Mọi Gói
                </h2>
                <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-3 text-base">
                    Khách hàng của LushSoftware luôn được đảm bảo môi trường vận hành ổn định và an tâm nhất.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="lush-card-vip p-6 group" data-aos="fade-up" data-aos-delay="0">
                    <div class="w-12 h-12 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mb-4 group-hover:bg-[#168BD2] group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Auto-Sync Thuật Toán 2026</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Tự động cập nhật phần mềm hoàn toàn miễn phí khi Facebook, TikTok, Zalo đổi thuật toán.
                    </p>
                </div>

                <div class="lush-card-vip p-6 group" data-aos="fade-up" data-aos-delay="80">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Đổi Máy Tính Linh Hoạt</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Dễ dàng gỡ bản quyền trên máy cũ và chuyển đổi sang thiết bị mới thông qua dashboard hoặc hỗ trợ kỹ thuật.
                    </p>
                </div>

                <div class="lush-card-vip p-6 group" data-aos="fade-up" data-aos-delay="160">
                    <div class="w-12 h-12 rounded-2xl bg-purple-500/10 text-purple-600 flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Hỗ Trợ Kỹ Thuật < 15 Phút</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Đội ngũ kỹ sư trực tiếp Ultraview xử lý sự cố và hướng dẫn thiết lập chiến dịch thực chiến.
                    </p>
                </div>

                <div class="lush-card-vip p-6 group" data-aos="fade-up" data-aos-delay="240">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/10 text-amber-600 flex items-center justify-center mb-4 group-hover:bg-amber-500 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">Bảo Mật Dữ Liệu Tuyệt Đối</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed">
                        Dữ liệu lưu trữ mã hóa đa tầng AES-256 nội bộ, cam kết không thu thập thông tin tài khoản khách hàng.
                    </p>
                </div>
            </div>
        </div>

        <!-- Modern FAQs Section -->
        <div class="mt-28 lg:mt-36">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-3">
                    HỎI ĐÁP BẢN QUYỀN
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                    Giải Đáp Thắc Mắc Về Bảng Giá & Kích Hoạt
                </h2>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <details class="group bg-white dark:bg-[#111A24] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5 sm:p-6 cursor-pointer transition-all hover:border-[#168BD2]/40 open:border-[#168BD2]/50 open:shadow-md">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        <span>Sau khi thanh toán bao lâu thì tôi nhận được bản quyền phần mềm?</span>
                        <div class="w-8 h-8 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#168BD2] flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition-transform duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </summary>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4 font-normal">
                        Hệ thống kích hoạt bản quyền hoàn toàn tự động ngay sau khi hoàn tất giao dịch (qua mã quét QR). Bạn sẽ nhận ngay thông tin kích hoạt qua email và tin nhắn xác nhận. Đồng thời kỹ sư LushSoftware sẽ liên hệ hỗ trợ cài đặt Ultraview trực tiếp trong 5 - 15 phút.
                    </p>
                </details>

                <details class="group bg-white dark:bg-[#111A24] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5 sm:p-6 cursor-pointer transition-all hover:border-[#168BD2]/40 open:border-[#168BD2]/50 open:shadow-md">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        Tôi có thể chuyển đổi bản quyền sang máy tính khác không?
                        <div class="w-8 h-8 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#168BD2] flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition-transform duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </summary>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4 font-normal">
                        Có. LushSoftware cung cấp cơ chế chuyển đổi máy tính linh hoạt. Bạn có thể tự gỡ bản quyền trên máy cũ và kích hoạt lại trên máy mới thông qua tài khoản cá nhân hoặc liên hệ hỗ trợ kỹ thuật trong 5 phút.
                    </p>
                </details>

                <details class="group bg-white dark:bg-[#111A24] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5 sm:p-6 cursor-pointer transition-all hover:border-[#168BD2]/40 open:border-[#168BD2]/50 open:shadow-md">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        Chính sách hoàn tiền của LushSoftware hoạt động như thế nào?
                        <div class="w-8 h-8 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#168BD2] flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition-transform duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </summary>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4 font-normal">
                        Chúng tôi cam kết hoàn tiền 100% trong vòng 7 ngày nếu phần mềm phát sinh lỗi kỹ thuật do hệ thống của LushSoftware và đội ngũ hỗ trợ không khắc phục được cho bạn.
                    </p>
                </details>

                <details class="group bg-white dark:bg-[#111A24] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-5 sm:p-6 cursor-pointer transition-all hover:border-[#168BD2]/40 open:border-[#168BD2]/50 open:shadow-md">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        Hình thức thanh toán nào được chấp nhận?
                        <div class="w-8 h-8 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#168BD2] flex items-center justify-center shrink-0 ml-4 group-open:rotate-180 transition-transform duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </summary>
                    <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4 font-normal">
                        LushSoftware hỗ trợ chuyển khoản ngân hàng qua mã VietQR tự động kích hoạt, thẻ Visa/MasterCard, ví điện tử và thanh toán USDT cho khách hàng quốc tế. Xuất hóa đơn VAT điện tử đầy đủ theo yêu cầu doanh nghiệp.
                    </p>
                </details>
            </div>
        </div>

        <!-- Custom Enterprise Banner (Grand Finale) -->
        <div class="mt-28 lg:mt-36 relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-14 lg:p-18 text-center overflow-hidden" data-aos="zoom-in">
            <!-- Radiant Ambient Spotlight -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    GIẢI PHÁP DOANH NGHIỆP TÙY BIẾN
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Cần Kiến Trúc Riêng Cho <br />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Doanh Nghiệp Của Bạn
                    </span>?
                </h2>

                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-xl mx-auto font-normal">
                    Chúng tôi cung cấp gói Private Cloud, máy chủ riêng, tùy biến tính năng theo quy trình kinh doanh và ký cam kết bảo mật NDA độc quyền.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact', ['plan' => 'Custom Enterprise']) }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Yêu Cầu Báo Giá Doanh Nghiệp</span>
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