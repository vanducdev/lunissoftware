@extends('layouts.app')

@section('title', __('Pricing') . ' – LushSoftware')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('Pricing')]]" />

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
                            <div class="flex items-center gap-3.5">
                                <x-product-icon :slug="$prod->slug" size="sm" />
                                <div>
                                    <h2 class="text-2xl font-bold text-[#172B3A] dark:text-white">{{ $prod->name }}</h2>
                                    <p class="text-xs text-[#718096] mt-1">{{ $prod->tagline }}</p>
                                </div>
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

        <!-- Software Feature Comparison Matrix -->
        <div class="mt-24 pt-16 border-t border-[#E8EDF2] dark:border-[#1E2D3D]" data-aos="fade-up">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="badge-lush mb-3">Feature Matrix</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#172B3A] dark:text-white">
                    Bảng So Sánh Quyền Lợi Các Gói
                </h2>
                <p class="text-xs sm:text-sm text-[#718096] dark:text-[#94A3B8] mt-2">
                    Đối chiếu chi tiết tính năng, quyền truy cập tài nguyên và cấp độ hỗ trợ kỹ thuật
                </p>
            </div>

            <div class="lush-card overflow-hidden shadow-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs sm:text-sm">
                        <thead class="bg-[#F8FAFC] dark:bg-[#131D27] border-b border-[#E8EDF2] dark:border-[#1E2D3D] text-[#172B3A] dark:text-white font-bold">
                            <tr>
                                <th class="px-6 py-4 w-1/3">Tính năng & Quyền lợi</th>
                                <th class="px-6 py-4 text-center">Gói Starter</th>
                                <th class="px-6 py-4 text-center text-[#168BD2]">Gói Professional</th>
                                <th class="px-6 py-4 text-center">Gói Enterprise</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D] text-[#718096] dark:text-[#94A3B8]">
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Số lượng tài khoản / Thiết bị liên kết</td>
                                <td class="px-6 py-4 text-center">Tối đa 1 máy tính</td>
                                <td class="px-6 py-4 text-center text-[#168BD2] font-semibold">Tối đa 3 máy tính song song</td>
                                <td class="px-6 py-4 text-center">Không giới hạn (Multi-seat)</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Hệ thống Proxy xoay vòng & Chống Checkpoint</td>
                                <td class="px-6 py-4 text-center">Cơ bản</td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">Nâng cao (Dynamic IP)</td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">Chuyên sâu (Private Residential)</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Tự động hóa kịch bản đa luồng (Multi-threading)</td>
                                <td class="px-6 py-4 text-center">Tối đa 5 luồng</td>
                                <td class="px-6 py-4 text-center text-[#168BD2] font-semibold">Tối đa 30 luồng đồng thời</td>
                                <td class="px-6 py-4 text-center">Không giới hạn luồng</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Trí tuệ nhân tạo Lush AI Bot (Soạn tin & Auto-reply)</td>
                                <td class="px-6 py-4 text-center">
                                    <svg class="w-4 h-4 mx-auto text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">
                                    <svg class="w-4 h-4 mx-auto text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">
                                    <svg class="w-4 h-4 mx-auto text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Cập nhật phần mềm định kỳ & Bản vá lỗi</td>
                                <td class="px-6 py-4 text-center">Miễn phí 1 năm</td>
                                <td class="px-6 py-4 text-center text-[#168BD2] font-semibold">Miễn phí trọn đời bản quyền</td>
                                <td class="px-6 py-4 text-center">Ưu tiên cập nhật sớm (Early Access)</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">API Tích hợp & Webhook tùy biến</td>
                                <td class="px-6 py-4 text-center">
                                    <svg class="w-4 h-4 mx-auto text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </td>
                                <td class="px-6 py-4 text-center">REST API cơ bản</td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">Full REST API, SDK & Webhooks</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 font-semibold text-[#172B3A] dark:text-white">Hỗ trợ kỹ thuật & Cam kết SLA</td>
                                <td class="px-6 py-4 text-center">Email trong giờ hành chính</td>
                                <td class="px-6 py-4 text-center text-[#168BD2] font-semibold">UltraViewer & Telegram 1-1</td>
                                <td class="px-6 py-4 text-center text-emerald-600 font-semibold">Dedicated CSM & SLA 99.9% 24/7</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pricing FAQ Accordion -->
        <div class="mt-20 max-w-3xl mx-auto" data-aos="fade-up">
            <div class="text-center mb-10">
                <span class="badge-lush mb-2">FAQ</span>
                <h3 class="text-2xl font-bold text-[#172B3A] dark:text-white">Câu Hỏi Thường Gặp Về Bảng Giá</h3>
            </div>

            <div class="space-y-4" id="pricing-faq-list">
                <div class="lush-card p-5 cursor-pointer faq-item" onclick="toggleFaq(this)">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-[#172B3A] dark:text-white">Tôi có thể đổi máy tính khi sử dụng phần mềm không?</span>
                        <svg class="w-4 h-4 text-[#718096] faq-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-content hidden pt-3 text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] mt-3">
                        Có. LushSoftware cung cấp cơ chế chuyển đổi máy tính linh hoạt. Bạn có thể tự gỡ bản quyền trên máy cũ và kích hoạt lại trên máy mới thông qua tài khoản quản trị cá nhân hoặc liên hệ hỗ trợ kỹ thuật trong 5 phút.
                    </div>
                </div>

                <div class="lush-card p-5 cursor-pointer faq-item" onclick="toggleFaq(this)">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-[#172B3A] dark:text-white">Chính sách hoàn tiền của LushSoftware hoạt động như thế nào?</span>
                        <svg class="w-4 h-4 text-[#718096] faq-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-content hidden pt-3 text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] mt-3">
                        Chúng tôi cam kết hoàn tiền 100% trong vòng 7 ngày nếu phần mềm phát sinh lỗi kỹ thuật do hệ thống của LushSoftware và đội ngũ hỗ trợ không khắc phục được cho bạn.
                    </div>
                </div>

                <div class="lush-card p-5 cursor-pointer faq-item" onclick="toggleFaq(this)">
                    <div class="flex items-center justify-between">
                        <span class="font-bold text-sm text-[#172B3A] dark:text-white">Hình thức thanh toán nào được chấp nhận?</span>
                        <svg class="w-4 h-4 text-[#718096] faq-icon transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-content hidden pt-3 text-xs text-[#718096] dark:text-[#94A3B8] leading-relaxed border-t border-[#E8EDF2] dark:border-[#1E2D3D] mt-3">
                        LushSoftware hỗ trợ chuyển khoản ngân hàng qua mã VietQR tự động kích hoạt, thẻ Visa/MasterCard, ví điện tử và thanh toán USDT cho khách hàng quốc tế. Xuất hóa đơn VAT điện tử đầy đủ theo yêu cầu doanh nghiệp.
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Enterprise Banner -->
        <div class="mt-20 lush-card p-8 sm:p-12 text-center relative overflow-hidden bg-gradient-to-r from-white via-white to-[#168BD2]/5 dark:from-[#131D27] dark:to-[#131D27]" data-aos="fade-up">
            <h3 class="text-2xl font-bold text-[#172B3A] dark:text-white">Cần Kiến Trúc Riêng Cho Doanh Nghiệp Của Bạn?</h3>
            <p class="text-sm text-[#718096] dark:text-[#94A3B8] max-w-xl mx-auto mt-2">
                Chúng tôi cung cấp gói giải pháp Private Cloud, máy chủ riêng, tùy biến tính năng theo quy trình kinh doanh và ký cam kết bảo mật NDA độc quyền.
            </p>
            <div class="mt-6 flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact', ['plan' => 'Custom Enterprise']) }}" class="lush-btn-primary !py-3 !px-6 !text-sm">
                    Yêu Cầu Báo Giá Doanh Nghiệp
                </a>
                <a href="tel:{{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}" class="lush-btn-secondary !py-3 !px-6 !text-sm">
                    Gọi Hotline: {{ \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996') }}
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleFaq(card) {
    const content = card.querySelector('.faq-content');
    const icon = card.querySelector('.faq-icon');
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        icon.classList.remove('rotate-180');
    }
}
</script>
@endpush
@endsection

