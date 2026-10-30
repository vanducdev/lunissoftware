@extends('layouts.app')

@section('title', ($article->seo_title ?: $article->title) . ' – LushSoftware')
@section('meta_description', $article->seo_description ?: Str::limit(strip_tags($article->excerpt), 160))
@section('meta_keywords', $article->seo_keywords)

@section('content')
<article class="py-16 bg-white dark:bg-[#0B1118]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Post Header -->
        <div class="mb-10 text-center">
            <div class="flex items-center justify-center gap-2 text-xs font-semibold text-[#718096] mb-4">
                <span class="text-[#168BD2]">{{ $article->category->name ?? 'Công nghệ' }}</span>
                <span>•</span>
                <span>{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                <span>•</span>
                <span>{{ $article->view_count }} lượt xem</span>
            </div>

            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight leading-tight mb-6">
                {{ $article->title }}
            </h1>

            <div class="flex items-center justify-center gap-3">
                <img src="{{ $article->author ? $article->author->avatar_url : 'https://ui-avatars.com/api/?name=Lush' }}" alt="{{ $article->author->name ?? 'Author' }}" class="w-10 h-10 rounded-full object-cover">
                <div class="text-left">
                    <p class="text-xs font-bold text-[#172B3A] dark:text-white">{{ $article->author->name ?? 'Ban Biên Tập LushSoftware' }}</p>
                    <p class="text-[10px] text-[#718096]">Chuyên viên giải pháp phần mềm</p>
                </div>
            </div>
        </div>

        @if($article->excerpt)
            <div class="p-6 rounded-2xl bg-[#F8FAFC] dark:bg-[#131D27] border-l-4 border-l-[#168BD2] border border-[#E8EDF2] dark:border-[#1E2D3D] text-sm text-[#172B3A] dark:text-[#E2E8F0] font-medium leading-relaxed mb-10">
                {{ $article->excerpt }}
            </div>
        @endif

        <!-- Post Content -->
        <div class="prose prose-slate dark:prose-invert max-w-none text-base leading-relaxed prose-headings:font-bold prose-headings:text-[#172B3A] dark:prose-headings:text-white prose-p:text-[#718096] dark:prose-p:text-[#94A3B8] prose-li:text-[#718096] dark:prose-li:text-[#94A3B8] mb-16">
            {!! $article->content !!}
        </div>

        <!-- Author Box & Share -->
        <div class="p-6 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#131D27] flex flex-col sm:flex-row items-center justify-between gap-4 mb-16">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xl">
                    L
                </div>
                <div>
                    <h4 class="text-sm font-bold text-[#172B3A] dark:text-white">LushSoftware Insights</h4>
                    <p class="text-xs text-[#718096]">Chia sẻ kiến thức công nghệ và giải pháp tăng trưởng chuyển đổi số.</p>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="lush-btn-primary !text-xs !py-2">
                Liên hệ hợp tác &rarr;
            </a>
        </div>

        <!-- Related Articles -->
        @if($relatedArticles->count() > 0)
            <div class="border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-12">
                <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-6">{{ __('Related Articles') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    @foreach($relatedArticles as $rel)
                        <div class="lush-card p-5">
                            <span class="text-[11px] text-[#168BD2] font-semibold block mb-1">{{ $rel->category->name ?? 'Tin tức' }}</span>
                            <h4 class="text-sm font-bold text-[#172B3A] dark:text-white mb-2 leading-snug line-clamp-2">
                                <a href="{{ route('articles.show', $rel->slug) }}" class="hover:text-[#168BD2]">{{ $rel->title }}</a>
                            </h4>
                            <a href="{{ route('articles.show', $rel->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline">{{ __('Read More') }} &rarr;</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</article>
@endsection
