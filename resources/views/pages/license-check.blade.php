@extends('layouts.app')

@section('title', 'Tra Cứu Bản Quyền Phần Mềm & Trạng Thái Key – LushSoftware')
@section('meta_description', 'Công cụ tra cứu trực tuyến trạng thái bản quyền phần mềm LushSoftware, thời hạn sử dụng, số máy cho phép và liên kết tải bộ cài đặt mới nhất 2026.')

@section('content')
<div class="relative pt-2.5 pb-16 sm:pt-3.5 lg:pt-4 lg:pb-20 bg-white dark:bg-[#0B1118] overflow-hidden min-h-[75vh]">
    <!-- Ambient Glow Background -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-[#168BD2]/12 blur-3xl rounded-full pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb -->
        <div class="mb-2 sm:mb-2.5">
            <x-breadcrumb :items="[['label' => 'Tra cứu bản quyền']]" />
        </div>

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-6 sm:mb-8" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black uppercase tracking-wider mb-2.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                HỆ THỐNG TRA CỨU BẢN QUYỀN TRỰC TUYẾN 2026
            </div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#172B3A] dark:text-white tracking-tight">
                Kiểm Tra Giấy Phép & Hạn Dùng Phần Mềm
            </h1>
            <p class="text-sm text-[#5A6E85] dark:text-[#94A3B8] mt-2">
                Nhập <strong>Mã bản quyền (License Key)</strong>, <strong>Số điện thoại nhận key</strong> hoặc <strong>Mã đơn hàng</strong> để kiểm tra tình trạng kích hoạt bản quyền của bạn.
            </p>
        </div>

        <!-- Search Form Card -->
        <div class="lush-card p-6 sm:p-8 mb-8 border border-[#168BD2]/30 shadow-xl" data-aos="fade-up">
            <form method="GET" action="{{ route('license.check') }}" class="flex flex-col sm:flex-row gap-3">
                <div class="relative flex-1">
                    <input type="text" name="q" value="{{ $query }}" required placeholder="Ví dụ: LUSH-88921 hoặc 0988123456 hoặc LUSH-ABCD-1234..." class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#0E1722] text-sm font-semibold text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2] focus:ring-2 focus:ring-[#168BD2]/20 font-mono">
                    <svg class="w-5 h-5 text-[#718096] absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <button type="submit" class="lush-btn-primary lush-btn-vip !py-3.5 !px-8 text-sm font-bold shadow-lg shadow-[#168BD2]/30 flex items-center justify-center gap-2 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Tra Cứu Ngay</span>
                </button>
            </form>
        </div>

        <!-- Result View -->
        @if($searched)
            @if($result)
                <div class="lush-card p-6 sm:p-8 border-2 border-emerald-500/30 shadow-2xl relative overflow-hidden" data-aos="zoom-in">
                    <div class="absolute top-0 inset-x-0 h-1.5 bg-gradient-to-r from-emerald-500 via-[#168BD2] to-cyan-400"></div>

                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <div class="flex items-center gap-3.5">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-xl shrink-0">
                                ✓
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-xl font-black text-[#172B3A] dark:text-white">{{ $result->product_name }}</h3>
                                    <span class="badge-lush text-[11px]">{{ $result->plan_name }}</span>
                                </div>
                                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mt-0.5">Khách hàng sở hữu: <strong>{{ $result->customer_name }}</strong></p>
                            </div>
                        </div>

                        <div class="text-left sm:text-right">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black {{ $result->isActive() ? 'bg-emerald-500/15 text-emerald-600 dark:text-emerald-400' : 'bg-rose-500/15 text-rose-600' }}">
                                <span class="w-2 h-2 rounded-full {{ $result->isActive() ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                {{ $result->isActive() ? 'Giấy Phép Hợp Lệ (Active)' : 'Giấy Phép Hết Hạn' }}
                            </span>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-6 text-xs border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <div class="p-3.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0E1722] space-y-1">
                            <span class="text-[10px] uppercase font-bold text-[#718096] block">Mã Bản Quyền (License Key)</span>
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-sm font-black text-[#168BD2]">{{ $result->license_key }}</span>
                                <button type="button" onclick="navigator.clipboard.writeText('{{ $result->license_key }}'); alert('Đã sao chép License Key!')" class="text-[#168BD2] hover:underline font-bold text-[11px]">
                                    Copy Key
                                </button>
                            </div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0E1722] space-y-1">
                            <span class="text-[10px] uppercase font-bold text-[#718096] block">Thời Hạn Giấy Phép</span>
                            <div class="text-sm font-bold text-[#172B3A] dark:text-white">
                                @if(is_null($result->license_expires_at) || strtolower($result->billing_cycle) === 'lifetime')
                                    <span class="text-emerald-600 font-black">Bản Quyền Vĩnh Viễn (Lifetime)</span>
                                @else
                                    Đến ngày: <span class="text-emerald-600 font-mono">{{ $result->license_expires_at->format('d/m/Y') }}</span>
                                    <span class="text-[11px] text-[#718096]">({{ $result->license_expires_at->diffForHumans() }})</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-3.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0E1722] space-y-1">
                            <span class="text-[10px] uppercase font-bold text-[#718096] block">Số Máy Tính Cho Phép</span>
                            <span class="font-bold text-[#172B3A] dark:text-white">{{ $result->device_count_allowed }} Thiết bị độc lập</span>
                        </div>

                        <div class="p-3.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0E1722] space-y-1">
                            <span class="text-[10px] uppercase font-bold text-[#718096] block">Ngày Kích Hoạt</span>
                            <span class="font-mono text-[#172B3A] dark:text-white">{{ $result->activated_at ? $result->activated_at->format('d/m/Y H:i') : 'Đang kích hoạt' }}</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-6 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2 text-xs text-[#718096]">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span>Bản quyền chính hãng do <strong>LushSoftware Vietnam</strong> chứng nhận.</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('downloads.index') }}" class="lush-btn-primary !text-xs !py-2.5 !px-5 font-bold">
                                Tải Bộ Cài Đặt &rarr;
                            </a>
                            <a href="https://zalo.me/0988123456" target="_blank" class="lush-btn-secondary !text-xs !py-2.5 !px-4">
                                Hỗ Trợ Kỹ Thuật 1-1
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="lush-card p-10 text-center space-y-3" data-aos="fade-up">
                    <div class="w-14 h-14 rounded-full bg-amber-500/10 text-amber-500 mx-auto flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-[#172B3A] dark:text-white">Không Tìm Thấy Thông Tin Bản Quyền Phù Hợp</h3>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] max-w-md mx-auto">
                        Chúng tôi không tìm thấy bản quyền nào khớp với từ khóa "<strong>{{ $query }}</strong>". Vui lòng kiểm tra lại chính xác License Key, số điện thoại hoặc mã đơn hàng.
                    </p>
                    <div class="pt-3">
                        <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary !text-xs !py-2.5 !px-5">
                            Gọi Hotline Kỹ Thuật: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}
                        </a>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
