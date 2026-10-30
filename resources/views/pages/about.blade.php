@extends('layouts.app')

@section('title', __('About Us') . ' – LushSoftware')

@section('content')
<div class="py-16 lg:py-24 bg-white dark:bg-[#0B1118]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-breadcrumb :items="[['label' => __('About Us')]]" />

        <!-- Hero -->
        <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
            <span class="badge-lush mb-3">{{ __('About Us') }}</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#172B3A] dark:text-white tracking-tight leading-tight">
                Kiến Tạo Công Nghệ Tự Động Hóa Vì Sự Thịnh Vượng Doanh Nghiệp
            </h1>
            <p class="text-[#718096] dark:text-[#94A3B8] mt-6 text-base sm:text-lg leading-relaxed">
                LushSoftware là đơn vị công nghệ tiên phong phát triển các giải pháp phần mềm chuyên biệt phục vụ tự động hóa Marketing, quản trị quan hệ khách hàng và phân tích dữ liệu kinh doanh thông minh.
            </p>
        </div>

        <!-- Vision, Mission, Core Values (5.2 in Master Prompt) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">
            <!-- Tầm nhìn -->
            <div class="lush-card p-8" data-aos="fade-up" data-aos-delay="50">
                <div class="w-12 h-12 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xl mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-3">Tầm Nhìn Chiến Lược</h3>
                <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                    Trở thành hệ sinh thái SaaS hàng đầu Đông Nam Á vào năm 2030, trao quyền cho hàng trăm ngàn doanh nghiệp vừa và nhỏ chuyển đổi số thành công với chi phí tối ưu.
                </p>
            </div>

            <!-- Sứ mệnh -->
            <div class="lush-card p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xl mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-3">Sứ Mệnh Phát Triển</h3>
                <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                    Đơn giản hóa những công nghệ phức tạp thành các phần mềm dễ sử dụng, hiệu suất cao và vận hành bền bỉ, giúp khách hàng tiết kiệm thời gian và bứt phá doanh thu.
                </p>
            </div>

            <!-- Giá trị cốt lõi -->
            <div class="lush-card p-8" data-aos="fade-up" data-aos-delay="150">
                <div class="w-12 h-12 rounded-xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold text-xl mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-[#172B3A] dark:text-white mb-3">Giá Trị Cốt Lõi</h3>
                <p class="text-sm text-[#718096] dark:text-[#94A3B8] leading-relaxed">
                    <strong>Chất lượng – Tận tâm – Đổi mới – Bảo mật.</strong> Chúng tôi không bao giờ thỏa hiệp với sự cẩu thả và luôn đặt bảo vệ dữ liệu khách hàng lên hàng đầu.
                </p>
            </div>
        </div>

        <!-- Milestones / Timeline -->
        <div class="max-w-4xl mx-auto border-t border-[#E8EDF2] dark:border-[#1E2D3D] pt-20" data-aos="fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#172B3A] dark:text-white text-center mb-12">
                Hành Trình Kiến Tạo & Bứt Phá
            </h2>

            <div class="space-y-8">
                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-xl bg-[#168BD2] text-white flex-shrink-0 flex items-center justify-center font-bold text-sm">
                        2020
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-[#172B3A] dark:text-white">Thành lập LushSoftware</h4>
                        <p class="text-sm text-[#718096] dark:text-[#94A3B8] mt-1">Khởi đầu với 5 kỹ sư đam mê giải pháp tự động hóa tiếp thị, ra mắt sản phẩm thử nghiệm đầu tiên.</p>
                    </div>
                </div>

                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-xl bg-[#168BD2] text-white flex-shrink-0 flex items-center justify-center font-bold text-sm">
                        2022
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-[#172B3A] dark:text-white">Cột mốc 5,000 Doanh Nghiệp</h4>
                        <p class="text-sm text-[#718096] dark:text-[#94A3B8] mt-1">Mở rộng hệ sinh thái thêm Lush Social Hub và Lush CRM, nhận giải thưởng Sản phẩm Công nghệ Triển vọng.</p>
                    </div>
                </div>

                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-xl bg-[#168BD2] text-white flex-shrink-0 flex items-center justify-center font-bold text-sm">
                        2024
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-[#172B3A] dark:text-white">Nâng Cấp Điện Toán Đám Mây & AI</h4>
                        <p class="text-sm text-[#718096] dark:text-[#94A3B8] mt-1">Tích hợp mô hình AI LLM vào Lush Chatbot AI và nâng cấp hạ tầng Cloud phân tán tốc độ cao.</p>
                    </div>
                </div>

                <div class="flex gap-6 items-start">
                    <div class="w-12 h-12 rounded-xl bg-[#168BD2] text-white flex-shrink-0 flex items-center justify-center font-bold text-sm">
                        2026
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-[#172B3A] dark:text-white">Mở Rộng Thị Trường Quốc Tế</h4>
                        <p class="text-sm text-[#718096] dark:text-[#94A3B8] mt-1">Phục vụ hơn 15,000 khách hàng doanh nghiệp, hỗ trợ đầy đủ 4 ngôn ngữ: Tiếng Việt, English, 中文, 한국어.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

