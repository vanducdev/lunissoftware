@extends('layouts.app')

@section('title', __('Pricing') . ' – LushSoftware')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="badge-lush mb-3">{{ __('Pricing Plans') }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Bảng Giá Phần Mềm & Dịch Vụ Minh Bạch
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                Lựa chọn gói phần mềm phù hợp nhất cho cá nhân hoặc doanh nghiệp. Mọi gói đều đi kèm hỗ trợ kỹ thuật và cam kết hoàn tiền trong 7 ngày.
            </p>
        </div>

        <div class="space-y-16">
            @foreach($products as $prod)
                @if($prod->pricings->count() > 0)
                    <div class="border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-16 last:border-b-0" data-aos="fade-up">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                            <div>
                                <h2 class="text-2xl font-bold text-[#172B3A] dark:text-white">{{ $prod->name }}</h2>
                                <p class="text-xs text-[#718096] mt-1">{{ $prod->tagline }}</p>
                            </div>
                            <a href="{{ route('products.show', $prod->slug) }}" class="text-xs font-bold text-[#168BD2] hover:underline">
                                Xem tính năng đầy đủ &rarr;
                            </a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($prod->pricings as $pricing)
                                <div class="lush-card p-6 flex flex-col justify-between relative {{ $pricing->is_popular ? 'border-[#168BD2] ring-2 ring-[#168BD2]/20' : '' }}">
                                    @if($pricing->is_popular)
                                        <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                                            <span class="bg-[#168BD2] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase">
                                                {{ __('Most Popular') }}
                                            </span>
                                        </div>
                                    @endif

                                    <div>
                                        <h3 class="text-base font-bold text-[#172B3A] dark:text-white">{{ $pricing->plan_name }}</h3>
                                        <div class="flex items-baseline gap-1 my-3">
                                            <span class="text-2xl font-extrabold text-[#168BD2]">{{ number_format($pricing->price, 0, ',', '.') }}</span>
                                            <span class="text-sm font-bold text-[#172B3A] dark:text-white">{{ $pricing->currency }}</span>
                                            <span class="text-xs text-[#718096]">/ {{ $pricing->billing_cycle === 'monthly' ? __('Monthly') : ($pricing->billing_cycle === 'yearly' ? __('Yearly') : __('Lifetime')) }}</span>
                                        </div>

                                        @if(is_array($pricing->features) && count($pricing->features) > 0)
                                            <ul class="space-y-2 pt-3 border-t border-[#E8EDF2] dark:border-[#1E2D3D] text-xs text-[#172B3A] dark:text-[#E2E8F0]">
                                                @foreach($pricing->features as $f)
                                                    <li class="flex items-start gap-1.5">
                                                        <svg class="w-3.5 h-3.5 text-[#168BD2] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                        <span>{{ $f }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                    <div class="pt-6">
                                        <a href="{{ $pricing->cta_link ?: route('contact', ['product' => $prod->slug, 'plan' => $pricing->plan_name]) }}" class="{{ $pricing->is_popular ? 'lush-btn-primary' : 'lush-btn-secondary' }} w-full !justify-center !text-xs !py-2.5">
                                            {{ $pricing->cta_text ?: __('Send Message') }}
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
