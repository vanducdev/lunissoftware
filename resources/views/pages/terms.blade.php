@extends('layouts.app')

@section('title', __('Terms of Service') . ' – LushSoftware')

@section('content')
<div class="py-16 bg-white dark:bg-[#0B1118]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-[#172B3A] dark:text-white mb-8">Điều Khoản Dịch Vụ & Sử Dụng Phần Mềm</h1>

        <div class="prose prose-slate dark:prose-invert max-w-none text-sm text-[#718096] dark:text-[#94A3B8] space-y-6">
            <p>Chào mừng bạn đến với LushSoftware. Bằng việc truy cập website hoặc sử dụng các phần mềm trong hệ sinh thái của chúng tôi, bạn đồng ý tuân thủ các điều khoản và quy định dưới đây.</p>
            
            <h3 class="text-base font-bold text-[#172B3A] dark:text-white">1. Quyền Sở Hữu Trí Tuệ</h3>
            <p>Toàn bộ mã nguồn, giao diện, logo, nhãn hiệu thương mại và tài liệu liên quan đến LushSoftware thuộc sở hữu độc quyền của LushSoftware. Khách hàng được cấp quyền sử dụng phần mềm theo gói bản quyền đã đăng ký và không được phép sao chép, dịch ngược mã nguồn (reverse engineering) hoặc phân phối lại dưới bất kỳ hình thức nào.</p>

            <h3 class="text-base font-bold text-[#172B3A] dark:text-white">2. Quy Định Sử Dụng An Toàn</h3>
            <p>Người dùng cam kết sử dụng phần mềm vào mục đích kinh doanh hợp pháp, không sử dụng hệ thống để phát tán thư rác độc hại, mã độc hoặc các hành vi vi phạm pháp luật hiện hành.</p>

            <h3 class="text-base font-bold text-[#172B3A] dark:text-white">3. Chính Sách Hoàn Tiền & Nâng Cấp</h3>
            <p>LushSoftware áp dụng chính sách hoàn tiền 100% trong vòng 7 ngày đầu tiên nếu phần mềm phát sinh lỗi nghiêm trọng từ phía nhà cung cấp mà không thể khắc phục được.</p>
        </div>
    </div>
</div>
@endsection

