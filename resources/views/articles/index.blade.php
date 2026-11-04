@extends('layouts.app')

@section('title', __('News') . ' – LushSoftware')
@section('meta_description', 'Khám phá các bài viết, cẩm nang công nghệ và kinh nghiệm thực chiến từ LushSoftware: Tự động hóa tiếp thị, nuôi nick đa kênh, tối ưu phễu CRM và cập nhật thuật toán 2026.')
@section('canonical_url', route('articles.index'))

@section('content')
<div class="relative pt-2.5 pb-14 sm:pt-3.5 lg:pt-4 lg:pb-16 bg-white dark:bg-[#0B1118] overflow-hidden">
    <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>
    <div class="absolute top-1/4 -right-32 w-80 h-80 bg-[#168BD2]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 -left-32 w-80 h-80 bg-[#48B4E5]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <div class="mb-2 sm:mb-2.5">
            <x-breadcrumb :items="[['label' => __('News')]]" />
        </div>

        <!-- Header & Title Banner -->
        <div class="text-center max-w-4xl mx-auto mb-6 lg:mb-8" data-aos="fade-up">
            <!-- High-tech VIP Announcement Pill -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/90 dark:bg-[#111A24]/90 border border-[#168BD2]/35 shadow-xs mb-2.5 backdrop-blur-md">
                <span class="flex h-2 w-2 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-[#168BD2] opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-[#168BD2]"></span>
                </span>
                <span class="text-xs font-black text-[#168BD2] tracking-wider uppercase">TRUNG TÂM KIẾN THỨC CÔNG NGHỆ 2026</span>
                <span class="text-xs text-[#718096] dark:text-[#94A3B8] hidden sm:inline">• Tech Insights & Playbooks</span>
            </div>

            <h1 class="text-2xl sm:text-4xl lg:text-[2.65rem] font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                Kiến Thức Công Nghệ & 
                <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent drop-shadow-xs">
                    Chiến Lược Tăng Trưởng
                </span>
            </h1>

            <p class="text-[#5A6E85] dark:text-[#94A3B8] mt-2.5 text-sm sm:text-base leading-relaxed max-w-2xl mx-auto font-normal">
                Cập nhật liên tục những xu hướng tự động hóa tiếp thị, bí quyết quản trị dàn tài khoản đa kênh, tối ưu phễu chuyển đổi và kinh nghiệm thực chiến từ chuyên gia LushSoftware.
            </p>

            <!-- 4 Topic Pills with Crisp Bespoke SVG Icons -->
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mt-4 text-xs font-semibold text-[#172B3A] dark:text-[#E2E8F0]">
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-[#168BD2] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span>Tự Động Hóa Tiếp Thị</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span>Bí Quyết Kháng Checkpoint</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-purple-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    <span>Tối Ưu Chuyển Đổi CRM</span>
                </div>
                <div class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/80 dark:bg-[#131D27]/80 border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-sm">
                    <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    <span>Cẩm Nang Hướng Dẫn Kỹ Thuật</span>
                </div>
            </div>
        </div>

        <!-- Sticky Filter & Search Control Bar -->
        <div class="sticky top-[69px] z-30 bg-white/90 dark:bg-[#0B1118]/90 backdrop-blur-xl py-3 border-y border-[#E8EDF2] dark:border-[#1E2D3D] -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 mb-12 shadow-xs transition-all">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
                <!-- Categories Pills -->
                <div class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none w-full md:w-auto">
                    <a href="{{ route('articles.index', array_filter(['search' => request('search')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ !request('category') ? 'bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                        <span>Tất Cả Bài Viết</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ !request('category') ? 'bg-white/25 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096] dark:text-[#94A3B8]' }}">
                            {{ $categories->sum('articles_count') }}
                        </span>
                    </a>

                    @foreach($categories as $cat)
                        <a href="{{ route('articles.index', array_filter(['category' => $cat->slug, 'search' => request('search')])) }}" class="shrink-0 px-4 py-2 rounded-full text-xs font-bold transition-all flex items-center gap-2 {{ request('category') === $cat->slug ? 'bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white shadow-md shadow-[#168BD2]/30 scale-105' : 'bg-white dark:bg-[#131D27] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] hover:text-[#168BD2]' }}">
                            <span>{{ $cat->name }}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ request('category') === $cat->slug ? 'bg-white/25 text-white' : 'bg-[#E8EDF2] dark:bg-[#1E2D3D] text-[#718096] dark:text-[#94A3B8]' }}">
                                {{ $cat->articles_count }}
                            </span>
                        </a>
                    @endforeach
                </div>

                <!-- Search Input with Keyboard shortcut -->
                <form method="GET" action="{{ route('articles.index') }}" class="w-full md:w-80 relative shrink-0">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <svg class="w-4 h-4 text-[#718096] absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm bài viết, cẩm nang..." class="w-full pl-10 pr-20 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#111A24] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2] focus:bg-white dark:focus:bg-[#131D27] focus:ring-2 focus:ring-[#168BD2]/15 transition-all">

                    <div class="absolute right-2.5 top-1/2 -translate-y-1/2 flex items-center gap-1">
                        @if(request('search'))
                            <a href="{{ route('articles.index', array_filter(['category' => request('category')])) }}" class="text-[#718096] hover:text-[#172B3A] p-1 text-xs">✕</a>
                        @endif
                        <kbd class="hidden sm:inline-block px-1.5 py-0.5 text-[9px] font-mono bg-white dark:bg-[#1A2634] border border-[#E8EDF2] dark:border-[#2D3F52] rounded text-[#718096]">Ctrl + K</kbd>
                    </div>
                </form>
            </div>
        </div>

        <!-- Masterpiece Articles Grid (Luxury Bento News Cards) -->
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $idx => $article)
                    <article class="lush-card-vip flex flex-col justify-between group overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                        <div>
                            <!-- Visual Cover Stage -->
                            <div class="relative w-full h-52 bg-gradient-to-tr from-[#F8FAFC] via-[#F0F6FB] to-[#EAF5FC] dark:from-[#0D151F] dark:via-[#111A24] dark:to-[#162230] flex items-center justify-center overflow-hidden border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <!-- Micro-dot grid background -->
                                <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:16px_16px] opacity-15"></div>

                                @if($article->thumbnail)
                                    <a href="{{ route('articles.show', $article->slug) }}" class="w-full h-full block">
                                        <img src="{{ str_starts_with($article->thumbnail, 'http') ? $article->thumbnail : asset('storage/'.$article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transform group-hover:scale-106 transition-transform duration-500">
                                    </a>
                                @else
                                    <!-- High-tech Abstract Cover -->
                                    <a href="{{ route('articles.show', $article->slug) }}" class="relative z-10 w-full h-full flex flex-col items-center justify-center p-6 text-center group-hover:scale-105 transition-transform duration-500">
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#168BD2] to-[#0878BD] text-white flex items-center justify-center shadow-lg shadow-[#168BD2]/30 mb-2">
                                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                        </div>
                                        <span class="text-[11px] font-bold text-[#168BD2] uppercase tracking-wider">{{ $article->category->name ?? 'Công nghệ' }}</span>
                                    </a>
                                @endif

                                <!-- Category Badge Top-Left -->
                                <div class="absolute top-3.5 left-3.5 z-20">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-white/95 dark:bg-[#111A24]/95 text-[#168BD2] border border-[#168BD2]/20 shadow-2xs backdrop-blur-md">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2]"></span>
                                        {{ $article->category->name ?? 'Công nghệ' }}
                                    </span>
                                </div>

                                <!-- Reading Time Badge Top-Right -->
                                <div class="absolute top-3.5 right-3.5 z-20">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-mono font-medium bg-white/90 dark:bg-[#111A24]/90 text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-2xs backdrop-blur-md">
                                        <svg class="w-3 h-3 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        5 phút đọc
                                    </span>
                                </div>
                            </div>

                            <!-- Card Body Content -->
                            <div class="p-6">
                                <!-- Meta line -->
                                <div class="flex items-center gap-2 text-xs text-[#718096] dark:text-[#94A3B8] mb-3">
                                    <span>{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        {{ number_format($article->view_count) }} lượt xem
                                    </span>
                                </div>

                                <h2 class="text-base sm:text-lg font-bold text-[#172B3A] dark:text-white mb-3 group-hover:text-[#168BD2] transition-colors leading-snug line-clamp-2">
                                    <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                                </h2>

                                <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] line-clamp-3 leading-relaxed font-normal">
                                    {{ $article->excerpt }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="px-6 pb-6 pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between">
                            <div class="flex items-center gap-2.5">
                                <img src="{{ $article->author ? $article->author->avatar_url : asset('images/avatars/avatar-1.jpg') }}" alt="Author" class="w-7 h-7 rounded-full object-cover ring-2 ring-[#168BD2]/20">
                                <div>
                                    <p class="text-xs font-bold text-[#172B3A] dark:text-white leading-tight">{{ $article->author->name ?? 'Lush Editorial' }}</p>
                                    <span class="text-[10px] text-[#718096]">Chuyên viên giải pháp</span>
                                </div>
                            </div>

                            <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-[#168BD2] hover:text-[#0878BD] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                <span>Đọc bài viết</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-14">
                {{ $articles->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white dark:bg-[#131D27] rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] p-8 max-w-xl mx-auto shadow-sm" data-aos="zoom-in">
                <div class="w-16 h-16 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-1">Không tìm thấy bài viết phù hợp</h3>
                <p class="text-xs text-[#718096] dark:text-[#94A3B8] mb-6">Vui lòng thử tìm với từ khóa khác hoặc chuyển danh mục bài viết.</p>
                <a href="{{ route('articles.index') }}" class="lush-btn-primary !text-xs !py-2.5 !px-6 shadow-md shadow-[#168BD2]/20">
                    <span>Xem tất cả bài viết</span>
                </a>
            </div>
        @endif

        <!-- Grand Consultation & Knowledge Newsletter Banner -->
        <div class="mt-24 lg:mt-32 relative rounded-3xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#111A24] dark:via-[#142230] dark:to-[#172A3C] border border-[#168BD2]/30 shadow-2xl shadow-[#168BD2]/10 p-8 sm:p-14 lg:p-18 text-center overflow-hidden" data-aos="zoom-in">
            <!-- Radiant Ambient Spotlight -->
            <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-[#168BD2]/15 rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 max-w-3xl mx-auto space-y-5">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#168BD2]/10 border border-[#168BD2]/20 text-[#168BD2] text-xs font-black tracking-wide uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#168BD2] animate-ping"></span>
                    KẾT NỐI CHUYÊN GIA TỰ ĐỘNG HÓA
                </span>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    Cần Tư Vấn Chiến Lược Tăng Trưởng <br />
                    <span class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] bg-clip-text text-transparent">
                        Dành Riêng Cho Mô Hình Của Bạn
                    </span>?
                </h2>

                <p class="text-base text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-xl mx-auto font-normal">
                    Đội ngũ chuyên gia của LushSoftware sẵn sàng trao đổi 1-1, phân tích hiện trạng và tư vấn bộ giải pháp phù hợp nhất.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ route('contact') }}" class="lush-btn-primary lush-btn-vip w-full sm:w-auto text-base !py-3.5 !px-8 shadow-xl shadow-[#168BD2]/30 hover:shadow-2xl hover:shadow-[#168BD2]/45 hover:-translate-y-0.5 transition-all font-bold">
                        <svg class="w-4 h-4 text-amber-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Đặt Lịch Tư Vấn 1-1 Miễn Phí</span>
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
