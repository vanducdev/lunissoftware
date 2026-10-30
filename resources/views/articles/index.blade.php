@extends('layouts.app')

@section('title', __('News') . ' – LushSoftware')

@section('content')
<div class="py-12 lg:py-16 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="badge-lush mb-3">{{ __('News') }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Tin Tức, Cập Nhật & Kiến Thức Công Nghệ
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-3 text-base">
                Cập nhật những xu hướng công nghệ tiếp thị, chiến lược kinh doanh đa kênh và hướng dẫn sử dụng phần mềm hiệu quả.
            </p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="bg-white dark:bg-[#131D27] p-4 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm mb-10">
            <form method="GET" action="{{ route('articles.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                <div class="md:col-span-8 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search Articles') }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    <svg class="w-4 h-4 text-[#718096] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <div class="md:col-span-4">
                    <select name="category" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="">{{ __('All Categories') }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>
                                {{ $cat->name }} ({{ $cat->articles_count }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <!-- Articles Grid -->
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <article class="lush-card overflow-hidden flex flex-col justify-between" data-aos="fade-up">
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-[#718096] mb-3">
                                <span class="text-[#168BD2] font-semibold">{{ $article->category->name ?? 'Công nghệ' }}</span>
                                <span>•</span>
                                <span>{{ $article->published_at ? $article->published_at->format('d/m/Y') : $article->created_at->format('d/m/Y') }}</span>
                            </div>
                            <h2 class="text-lg font-bold text-[#172B3A] dark:text-white mb-3 hover:text-[#168BD2] transition-colors leading-snug">
                                <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                            </h2>
                            <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-3 leading-relaxed">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                        <div class="px-6 pb-6 pt-2 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <img src="{{ $article->author ? $article->author->avatar_url : 'https://ui-avatars.com/api/?name=Lush' }}" alt="Author" class="w-6 h-6 rounded-full object-cover">
                                <span class="text-xs text-[#718096]">{{ $article->author->name ?? 'Lush Editorial' }}</span>
                            </div>
                            <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                                <span>{{ __('Read More') }}</span> &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $articles->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white dark:bg-[#131D27] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <p class="text-base text-[#718096]">Không tìm thấy bài viết nào phù hợp.</p>
                <a href="{{ route('articles.index') }}" class="lush-btn-primary mt-4 !text-xs">Xem tất cả bài viết</a>
            </div>
        @endif
    </div>
</div>
@endsection

