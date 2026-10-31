@extends('layouts.app')

@section('title', __('Contact Us') . ' – LushSoftware')

@section('content')
<div class="pt-4 pb-16 sm:pt-6 lg:pt-8 lg:pb-20 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('Contact')]]" />

        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="badge-lush mb-3">{{ __('Contact') }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-[#172B3A] dark:text-white tracking-tight">
                Liên Hệ Tư Vấn & Hỗ Trợ Kỹ Thuật
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-4 text-base">
                Hãy để lại yêu cầu hoặc câu hỏi của bạn. Đội ngũ chuyên gia kỹ thuật LushSoftware sẽ phản hồi nhanh chóng trong vòng 15 phút.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Contact Info Left Column -->
            <div class="lg:col-span-5 space-y-8" data-aos="fade-right">
                <div class="lush-card p-8 space-y-6">
                    <h3 class="text-xl font-bold text-[#172B3A] dark:text-white">Thông Tin Trụ Sở</h3>

                    <div class="space-y-4 text-sm">
                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex-shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-[#172B3A] dark:text-white block">Địa chỉ văn phòng</span>
                                <span class="text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed">{{ $settings['address'] }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex-shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-[#172B3A] dark:text-white block">Hotline tư vấn</span>
                                <a href="tel:{{ $settings['hotline'] }}" class="text-sm font-extrabold text-[#168BD2] hover:underline">{{ $settings['hotline'] }}</a>
                                <span class="text-xs text-[#718096] block">(Hỗ trợ 24/7 kể cả ngày lễ)</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex-shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-[#172B3A] dark:text-white block">Email doanh nghiệp</span>
                                <a href="mailto:{{ $settings['email'] }}" class="text-xs text-[#168BD2] hover:underline">{{ $settings['email'] }}</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex-shrink-0 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <span class="font-bold text-[#172B3A] dark:text-white block">Thời gian làm việc</span>
                                <span class="text-xs text-[#718096] dark:text-[#94A3B8]">{{ $settings['hours'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Telegram Support Box -->
                <div class="p-6 rounded-2xl bg-gradient-to-tr from-[#168BD2]/10 to-[#48B4E5]/10 border border-[#168BD2]/20 flex items-center justify-between">
                    <div>
                        <h4 class="text-sm font-bold text-[#172B3A] dark:text-white">Kênh Telegram Hỗ Trợ 24/7</h4>
                        <p class="text-xs text-[#718096]">Nhận hỗ trợ từ kỹ sư phần mềm ngay lập tức</p>
                    </div>
                    <a href="{{ $settings['telegram'] }}" target="_blank" rel="noopener noreferrer" class="lush-btn-primary !text-xs !py-2">
                        Chat Telegram
                    </a>
                </div>
            </div>

            <!-- Contact Form Right Column -->
            <div class="lg:col-span-7" data-aos="fade-left">
                <div class="lush-card p-8 sm:p-10">
                    <h3 class="text-2xl font-bold text-[#172B3A] dark:text-white mb-2">Gửi Yêu Cầu Tư Vấn</h3>
                    <p class="text-xs text-[#718096] mb-8">Điền đầy đủ thông tin bên dưới để nhận chính sách ưu đãi bản quyền tốt nhất.</p>

                    <form id="contact-form" method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Full Name') }} <span class="text-rose-500">*</span></label>
                                <input type="text" name="name" required value="{{ old('name', auth()->user()?->name) }}" placeholder="Nguyễn Văn A" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Email Address') }} <span class="text-rose-500">*</span></label>
                                <input type="email" name="email" required value="{{ old('email', auth()->user()?->email) }}" placeholder="email@congty.com" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('email') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Phone Number') }}</label>
                                <input type="tel" name="phone" value="{{ old('phone', auth()->user()?->phone) }}" placeholder="0988 123 456" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                @error('phone') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Company Name') }}</label>
                                <input type="text" name="company" value="{{ old('company') }}" placeholder="Tên doanh nghiệp / Cửa hàng" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Product of Interest') }}</label>
                            <select name="product_interest" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                                <option value="">-- Chọn sản phẩm quan tâm --</option>
                                @foreach($products as $p)
                                    <option value="{{ $p->slug }}" {{ (old('product_interest', $selectedProduct) === $p->slug) ? 'selected' : '' }}>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">{{ __('Your Message') }} <span class="text-rose-500">*</span></label>
                            <textarea name="message" rows="4" required placeholder="Vui lòng mô tả nhu cầu kinh doanh hoặc câu hỏi cần giải đáp..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('message') }}</textarea>
                            @error('message') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="pt-2">
                            <button type="submit" id="submit-contact-btn" class="lush-btn-primary w-full !py-3.5 text-sm !justify-center">
                                <span>{{ __('Submit Request') }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const btn = document.getElementById('submit-contact-btn');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = `<span>Đang gửi...</span>`;
        }
    });
});
</script>
@endpush

