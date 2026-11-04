@php
    $hotline = \App\Models\WebsiteSetting::get('contact_hotline', '1900 886 996');
    $phone = \App\Models\WebsiteSetting::get('contact_phone', '0988 123 456');
    $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
    if (empty($cleanPhone)) {
        $cleanPhone = '0988123456';
    }
    $telegram = \App\Models\WebsiteSetting::get('social_telegram', 'https://t.me/lushsoftware_official');
    $facebook = \App\Models\WebsiteSetting::get('social_facebook', 'https://facebook.com/lushsoftware');
@endphp

<!-- LushSoftware Floating Speed-Dial Support Hub -->
<div id="lush-floating-widget" class="fixed bottom-6 right-6 z-40 select-none">
    <!-- Quick Contact Menu Items (Animated Stack) -->
    <div id="lush-speed-dial-menu" class="hidden flex-col items-end gap-3 mb-3 transition-all duration-300">
        <!-- Hotline Call Direct -->
        <a href="tel:{{ preg_replace('/[^0-9]/', '', $hotline) }}" class="group flex items-center gap-3 pl-3 pr-4 py-2.5 rounded-full bg-white dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200">
            <span class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#168BD2] transition-colors whitespace-nowrap">
                Hotline 24/7: <span class="text-[#168BD2]">{{ $hotline }}</span>
            </span>
            <div class="w-9 h-9 rounded-full bg-rose-500 text-white flex items-center justify-center shadow-md shadow-rose-500/30">
                <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
        </a>

        <!-- Zalo Chat -->
        <a href="https://zalo.me/{{ $cleanPhone }}" target="_blank" rel="noopener noreferrer" class="group flex items-center gap-3 pl-3 pr-4 py-2.5 rounded-full bg-white dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200">
            <span class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#0068FF] transition-colors whitespace-nowrap">
                Chat Zalo Tư Vấn Trực Tiếp
            </span>
            <div class="w-9 h-9 rounded-full bg-[#0068FF] text-white flex items-center justify-center shadow-md shadow-[#0068FF]/30 font-black text-xs">
                Z
            </div>
        </a>

        <!-- Telegram VIP Support -->
        <a href="{{ $telegram }}" target="_blank" rel="noopener noreferrer" class="group flex items-center gap-3 pl-3 pr-4 py-2.5 rounded-full bg-white dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200">
            <span class="text-xs font-bold text-[#172B3A] dark:text-white group-hover:text-[#229ED9] transition-colors whitespace-nowrap">
                Telegram Kỹ Thuật VIP
            </span>
            <div class="w-9 h-9 rounded-full bg-[#229ED9] text-white flex items-center justify-center shadow-md shadow-[#229ED9]/30">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.458c.538-.196 1.006.128.832.941z"/>
                </svg>
            </div>
        </a>

        <!-- Quick Callback Modal Trigger -->
        <button type="button" id="lush-quick-callback-trigger" class="group flex items-center gap-3 pl-3 pr-4 py-2.5 rounded-full bg-gradient-to-r from-[#168BD2] to-[#0878BD] text-white shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-200">
            <span class="text-xs font-bold whitespace-nowrap">
                ⚡ Nhận Tư Vấn Trong 5 Phút
            </span>
            <div class="w-9 h-9 rounded-full bg-white/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
        </button>
    </div>

    <!-- Main Pulse Button -->
    <div class="relative flex items-center justify-end">
        <button type="button" id="lush-speed-dial-toggle" aria-label="Trung tâm hỗ trợ khách hàng" class="relative group flex items-center justify-center w-14 h-14 rounded-full bg-gradient-to-tr from-[#168BD2] via-[#0878BD] to-[#48B4E5] text-white shadow-xl shadow-[#168BD2]/35 hover:shadow-2xl hover:shadow-[#168BD2]/50 hover:scale-105 active:scale-95 transition-all duration-300">
            <!-- Ripple Rings -->
            <span class="absolute -inset-1 rounded-full bg-[#168BD2] opacity-35 animate-ping pointer-events-none"></span>
            <span class="absolute -inset-2 rounded-full border border-[#168BD2]/40 opacity-50 animate-pulse pointer-events-none"></span>

            <!-- Normal Icon: Message / Support -->
            <svg id="lush-speed-dial-open-icon" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>

            <!-- Close Icon (shown when expanded) -->
            <svg id="lush-speed-dial-close-icon" class="w-6 h-6 hidden transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/>
            </svg>

            <!-- Online Badge -->
            <span class="absolute top-0 right-0 flex h-3.5 w-3.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-emerald-500 border-2 border-white dark:border-[#0B1118]"></span>
            </span>
        </button>
    </div>
</div>

<!-- Quick Callback / Consultation Lead Modal -->
<div id="lush-callback-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-sm transition-opacity">
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-[#111A24] text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-[#E8EDF2] dark:border-[#1E2D3D]">
            <!-- Decorative Header Gradient -->
            <div class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] p-6 text-white relative">
                <button type="button" id="lush-callback-modal-close" class="absolute top-5 right-5 text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md text-[11px] font-black uppercase tracking-wider mb-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                    Hỗ Trợ & Tư Vấn 24/7
                </div>
                <h3 class="text-xl sm:text-2xl font-black">Yêu Cầu Kỹ Sư Gọi Lại</h3>
                <p class="text-xs text-white/85 mt-1">Để lại thông tin, chuyên gia LushSoftware sẽ gọi điện hoặc nhắn Zalo hỗ trợ bạn trong vòng 5 - 15 phút.</p>
            </div>

            <!-- Form Body -->
            <form id="lush-callback-form" class="p-6 sm:p-7 space-y-4">
                @csrf
                <input type="hidden" name="subject" value="Yêu cầu tư vấn nhanh từ Floating Widget">

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                        Họ và tên của bạn <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" name="name" required placeholder="Nguyễn Văn A" class="lush-input text-xs w-full py-2.5 px-3.5">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                            Số điện thoại / Zalo <span class="text-rose-500">*</span>
                        </label>
                        <input type="tel" name="phone" required placeholder="0988xxxxxx" class="lush-input text-xs w-full py-2.5 px-3.5">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                            Email nhận tài liệu <span class="text-rose-500">*</span>
                        </label>
                        <input type="email" name="email" required placeholder="contact@company.com" class="lush-input text-xs w-full py-2.5 px-3.5">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                        Sản phẩm / Dịch vụ bạn quan tâm
                    </label>
                    <select name="product_interest" class="lush-input text-xs w-full py-2.5 px-3.5">
                        <option value="LushCare v3.5 - Nuôi & Quản Lý Dàn Nick Đa Kênh">LushCare v3.5 – Nuôi & Quản Lý Dàn Nick</option>
                        <option value="LushLogin Antidetect - Trình Duyệt Canvas Antidetect">LushLogin – Trình Duyệt Antidetect</option>
                        <option value="LushCRM Enterprise - Tự Động Hóa CRM">LushCRM – CRM & Tự Động Hóa</option>
                        <option value="LushAI Core - Trợ Lý Tiếp Thị AI">LushAI Core – Tiếp Thị AI Tự Động</option>
                        <option value="Tư vấn toàn bộ giải pháp tổng thể">Tư vấn giải pháp tổng thể theo yêu cầu</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                        Ghi chú thêm (không bắt buộc)
                    </label>
                    <textarea name="message" rows="2" placeholder="Ví dụ: Tôi muốn cài thử trên máy tính Windows, hỗ trợ Ultraview giúp tôi..." class="lush-input text-xs w-full py-2 px-3.5"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="lush-callback-submit-btn" class="lush-btn-primary lush-btn-vip w-full !py-3.5 !text-sm font-bold shadow-lg shadow-[#168BD2]/30 flex items-center justify-center gap-2">
                    <span>Gửi Yêu Cầu Hỗ Trợ Ngay</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

                <p class="text-[11px] text-center text-[#718096] dark:text-[#94A3B8]">
                    🔒 Thông tin của bạn được cam kết bảo mật 100% theo tiêu chuẩn an toàn dữ liệu.
                </p>
            </form>

            <!-- Success State -->
            <div id="lush-callback-success" class="hidden p-8 text-center space-y-4">
                <div class="w-16 h-16 rounded-full bg-emerald-500/10 text-emerald-500 mx-auto flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h4 class="text-xl font-black text-[#172B3A] dark:text-white">Gửi Yêu Cầu Thành Công!</h4>
                <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-sm mx-auto">
                    Kỹ sư hỗ trợ LushSoftware đã nhận được thông tin và sẽ chủ động gọi điện hoặc nhắn tin Zalo hỗ trợ bạn ngay trong ít phút tới.
                </p>
                <div class="pt-2">
                    <button type="button" id="lush-callback-success-close" class="lush-btn-secondary !text-xs !py-2.5 !px-6">
                        Đóng cửa sổ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('lush-speed-dial-toggle');
    const menu = document.getElementById('lush-speed-dial-menu');
    const openIcon = document.getElementById('lush-speed-dial-open-icon');
    const closeIcon = document.getElementById('lush-speed-dial-close-icon');

    const callbackModal = document.getElementById('lush-callback-modal');
    const callbackTrigger = document.getElementById('lush-quick-callback-trigger');
    const callbackClose = document.getElementById('lush-callback-modal-close');
    const callbackForm = document.getElementById('lush-callback-form');
    const callbackSuccess = document.getElementById('lush-callback-success');
    const callbackSuccessClose = document.getElementById('lush-callback-success-close');
    const submitBtn = document.getElementById('lush-callback-submit-btn');

    let isOpen = false;

    function toggleMenu() {
        isOpen = !isOpen;
        if (isOpen) {
            menu.classList.remove('hidden');
            menu.classList.add('flex');
            openIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
            menu.classList.remove('flex');
            openIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    }

    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleMenu);
    }

    // Close menu when clicking outside
    document.addEventListener('click', function (e) {
        if (isOpen && !e.target.closest('#lush-floating-widget')) {
            toggleMenu();
        }
    });

    // Open Callback Modal
    function openModal() {
        if (isOpen) {
            toggleMenu();
        }
        callbackModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        callbackModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    if (callbackTrigger) {
        callbackTrigger.addEventListener('click', openModal);
    }

    // Any button on page with data-open-trial can also open this modal
    document.querySelectorAll('[data-open-trial]').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            const prodName = this.getAttribute('data-open-trial');
            if (prodName) {
                const select = callbackForm.querySelector('select[name="product_interest"]');
                if (select) {
                    let matched = false;
                    for (let opt of select.options) {
                        if (opt.text.toLowerCase().includes(prodName.toLowerCase())) {
                            opt.selected = true;
                            matched = true;
                            break;
                        }
                    }
                    if (!matched) {
                        select.value = prodName;
                    }
                }
            }
            openModal();
        });
    });

    if (callbackClose) callbackClose.addEventListener('click', closeModal);
    if (callbackSuccessClose) callbackSuccessClose.addEventListener('click', closeModal);

    // Close on backdrop click
    if (callbackModal) {
        callbackModal.addEventListener('click', function (e) {
            if (e.target === callbackModal) {
                closeModal();
            }
        });
    }

    // Submit Callback Form via AJAX
    if (callbackForm) {
        callbackForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Đang gửi yêu cầu...</span>
            `;

            try {
                const formData = new FormData(callbackForm);
                const response = await fetch("{{ route('contact.submit') }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();
                if (response.ok && data.success) {
                    callbackForm.classList.add('hidden');
                    callbackSuccess.classList.remove('hidden');
                } else {
                    alert(data.message || 'Có lỗi xảy ra, vui lòng thử lại hoặc gọi Hotline.');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                }
            } catch (err) {
                alert('Có lỗi kết nối máy chủ, vui lòng liên hệ Hotline.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });
    }
});
</script>

