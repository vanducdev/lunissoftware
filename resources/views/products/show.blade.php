@extends('layouts.app')

@section('title', $product->trans('name') . ' – LushSoftware')
@section('meta_description', Str::limit(strip_tags($product->trans('description')), 160))

@section('content')
<!-- Product Hero Section -->
<section class="py-16 lg:py-20 bg-white dark:bg-[#0B1118] border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <x-breadcrumb :items="[['label' => __('Products'), 'url' => route('products.index')], ['label' => $product->name]]" />
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-6" data-aos="fade-up">
                <div class="flex items-center gap-3">
                    <span class="text-xs font-bold px-3 py-1 rounded-md bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">
                        {{ $product->category->name ?? 'SaaS Solution' }}
                    </span>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-[#F8FAFC] dark:bg-[#1E2D3D] text-[#718096] border border-[#E8EDF2] dark:border-[#2D3F52]">
                        Phiên bản: {{ $product->version }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#172B3A] dark:text-white tracking-tight leading-tight">
                    {{ $product->trans('name') }}
                </h1>

                <p class="text-lg font-semibold text-[#168BD2]">
                    {{ $product->trans('tagline') }}
                </p>

                <p class="text-base text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                    {{ $product->trans('description') }}
                </p>

                <!-- Actions -->
                <div class="flex flex-wrap items-center gap-4 pt-3">
                    <a href="{{ route('contact', ['product' => $product->slug]) }}" data-open-trial="{{ $product->name }}" class="lush-btn-primary !py-3.5 !px-8 text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Nhận Tư Vấn & Dùng Thử</span>
                    </a>
                    @if($product->download_url)
                        <a href="{{ $product->download_url }}" target="_blank" class="lush-btn-secondary !py-3.5 !px-7 text-sm">
                            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            <span>{{ __('Download') }}</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Hero Illustration/Graphic -->
            <div class="lg:col-span-5" data-aos="fade-left">
                <div class="bg-white dark:bg-[#131D27] p-8 rounded-3xl border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl relative text-center">
                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-tr from-[#168BD2] to-[#48B4E5] flex items-center justify-center text-white mb-6 shadow-lg shadow-[#168BD2]/30">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-2">{{ $product->name }}</h3>
                    <p class="text-xs text-[#718096] mb-6">Đã tối ưu hóa cho Windows 10/11 & macOS & Web App</p>

                    <div class="p-4 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] text-left space-y-2 text-xs">
                        <div class="flex justify-between text-[#718096]"><span>Dung lượng cài đặt:</span><span class="font-semibold text-[#172B3A] dark:text-white">~ 85 MB</span></div>
                        <div class="flex justify-between text-[#718096]"><span>Hệ điều hành hỗ trợ:</span><span class="font-semibold text-[#172B3A] dark:text-white">Win 10/11, macOS, Linux</span></div>
                        <div class="flex justify-between text-[#718096]"><span>Bản cập nhật gần nhất:</span><span class="font-semibold text-[#172B3A] dark:text-white">{{ $product->updated_at->format('d/m/Y') }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
@if($product->features->count() > 0)
<section class="py-20 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="badge-lush mb-3">{{ __('Product Features') }}</span>
            <h2 class="text-3xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Tính Năng Nổi Bật Của {{ $product->name }}
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($product->features as $feature)
                <div class="lush-card p-6" data-aos="fade-up">
                    <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-2">{{ $feature->title }}</h3>
                    <p class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">{{ $feature->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Rich Content / Overview -->
@if($product->content)
<section class="py-16 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-slate dark:prose-invert max-w-none prose-headings:font-bold prose-headings:text-[#172B3A] dark:prose-headings:text-white prose-p:text-[#718096] dark:prose-p:text-[#94A3B8] prose-li:text-[#718096] dark:prose-li:text-[#94A3B8]">
            {!! $product->content !!}
        </div>
    </div>
</section>
@endif

<!-- Pricing Section -->
@if($product->pricings->count() > 0)
<section class="py-20 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="badge-lush mb-3">{{ __('Pricing Plans') }}</span>
            <h2 class="text-3xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Bảng Giá Bản Quyền {{ $product->name }}
            </h2>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-3 text-sm">
                Minh bạch, không chi phí ẩn, cam kết hoàn tiền trong 7 ngày nếu không hài lòng.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
            @foreach($product->pricings as $pricing)
                <div class="lush-card p-8 flex flex-col justify-between relative {{ $pricing->is_popular ? 'border-[#168BD2] ring-2 ring-[#168BD2]/20' : '' }}" data-aos="fade-up">
                    @if($pricing->is_popular)
                        <div class="absolute -top-3.5 left-1/2 transform -translate-x-1/2">
                            <span class="bg-[#168BD2] text-white text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                {{ __('Most Popular') }}
                            </span>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-bold text-[#172B3A] dark:text-white mb-2">{{ $pricing->plan_name }}</h3>
                        <div class="flex items-baseline gap-1 my-4">
                            <span class="text-3xl sm:text-4xl font-extrabold text-[#168BD2]">{{ number_format($pricing->price, 0, ',', '.') }}</span>
                            <span class="text-lg font-bold text-[#172B3A] dark:text-white">{{ $pricing->currency }}</span>
                            <span class="text-xs text-[#718096]">/ {{ $pricing->billing_cycle === 'monthly' ? __('Monthly') : ($pricing->billing_cycle === 'yearly' ? __('Yearly') : __('Lifetime')) }}</span>
                        </div>

                        <!-- Features list -->
                        @if(is_array($pricing->features) && count($pricing->features) > 0)
                            <ul class="space-y-3 pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                @foreach($pricing->features as $item)
                                    <li class="flex items-start gap-2">
                                        <svg class="w-4 h-4 text-[#168BD2] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        <span>{{ $item }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div class="pt-8">
                        <a href="{{ $pricing->cta_link ?: route('contact', ['product' => $product->slug, 'plan' => $pricing->plan_name]) }}" class="{{ $pricing->is_popular ? 'lush-btn-primary' : 'lush-btn-secondary' }} w-full !justify-center !text-sm !py-3">
                            {{ $pricing->cta_text ?: __('Send Message') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- FAQs Section -->
@if($product->faqs->count() > 0)
<section class="py-20 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="badge-lush mb-3">{{ __('Frequently Asked Questions') }}</span>
            <h2 class="text-3xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Giải Đáp Thắc Mắc Thường Gặp
            </h2>
        </div>

        <div class="space-y-4">
            @foreach($product->faqs as $faq)
                <details class="lush-card p-6 group cursor-pointer transition-all">
                    <summary class="font-bold text-base text-[#172B3A] dark:text-white flex items-center justify-between list-none">
                        <span>{{ $faq->question }}</span>
                        <svg class="w-5 h-5 text-[#168BD2] transform group-open:rotate-180 transition-transform duration-200 flex-shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </summary>
                    <p class="text-sm text-[#718096] dark:text-[#94A3B8] mt-4 leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-4">
                        {{ $faq->answer }}
                    </p>
                </details>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-white dark:bg-[#0B1118] border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-8">Sản Phẩm Cùng Danh Mục</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedProducts as $rel)
                <div class="lush-card p-5">
                    <h4 class="font-bold text-[#172B3A] dark:text-white mb-1">
                        <a href="{{ route('products.show', $rel->slug) }}" class="hover:text-[#168BD2]">{{ $rel->name }}</a>
                    </h4>
                    <p class="text-xs text-[#718096] mb-3 line-clamp-2">{{ $rel->tagline }}</p>
                    <a href="{{ route('products.show', $rel->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline">{{ __('View Details') }} &rarr;</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection

