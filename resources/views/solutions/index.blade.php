@extends('layouts.app')

@section('title', __('Solutions') . ' – LushSoftware')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="badge-lush mb-3">{{ __('Solutions') }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Giải Pháp Công Nghệ Tăng Trưởng Bền Vững
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                Mỗi bộ giải pháp của LushSoftware được thiết kế tối ưu hóa theo quy mô và lĩnh vực kinh doanh của bạn, giúp tiết kiệm chi phí vận hành và nhân sự lên đến 60%.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($categories as $idx => $category)
                <div class="lush-card p-8 lg:p-10" data-aos="fade-up">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                        <div class="lg:col-span-5 space-y-4">
                            <span class="text-xs font-bold text-[#168BD2] uppercase tracking-wider">Giải pháp số 0{{ $idx + 1 }}</span>
                            <h2 class="text-2xl font-bold text-[#172B3A] dark:text-white">{{ $category->name }}</h2>
                            <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">{{ $category->description }}</p>
                            <div class="pt-2">
                                <a href="{{ route('contact', ['solution' => $category->slug]) }}" class="lush-btn-primary !text-xs !py-2.5">
                                    <span>Tư vấn lộ trình triển khai</span>
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </div>
                        </div>

                        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($category->products as $p)
                                <div class="p-4 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118]/50 hover:border-[#168BD2] transition-colors">
                                    <h3 class="text-sm font-bold text-[#172B3A] dark:text-white mb-1">
                                        <a href="{{ route('products.show', $p->slug) }}" class="hover:text-[#168BD2]">{{ $p->name }}</a>
                                    </h3>
                                    <p class="text-xs text-[#718096] dark:text-[#94A3B8] line-clamp-2 mb-3">{{ $p->tagline }}</p>
                                    <a href="{{ route('products.show', $p->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                                        <span>Chi tiết</span> &rarr;
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
