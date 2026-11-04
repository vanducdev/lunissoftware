<!-- LushSoftware VietQR Instant Checkout & Activation Modal -->
<div id="lush-checkout-modal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/60 backdrop-blur-md transition-opacity">
    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        <div class="relative transform overflow-hidden rounded-3xl bg-white dark:bg-[#111A24] text-left shadow-2xl transition-all sm:my-8 w-full max-w-2xl border border-[#E8EDF2] dark:border-[#1E2D3D]">
            
            <!-- Top Header Banner -->
            <div class="bg-gradient-to-r from-[#168BD2] via-[#0878BD] to-[#48B4E5] p-5 sm:p-6 text-white relative">
                <button type="button" id="lush-checkout-modal-close" class="absolute top-5 right-5 text-white/80 hover:text-white p-1 rounded-full hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div class="flex items-center gap-2 mb-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-white/20 backdrop-blur-md text-[10px] font-black uppercase tracking-wider">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                        CỔNG THANH TOÁN VIETQR TỰ ĐỘNG
                    </span>
                    <span class="text-xs text-white/80 hidden sm:inline">• Kích Hoạt Tức Thì</span>
                </div>
                <h3 class="text-xl sm:text-2xl font-black">Đăng Ký & Kích Hoạt Bản Quyền</h3>
                <p class="text-xs text-white/90 mt-1">Quét mã VietQR bằng bất kỳ App ngân hàng nào (MB, VCB, Techcombank, MoMo...) để kích hoạt bản quyền tự động.</p>
            </div>

            <!-- Modal Content Multi-step -->
            <div class="p-5 sm:p-7">
                
                <!-- Package Summary Card -->
                <div class="p-4 rounded-2xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <span id="checkout-product-name" class="text-xs font-bold text-[#168BD2] block">LushCare v3.5</span>
                        <h4 id="checkout-plan-name" class="text-base font-black text-[#172B3A] dark:text-white">Gói Bản Quyền 1 Năm</h4>
                        <span id="checkout-plan-cycle" class="text-[11px] text-[#718096] dark:text-[#94A3B8]">Chu kỳ thanh toán: 1 Năm</span>
                    </div>
                    <div class="text-left sm:text-right sm:border-l sm:border-[#E8EDF2] sm:dark:border-[#1E2D3D] sm:pl-5">
                        <span class="text-xs text-[#718096] dark:text-[#94A3B8] block">Tổng thanh toán:</span>
                        <div class="flex items-baseline sm:justify-end gap-1">
                            <span id="checkout-plan-price" class="text-2xl font-black text-[#168BD2]">2.450.000</span>
                            <span class="text-xs font-bold text-[#172B3A] dark:text-white">VNĐ</span>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Customer Form Details -->
                <div id="checkout-step-1">
                    <h5 class="text-xs font-black uppercase tracking-wider text-[#718096] dark:text-[#94A3B8] mb-3">
                        Bước 1: Thông tin người nhận bản quyền
                    </h5>
                    <form id="checkout-info-form" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                                Họ và tên người sử dụng <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" id="cust-name" required placeholder="Ví dụ: Nguyễn Văn Hùng" class="lush-input text-xs w-full py-2.5 px-3.5">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                                    Số điện thoại / Zalo nhận key <span class="text-rose-500">*</span>
                                </label>
                                <input type="tel" id="cust-phone" required placeholder="0988xxxxxx" class="lush-input text-xs w-full py-2.5 px-3.5">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-[#172B3A] dark:text-white mb-1.5">
                                    Email nhận hóa đơn & license key <span class="text-rose-500">*</span>
                                </label>
                                <input type="email" id="cust-email" required placeholder="hung.nguyen@example.com" class="lush-input text-xs w-full py-2.5 px-3.5">
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="lush-btn-primary lush-btn-vip w-full !py-3.5 !text-sm font-bold shadow-lg shadow-[#168BD2]/30 flex items-center justify-center gap-2">
                                <span>Tiếp Tục Đến Bước Quét Mã VietQR</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Step 2: VietQR Transfer Screen -->
                <div id="checkout-step-2" class="hidden">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xs font-black uppercase tracking-wider text-[#718096] dark:text-[#94A3B8]">
                            Bước 2: Quét mã QR chuyển khoản chính xác
                        </h5>
                        <!-- Countdown Timer -->
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-rose-500/10 text-rose-600 dark:text-rose-400 text-xs font-bold border border-rose-500/20">
                            <svg class="w-3.5 h-3.5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke-width="3" stroke-dasharray="31.4 31.4"></circle>
                            </svg>
                            <span>Hết hạn sau: <span id="checkout-timer">15:00</span></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                        <!-- QR Code Showcase Box -->
                        <div class="md:col-span-5 flex flex-col items-center">
                            <div class="relative p-3 rounded-2xl bg-white dark:bg-[#1A2634] border-2 border-[#168BD2]/30 shadow-lg group">
                                <img id="checkout-qr-image" src="" alt="Mã VietQR" class="w-48 h-48 sm:w-52 sm:h-52 object-contain rounded-xl">
                                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-[#168BD2] text-white text-[9px] font-black uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow-xs whitespace-nowrap">
                                    VietQR 24/7
                                </div>
                            </div>
                            <span class="text-[11px] text-[#718096] dark:text-[#94A3B8] text-center mt-3">
                                Mở app ngân hàng quét mã QR để điền tự động
                            </span>
                        </div>

                        <!-- Banking Information Fields with 1-Click Copy -->
                        <div class="md:col-span-7 space-y-2.5 text-xs">
                            <!-- Bank Name -->
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div>
                                    <span class="text-[10px] uppercase text-[#718096] dark:text-[#94A3B8] font-bold block">Ngân Hàng</span>
                                    <span class="font-bold text-[#172B3A] dark:text-white">MBBank (Quân Đội)</span>
                                </div>
                                <span class="badge-lush text-[10px]">MB</span>
                            </div>

                            <!-- Account Number -->
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div>
                                    <span class="text-[10px] uppercase text-[#718096] dark:text-[#94A3B8] font-bold block">Số Tài Khoản</span>
                                    <span id="copy-acc-num" class="font-mono text-sm font-black text-[#168BD2]">0988123456</span>
                                </div>
                                <button type="button" onclick="copyToClipboard('0988123456', this)" class="px-2.5 py-1 rounded-lg bg-white dark:bg-[#1A2634] text-xs font-bold text-[#168BD2] border border-[#168BD2]/30 hover:bg-[#168BD2] hover:text-white transition-all flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span>Copy</span>
                                </button>
                            </div>

                            <!-- Account Name -->
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div>
                                    <span class="text-[10px] uppercase text-[#718096] dark:text-[#94A3B8] font-bold block">Chủ Tài Khoản</span>
                                    <span class="font-bold text-[#172B3A] dark:text-white uppercase">CONG TY CONG NGHE LUSH SOFTWARE</span>
                                </div>
                            </div>

                            <!-- Exact Transfer Amount -->
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                                <div>
                                    <span class="text-[10px] uppercase text-[#718096] dark:text-[#94A3B8] font-bold block">Số Tiền Chính Xác</span>
                                    <span id="copy-acc-amount" class="font-mono text-sm font-black text-emerald-600 dark:text-emerald-400">2.450.000 đ</span>
                                </div>
                                <button type="button" id="copy-amount-btn" class="px-2.5 py-1 rounded-lg bg-white dark:bg-[#1A2634] text-xs font-bold text-emerald-600 border border-emerald-500/30 hover:bg-emerald-600 hover:text-white transition-all flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span>Copy</span>
                                </button>
                            </div>

                            <!-- Transfer Description (Memo) -->
                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-amber-500/5 dark:bg-amber-500/10 border border-amber-500/25">
                                <div>
                                    <span class="text-[10px] uppercase text-amber-600 dark:text-amber-400 font-bold block">Nội Dung Chuyển Khoản</span>
                                    <span id="copy-acc-memo" class="font-mono text-xs font-black text-[#172B3A] dark:text-white">LUSH 88921</span>
                                </div>
                                <button type="button" id="copy-memo-btn" class="px-2.5 py-1 rounded-lg bg-white dark:bg-[#1A2634] text-xs font-bold text-amber-600 border border-amber-500/30 hover:bg-amber-500 hover:text-white transition-all flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span>Copy</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Confirm Payment Action -->
                    <div class="mt-6 pt-5 border-t border-[#E8EDF2] dark:border-[#1E2D3D] flex flex-col sm:flex-row items-center justify-between gap-3">
                        <button type="button" id="checkout-back-btn" class="text-xs text-[#718096] hover:text-[#168BD2] flex items-center gap-1">
                            &larr; Sửa lại thông tin người nhận
                        </button>
                        <button type="button" id="checkout-confirm-payment-btn" class="lush-btn-primary lush-btn-vip w-full sm:w-auto !py-3 !px-7 !text-xs font-bold shadow-lg shadow-emerald-500/20 bg-emerald-600 hover:bg-emerald-700 border-none flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span>Tôi Đã Chuyển Khoản Xong</span>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Success Confirmation Screen -->
                <div id="checkout-step-3" class="hidden text-center py-6 px-4 space-y-4">
                    <div class="w-18 h-18 rounded-full bg-emerald-500/10 text-emerald-500 mx-auto flex items-center justify-center">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 text-xs font-bold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Đơn Hàng Đã Được Ghi Nhận Thành Công
                    </div>

                    <h4 class="text-2xl font-black text-[#172B3A] dark:text-white">Cảm Ơn Bạn Đã Tin Chọn LushSoftware!</h4>

                    <div class="max-w-md mx-auto p-4 rounded-2xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] text-left text-xs space-y-2">
                        <div class="flex justify-between">
                            <span class="text-[#718096] dark:text-[#94A3B8]">Mã đơn hàng:</span>
                            <span id="success-order-code" class="font-mono font-bold text-[#168BD2]">LUSH-88921</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#718096] dark:text-[#94A3B8]">Số điện thoại / Zalo:</span>
                            <span id="success-phone" class="font-bold text-[#172B3A] dark:text-white">0988xxxxxx</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-[#718096] dark:text-[#94A3B8]">Trạng thái:</span>
                            <span class="text-emerald-600 font-bold">Đang kiểm tra & Kích hoạt bản quyền</span>
                        </div>
                    </div>

                    <p class="text-xs text-[#5A6E85] dark:text-[#94A3B8] leading-relaxed max-w-md mx-auto">
                        Kỹ sư LushSoftware sẽ kích hoạt mã bản quyền và chủ động liên hệ qua Zalo / Số điện thoại của bạn trong <strong>5 - 15 phút</strong> để gửi link tải và hỗ trợ cài đặt Ultraview 1-1 miễn phí.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                        <a href="https://zalo.me/0988123456" target="_blank" class="lush-btn-primary !py-2.5 !px-5 text-xs font-bold">
                            Liên Hệ Kỹ Sư Qua Zalo Ngay
                        </a>
                        <button type="button" id="checkout-finish-btn" class="lush-btn-secondary !py-2.5 !px-5 text-xs font-bold">
                            Đóng Cửa Sổ
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
window.copyToClipboard = function(text, btnElement) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => {
            showCopyFeedback(btnElement);
        }).catch(() => {
            fallbackCopy(text, btnElement);
        });
    } else {
        fallbackCopy(text, btnElement);
    }
};

function fallbackCopy(text, btnElement) {
    const input = document.createElement('input');
    input.value = text;
    document.body.appendChild(input);
    input.select();
    document.execCommand('copy');
    document.body.removeChild(input);
    showCopyFeedback(btnElement);
}

function showCopyFeedback(btnElement) {
    if (!btnElement) return;
    const originalText = btnElement.innerHTML;
    btnElement.innerHTML = `<span class="text-emerald-500 font-bold">✓ Đã chép!</span>`;
    setTimeout(() => {
        btnElement.innerHTML = originalText;
    }, 1800);
}

document.addEventListener('DOMContentLoaded', function () {
    const checkoutModal = document.getElementById('lush-checkout-modal');
    const closeBtn = document.getElementById('lush-checkout-modal-close');
    const step1 = document.getElementById('checkout-step-1');
    const step2 = document.getElementById('checkout-step-2');
    const step3 = document.getElementById('checkout-step-3');
    const infoForm = document.getElementById('checkout-info-form');
    const backBtn = document.getElementById('checkout-back-btn');
    const confirmPaymentBtn = document.getElementById('checkout-confirm-payment-btn');
    const finishBtn = document.getElementById('checkout-finish-btn');

    const productNameEl = document.getElementById('checkout-product-name');
    const planNameEl = document.getElementById('checkout-plan-name');
    const planCycleEl = document.getElementById('checkout-plan-cycle');
    const planPriceEl = document.getElementById('checkout-plan-price');
    const qrImageEl = document.getElementById('checkout-qr-image');
    const accAmountEl = document.getElementById('copy-acc-amount');
    const accMemoEl = document.getElementById('copy-acc-memo');
    const copyAmountBtn = document.getElementById('copy-amount-btn');
    const copyMemoBtn = document.getElementById('copy-memo-btn');
    const timerEl = document.getElementById('checkout-timer');

    let currentOrder = {
        product: '',
        plan: '',
        price: '',
        rawPrice: 0,
        cycle: '',
        orderCode: '',
        name: '',
        phone: '',
        email: ''
    };

    let timerInterval = null;

    function startTimer(durationSeconds) {
        clearInterval(timerInterval);
        let timer = durationSeconds;
        function updateDisplay() {
            let minutes = parseInt(timer / 60, 10);
            let seconds = parseInt(timer % 60, 10);
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            if (timerEl) timerEl.textContent = minutes + ":" + seconds;
            if (--timer < 0) {
                clearInterval(timerInterval);
                if (timerEl) timerEl.textContent = "00:00 (Hết hạn)";
            }
        }
        updateDisplay();
        timerInterval = setInterval(updateDisplay, 1000);
    }

    window.openCheckoutModal = function(opts) {
        currentOrder.product = opts.product || 'LushSoftware Ecosystem';
        currentOrder.plan = opts.plan || 'Bản Quyền Tiêu Chuẩn';
        currentOrder.price = opts.price || '1.250.000';
        currentOrder.rawPrice = opts.rawPrice || parseInt(opts.price.toString().replace(/[^0-9]/g, '')) || 1250000;
        currentOrder.cycle = opts.cycle || 'Năm';
        currentOrder.orderCode = 'LUSH' + Math.floor(10000 + Math.random() * 90000);

        if (productNameEl) productNameEl.textContent = currentOrder.product;
        if (planNameEl) planNameEl.textContent = currentOrder.plan;
        if (planCycleEl) planCycleEl.textContent = 'Chu kỳ thanh toán: ' + currentOrder.cycle;
        if (planPriceEl) planPriceEl.textContent = currentOrder.price;

        // Reset steps
        step1.classList.remove('hidden');
        step2.classList.add('hidden');
        step3.classList.add('hidden');

        checkoutModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    };

    function closeCheckout() {
        checkoutModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
        clearInterval(timerInterval);
    }

    if (closeBtn) closeBtn.addEventListener('click', closeCheckout);
    if (finishBtn) finishBtn.addEventListener('click', closeCheckout);

    if (checkoutModal) {
        checkoutModal.addEventListener('click', function(e) {
            if (e.target === checkoutModal) closeCheckout();
        });
    }

    // Step 1 Form Submission -> Proceed to Step 2
    if (infoForm) {
        infoForm.addEventListener('submit', function (e) {
            e.preventDefault();
            currentOrder.name = document.getElementById('cust-name').value.trim();
            currentOrder.phone = document.getElementById('cust-phone').value.trim();
            currentOrder.email = document.getElementById('cust-email').value.trim();

            // Setup Step 2 VietQR code
            const bankId = 'MBBANK';
            const accountNo = '0988123456';
            const accountName = 'CONG TY CO PHAN CONG NGHE LUSH SOFTWARE';
            const memo = currentOrder.orderCode + ' ' + currentOrder.phone.slice(-4);
            const qrUrl = `https://img.vietqr.io/image/${bankId}-${accountNo}-compact2.png?amount=${currentOrder.rawPrice}&addInfo=${encodeURIComponent(memo)}&accountName=${encodeURIComponent(accountName)}`;

            if (qrImageEl) qrImageEl.src = qrUrl;
            if (accAmountEl) accAmountEl.textContent = currentOrder.price + ' đ';
            if (accMemoEl) accMemoEl.textContent = memo;

            if (copyAmountBtn) {
                copyAmountBtn.onclick = function() {
                    window.copyToClipboard(currentOrder.rawPrice.toString(), copyAmountBtn);
                };
            }
            if (copyMemoBtn) {
                copyMemoBtn.onclick = function() {
                    window.copyToClipboard(memo, copyMemoBtn);
                };
            }

            // Create Order record via API
            try {
                fetch("{{ route('checkout.create') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        order_code: currentOrder.orderCode,
                        customer_name: currentOrder.name,
                        customer_email: currentOrder.email,
                        customer_phone: currentOrder.phone,
                        product_name: currentOrder.product,
                        plan_name: currentOrder.plan,
                        amount: currentOrder.rawPrice,
                        billing_cycle: currentOrder.cycle
                    })
                });
            } catch (err) {}

            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            startTimer(15 * 60);
        });
    }

    if (backBtn) {
        backBtn.addEventListener('click', function () {
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
            clearInterval(timerInterval);
        });
    }

    // Step 2 Confirm Payment -> Step 3
    if (confirmPaymentBtn) {
        confirmPaymentBtn.addEventListener('click', async function () {
            const originalBtnHtml = confirmPaymentBtn.innerHTML;
            confirmPaymentBtn.disabled = true;
            confirmPaymentBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Đang ghi nhận đơn...</span>
            `;

            try {
                // Post to /contact so order lands directly in admin contact messages
                const formData = new FormData();
                formData.append('name', currentOrder.name);
                formData.append('phone', currentOrder.phone);
                formData.append('email', currentOrder.email);
                formData.append('subject', `[ĐƠN HÀNG VIETQR] ${currentOrder.product} - ${currentOrder.plan}`);
                formData.append('product_interest', currentOrder.product);
                formData.append('service_interest', currentOrder.plan);
                formData.append('message', `Mã đơn hàng: ${currentOrder.orderCode} | Giá: ${currentOrder.price} VNĐ | Chu kỳ: ${currentOrder.cycle} | Khách hàng đã bấm xác nhận chuyển khoản.`);

                await fetch("{{ route('contact.submit') }}", {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                // Also notify /checkout/confirm-order
                try {
                    await fetch(`/checkout/confirm-order/${currentOrder.orderCode}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                        }
                    });
                } catch (err) {}

                document.getElementById('success-order-code').textContent = currentOrder.orderCode;
                document.getElementById('success-phone').textContent = currentOrder.phone;

                step2.classList.add('hidden');
                step3.classList.remove('hidden');
                clearInterval(timerInterval);
            } catch (e) {
                // Still show success if network hiccup
                step2.classList.add('hidden');
                step3.classList.remove('hidden');
                clearInterval(timerInterval);
            }
        });
    }

    // Bind all buttons with [data-checkout-plan]
    document.querySelectorAll('[data-checkout-plan]').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const product = this.getAttribute('data-checkout-product') || 'LushSoftware Ecosystem';
            const plan = this.getAttribute('data-checkout-plan') || 'Bản quyền';
            const price = this.getAttribute('data-checkout-price') || '1.250.000';
            const rawPrice = this.getAttribute('data-checkout-raw-price') || 1250000;
            const cycle = this.getAttribute('data-checkout-cycle') || '1 Năm';

            window.openCheckoutModal({
                product: product,
                plan: plan,
                price: price,
                rawPrice: rawPrice,
                cycle: cycle
            });
        });
    });
});
</script>

