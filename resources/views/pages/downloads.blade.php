@extends('layouts.app')

@section('title', 'Trung Tâm Tải Phần Mềm & Cài Đặt – LushSoftware')
@section('meta_description', 'Tải bản cài đặt mới nhất của các phần mềm Lush Marketing Pro, Lush Social Hub, Lush CRM Enterprise tương thích Windows 10/11, macOS và Web Cloud.')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('Download')]]" />

        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="badge-lush mb-3">DOWNLOAD CENTER</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Trung Tâm Tải Về & Cập Nhật Phần Mềm
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                Tải xuống các bộ cài đặt chính thức, được quét sạch mã độc 100% và luôn cập nhật phiên bản mới nhất từ LushSoftware.
            </p>
        </div>

        <!-- Download Cards Grid -->
        <div class="space-y-8">
            @foreach($products as $p)
                <div class="lush-card p-6 sm:p-8" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        <!-- Left: Info -->
                        <div class="lg:col-span-7 space-y-3">
                            <div class="flex items-center gap-3.5">
                                @if($p->banner_url)
                                    <div class="w-16 h-12 rounded-xl overflow-hidden bg-white dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] shrink-0 p-1 shadow-2xs">
                                        <img src="{{ $p->banner_url }}" alt="{{ $p->name }}" class="w-full h-full object-contain">
                                    </div>
                                @elseif($p->logo_url)
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-white dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] shrink-0 p-1 shadow-2xs">
                                        <img src="{{ $p->logo_url }}" alt="{{ $p->name }}" class="w-full h-full object-contain">
                                    </div>
                                @else
                                    <x-product-icon :slug="$p->slug" />
                                @endif
                                <div>
                                    <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">
                                        <a href="{{ route('products.show', $p->slug) }}" class="hover:text-[#168BD2]">{{ $p->name }}</a>
                                    </h2>
                                    <div class="flex items-center gap-2 mt-0.5">
                                        <span class="text-xs font-mono font-semibold text-[#168BD2]">{{ $p->version }}</span>
                                        <span class="text-[#718096] text-xs">•</span>
                                        <span class="text-xs text-[#718096]">{{ $p->category->name ?? 'SaaS' }}</span>
                                        <span class="text-[#718096] text-xs">•</span>
                                        <span class="text-xs text-[#718096]">Phát hành: {{ $p->updated_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed pt-2">
                                {{ $p->description }}
                            </p>

                            <div class="flex flex-wrap items-center gap-4 text-xs text-[#718096] dark:text-[#94A3B8] pt-2">
                                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Windows 10/11 (64-bit)</span>
                                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> macOS 12+ (Apple / Intel)</span>
                                <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-500"></span> Bản Web Cloud</span>
                            </div>
                        </div>

                        <!-- Right: Action Buttons -->
                        <div class="lg:col-span-5 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                            @if($p->download_url)
                                <a href="{{ $p->download_url }}" target="_blank" class="lush-btn-primary !py-3 !text-sm !justify-center shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                    <span>Tải Bản Cài Đặt (Windows/Mac)</span>
                                </a>
                            @else
                                <a href="{{ route('contact', ['product' => $p->slug]) }}" class="lush-btn-primary !py-3 !text-sm !justify-center shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                    <span>Đăng Ký Nhận Bản Cài Đặt Thử</span>
                                </a>
                            @endif

                            <div class="flex items-center gap-2">
                                <a href="{{ route('products.show', $p->slug) }}" class="lush-btn-secondary flex-1 !py-2.5 !text-xs !justify-center">
                                    Tính năng & Hướng dẫn &rarr;
                                </a>
                                <a href="{{ route('contact', ['product' => $p->slug]) }}" class="lush-btn-secondary !py-2.5 !text-xs !justify-center" title="Hỗ trợ kỹ thuật">
                                    Hỗ trợ cài đặt
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Installation FAQ / Instructions -->
        <div class="mt-20 lush-card p-8 sm:p-10" data-aos="fade-up">
            <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-6">Hướng Dẫn Cài Đặt Nhanh</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
                <div class="space-y-2">
                    <span class="w-7 h-7 rounded-full bg-[#168BD2] text-white font-bold flex items-center justify-center text-xs">1</span>
                    <h4 class="font-bold text-[#172B3A] dark:text-white">Tải tệp cài đặt</h4>
                    <p class="text-xs text-[#718096] leading-relaxed">Chọn phiên bản phù hợp với hệ điều hành của bạn và bấm Tải về từ nút tương ứng bên trên.</p>
                </div>
                <div class="space-y-2">
                    <span class="w-7 h-7 rounded-full bg-[#168BD2] text-white font-bold flex items-center justify-center text-xs">2</span>
                    <h4 class="font-bold text-[#172B3A] dark:text-white">Chạy bộ cài</h4>
                    <p class="text-xs text-[#718096] leading-relaxed">Mở file vừa tải về (.exe trên Windows hoặc .dmg trên Mac) và làm theo hướng dẫn trên màn hình.</p>
                </div>
                <div class="space-y-2">
                    <span class="w-7 h-7 rounded-full bg-[#168BD2] text-white font-bold flex items-center justify-center text-xs">3</span>
                    <h4 class="font-bold text-[#172B3A] dark:text-white">Kích hoạt tài khoản</h4>
                    <p class="text-xs text-[#718096] leading-relaxed">Đăng nhập tài khoản LushSoftware đã đăng ký để bắt đầu sử dụng bản quyền hoặc trải nghiệm dùng thử.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

