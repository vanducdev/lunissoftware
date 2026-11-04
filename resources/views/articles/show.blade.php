@extends('layouts.app')

@section('title', ($article->seo_title ?: $article->title) . ' – LushSoftware')
@section('meta_description', $article->seo_description ?: Str::limit(strip_tags($article->excerpt), 160))
@section('meta_keywords', $article->seo_keywords)

@section('og_type', 'article')
@section('og_title', $article->seo_title ?: $article->title)
@section('og_description', $article->seo_description ?: Str::limit(strip_tags($article->excerpt), 160))
@section('og_image', $article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('images/banner.png'))
@section('canonical_url', $article->canonical_url ?: route('articles.show', $article->slug))
@section('robots', $article->robots_meta ?: 'index, follow')

@section('extra_og')
    <meta property="article:published_time" content="{{ ($article->published_at ?? $article->created_at)->toIso8601String() }}">
    <meta property="article:modified_time" content="{{ $article->updated_at->toIso8601String() }}">
    <meta property="article:author" content="{{ $article->author->name ?? 'LushSoftware' }}">
    <meta property="article:section" content="{{ $article->category->name ?? 'Công nghệ' }}">
@endsection

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BlogPosting",
  "mainEntityOfPage": {
    "@@type": "WebPage",
    "@@id": "{{ route('articles.show', $article->slug) }}"
  },
  "headline": "{{ addslashes($article->seo_title ?: $article->title) }}",
  "description": "{{ addslashes($article->seo_description ?: Str::limit(strip_tags($article->excerpt), 160)) }}",
  "image": [
    "{{ $article->thumbnail ? asset('storage/' . $article->thumbnail) : asset('images/banner.png') }}"
  ],
  "datePublished": "{{ ($article->published_at ?? $article->created_at)->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  "author": {
    "@@type": "Person",
    "name": "{{ addslashes($article->author->name ?? 'Ban Biên Tập LushSoftware') }}"
  },
  "publisher": {
    "@@type": "Organization",
    "name": "LushSoftware",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  }
}
</script>
@endpush

@section('content')
<article class="relative pt-2.5 pb-14 sm:pt-3.5 lg:pt-4 lg:pb-16 bg-white dark:bg-[#0B1118] overflow-hidden">
    <!-- VIP Ambient Radiant Background Glow & Micro-Dot Grid -->
    <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[850px] h-[400px] bg-gradient-to-b from-[#168BD2]/15 via-[#48B4E5]/8 to-transparent blur-3xl rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(#168BD2_1px,transparent_1px)] [background-size:24px_24px] opacity-[0.06] dark:opacity-[0.12] pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumbs -->
        <div class="mb-6">
            <x-breadcrumb :items="[['label' => __('News'), 'url' => route('articles.index')], ['label' => $article->title]]" />
        </div>

        <!-- Article Hero Header -->
        <header class="mb-12 text-center" data-aos="fade-up">
            <!-- Badges Bar -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 mb-5 text-xs font-semibold">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20 font-black uppercase tracking-wider text-[11px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#168BD2]"></span>
                    {{ $article->category->name ?? 'Công nghệ' }}
                </span>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                    <svg class="w-3.5 h-3.5 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}
                </span>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                    <svg class="w-3.5 h-3.5 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    5 phút đọc
                </span>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    {{ number_format($article->view_count) }} lượt xem
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#172B3A] dark:text-white tracking-tight leading-[1.2] mb-6">
                {{ $article->title }}
            </h1>

            <!-- Author & Sharing Bar -->
            <div class="flex flex-wrap items-center justify-center gap-6 pt-2 border-t border-[#E8EDF2] dark:border-[#1E2D3D] max-w-xl mx-auto">
                <div class="flex items-center gap-3">
                    <img src="{{ $article->author ? $article->author->avatar_url : asset('images/avatars/avatar-1.jpg') }}" alt="{{ $article->author->name ?? 'Author' }}" class="w-10 h-10 rounded-full object-cover ring-2 ring-[#168BD2]/30">
                    <div class="text-left">
                        <div class="flex items-center gap-1.5">
                            <p class="text-xs font-bold text-[#172B3A] dark:text-white">{{ $article->author->name ?? 'Ban Biên Tập LushSoftware' }}</p>
                            <span class="text-[9.5px] font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 px-1.5 py-0.2 rounded">✓ Verified</span>
                        </div>
                        <p class="text-[10px] text-[#718096] dark:text-[#94A3B8]">Kỹ sư giải pháp tự động hóa</p>
                    </div>
                </div>

                <!-- Sharing Quick Links -->
                <div class="flex items-center gap-2">
                    <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Đã sao chép liên kết bài viết!');" class="p-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="Sao chép liên kết">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    </button>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="p-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-[#F8FAFC] dark:bg-[#1A2634] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2] transition-colors" title="Chia sẻ Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                </div>
            </div>
        </header>

        <!-- Executive Summary / Excerpt Callout -->
        @if($article->excerpt)
            <div class="relative lush-card-vip p-6 sm:p-7 mb-10 overflow-hidden" data-aos="fade-up">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <span class="text-[10px] font-black uppercase tracking-wider text-[#168BD2] block mb-1">TÓM TẮT TRỌNG TÂM:</span>
                        <p class="text-sm sm:text-base text-[#172B3A] dark:text-[#E2E8F0] font-medium leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Main Article Content Frame -->
        <div class="bg-white dark:bg-[#111A24] p-8 sm:p-12 lg:p-14 rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs mb-14" data-aos="fade-up">
            <div class="prose prose-slate dark:prose-invert max-w-none text-base sm:text-lg leading-relaxed prose-headings:font-black prose-headings:text-[#172B3A] dark:prose-headings:text-white prose-p:text-[#5A6E85] dark:prose-p:text-[#94A3B8] prose-p:leading-relaxed prose-a:text-[#168BD2] prose-strong:text-[#172B3A] dark:prose-strong:text-white prose-img:rounded-2xl prose-img:shadow-lg">
                <x-table-of-contents />

                {!! $article->content !!}
            </div>

            <!-- In-Article Product Recommendation Box -->
            <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-[#F8FAFC] via-[#F0F7FC] to-[#E9F5FD] dark:from-[#0E1722] dark:to-[#172A3C] border border-[#168BD2]/25">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="space-y-1 text-center sm:text-left">
                        <span class="text-[10px] font-black uppercase tracking-wider text-[#168BD2]">ỨNG DỤNG THỰC CHIẾN</span>
                        <h4 class="text-lg font-black text-[#172B3A] dark:text-white">Triển khai giải pháp tự động hóa này ngay hôm nay</h4>
                        <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8]">Dùng thử miễn phí 7 ngày hệ sinh thái phần mềm LushSoftware với sự hỗ trợ 1-1 từ kỹ sư.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="lush-btn-primary lush-btn-vip !py-3 !px-6 !text-xs font-bold shrink-0 shadow-lg shadow-[#168BD2]/25">
                        <span>Khám phá phần mềm</span>
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Author Bio Box -->
        <div class="p-6 sm:p-8 rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#111A24] flex flex-col sm:flex-row items-center justify-between gap-6 mb-6 lg:mb-8 shadow-xs" data-aos="fade-up">
            <div class="flex items-center gap-4">
                <img src="{{ $article->author ? $article->author->avatar_url : asset('images/avatars/avatar-1.jpg') }}" alt="Author" class="w-14 h-14 rounded-2xl object-cover ring-2 ring-[#168BD2]/30 shrink-0">
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="text-base font-black text-[#172B3A] dark:text-white">{{ $article->author->name ?? 'Ban Biên Tập LushSoftware' }}</h4>
                        <span class="text-[9.5px] font-bold text-emerald-600 bg-emerald-500/10 px-1.5 py-0.2 rounded">✓ Chuyên gia</span>
                    </div>
                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] mt-1 leading-relaxed">
                        Chuyên sâu về công nghệ tự động hóa tiếp thị, giải pháp chống checkpoint dàn tài khoản và chuyển đổi số cho doanh nghiệp.
                    </p>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="lush-btn-secondary !text-xs !py-2.5 !px-5 font-bold shrink-0">
                <span>Liên hệ tư vấn 1-1</span>
            </a>
        </div>

        <!-- Related Articles Grid -->
        @if($relatedArticles->count() > 0)
            <div class="border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-14 mb-6 lg:mb-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <span class="text-xs font-black uppercase tracking-wider text-[#168BD2] block mb-1">CÙNG CHUYÊN MỤC</span>
                        <h3 class="text-2xl font-black text-[#172B3A] dark:text-white tracking-tight">Bài Viết Liên Quan</h3>
                    </div>
                    <a href="{{ route('articles.index') }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                        <span>Xem tất cả bài viết</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedArticles as $rel)
                        <div class="lush-card-vip p-5 flex flex-col justify-between group">
                            <div>
                                <span class="text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full inline-block mb-2">
                                    {{ $rel->category->name ?? 'Tin tức' }}
                                </span>
                                <h4 class="text-sm font-bold text-[#172B3A] dark:text-white mb-2 leading-snug line-clamp-2 group-hover:text-[#168BD2] transition-colors">
                                    <a href="{{ route('articles.show', $rel->slug) }}">{{ $rel->title }}</a>
                                </h4>
                                <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] line-clamp-2 leading-relaxed">
                                    {{ $rel->excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 mt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <a href="{{ route('articles.show', $rel->slug) }}" class="text-xs font-bold text-[#168BD2] flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                    <span>Đọc tiếp</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection
