@extends('layouts.app')

@section('title', __('All Products') . ' – LushSoftware')

@section('content')
<div class="py-12 lg:py-16 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('Products')]]" />

        <!-- Header & Title -->
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="badge-lush mb-3">{{ __('Products') }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Danh Sách Phần Mềm & Giải Pháp LushSoftware
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-3 text-base">
                Khám phá hệ sinh thái công nghệ tự động hóa được tin dùng bởi hơn 15,000+ doanh nghiệp tại Việt Nam và quốc tế.
            </p>
        </div>

        <!-- Filter & Search Bar -->
        <div class="bg-white dark:bg-[#131D27] p-4 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-sm mb-10">
            <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-12 gap-3 items-center">
                <!-- Search input -->
                <div class="md:col-span-5 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search Products') }}" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    <svg class="w-4 h-4 text-[#718096] absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Category select -->
                <div class="md:col-span-4">
                    <select name="category" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="">{{ __('All Categories') }}</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>
                                {{ $cat->name }} ({{ $cat->products_count }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort select -->
                <div class="md:col-span-3">
                    <select name="sort" onchange="this.form.submit()" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="order" {{ request('sort') === 'order' ? 'selected' : '' }}>Sắp xếp: Mặc định</option>
                        <option value="popular" {{ request('sort') === 'popular' ? 'selected' : '' }}>Sắp xếp: Xem nhiều nhất</option>
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Sắp xếp: Mới nhất</option>
                        <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Sắp xếp: Tên A-Z</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Product Grid -->
        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($products as $product)
                    <div class="lush-card p-6 flex flex-col justify-between" data-aos="fade-up">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <x-product-icon :slug="$product->slug" />
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-[#F8FAFC] dark:bg-[#1E2D3D] text-[#718096] dark:text-[#94A3B8] border border-[#E8EDF2] dark:border-[#2D3F52]">
                                    {{ $product->category->name ?? 'SaaS' }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-2">
                                <a href="{{ route('products.show', $product->slug) }}" class="hover:text-[#168BD2] transition-colors">
                                    {{ $product->trans('name') }}
                                </a>
                            </h3>
                            <p class="text-xs font-semibold text-[#168BD2] mb-3">
                                {{ $product->trans('tagline') }}
                            </p>
                            <p class="text-sm text-[#718096] dark:text-[#94A3B8] line-clamp-3 mb-6 leading-relaxed">
                                {{ $product->trans('description') }}
                            </p>

                            @if($product->features->count() > 0)
                                <div class="space-y-2 mb-6 pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                                    @foreach($product->features->take(3) as $feature)
                                        <div class="flex items-start gap-2 text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                            <svg class="w-4 h-4 text-[#168BD2] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            <span class="truncate">{{ $feature->title }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center gap-3">
                            <a href="{{ route('products.show', $product->slug) }}" class="lush-btn-primary flex-1 !text-xs !py-2.5">
                                <span>{{ __('View Details') }}</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                            <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-secondary !text-xs !py-2.5">
                                {{ __('Try Now') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white dark:bg-[#131D27] rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
                <p class="text-base text-[#718096]">Không tìm thấy phần mềm phù hợp với từ khóa của bạn.</p>
                <a href="{{ route('products.index') }}" class="lush-btn-primary mt-4 !text-xs">Xem tất cả sản phẩm</a>
            </div>
        @endif
    </div>
</div>
@endsection

