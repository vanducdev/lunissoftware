@extends('layouts.admin')

@section('page_title', 'Chi Tiết Yêu Cầu Tư Vấn #' . $contact->id)

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Yêu Cầu Từ: {{ $contact->name }}</h2>
            <p class="text-xs text-[#718096]">Gửi lúc: {{ $contact->created_at->format('H:i:s d/m/Y') }} ({{ $contact->created_at->diffForHumans() }})</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="lush-btn-secondary !text-xs !py-2">
            &larr; Danh sách yêu cầu
        </a>
    </div>

    <div class="lush-card p-6 sm:p-8 space-y-6">
        <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Thông Tin Người Gửi</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div>
                <span class="text-[#718096] block mb-1">Họ và tên:</span>
                <span class="font-bold text-[#172B3A] dark:text-white text-sm">{{ $contact->name }}</span>
            </div>
            <div>
                <span class="text-[#718096] block mb-1">Địa chỉ Email:</span>
                <a href="mailto:{{ $contact->email }}" class="font-bold text-[#168BD2] hover:underline text-sm">{{ $contact->email }}</a>
            </div>
            <div>
                <span class="text-[#718096] block mb-1">Số điện thoại:</span>
                <a href="tel:{{ $contact->phone }}" class="font-bold text-[#168BD2] hover:underline font-mono text-sm">{{ $contact->phone ?: 'Chưa cung cấp' }}</a>
            </div>
            <div>
                <span class="text-[#718096] block mb-1">Công ty / Doanh nghiệp:</span>
                <span class="font-bold text-[#172B3A] dark:text-white text-sm">{{ $contact->company ?: 'Cá nhân' }}</span>
            </div>
        </div>

        <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            <span class="text-xs text-[#718096] block mb-1">Sản phẩm hoặc dịch vụ quan tâm:</span>
            <span class="inline-block px-3 py-1 rounded-lg text-xs font-bold bg-[#168BD2]/10 text-[#168BD2]">
                {{ $contact->product_interest ?: 'Tư vấn giải pháp chung' }}
            </span>
        </div>

        <div>
            <span class="text-xs text-[#718096] block mb-2">Nội dung tin nhắn yêu cầu:</span>
            <div class="p-4 rounded-xl bg-[#F8FAFC] dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] text-sm text-[#172B3A] dark:text-[#E2E8F0] leading-relaxed">
                {{ $contact->message }}
            </div>
        </div>
    </div>

    <!-- Update Status & Admin Notes Form -->
    <div class="lush-card p-6 sm:p-8">
        <h3 class="text-sm font-bold text-[#172B3A] dark:text-white mb-4">Cập Nhật Tiến Độ & Ghi Chú Nội Bộ</h3>
        <form method="POST" action="{{ route('admin.contacts.update', $contact->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Trạng thái xử lý</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    <option value="pending" {{ $contact->status === 'pending' ? 'selected' : '' }}>Chờ xử lý (Pending)</option>
                    <option value="processing" {{ $contact->status === 'processing' ? 'selected' : '' }}>Đang chăm sóc / Tư vấn (Processing)</option>
                    <option value="resolved" {{ $contact->status === 'resolved' ? 'selected' : '' }}>Đã hoàn thành chốt đơn / Giải quyết (Resolved)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Ghi chú nội bộ (Chỉ quản trị viên nhìn thấy)</label>
                <textarea name="admin_notes" rows="4" placeholder="Ví dụ: Đã gọi điện lúc 10:00, khách hàng hẹn trao đổi hợp đồng ngày mai..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('admin_notes', $contact->admin_notes) }}</textarea>
            </div>

            <div class="flex items-center justify-between pt-2">
                <button type="submit" class="lush-btn-primary !text-xs !py-2.5">
                    Lưu Ghi Chú & Trạng Thái
                </button>

                <form method="POST" action="{{ route('admin.contacts.destroy', $contact->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bản ghi này?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-xs text-rose-500 hover:underline">Xóa yêu cầu</button>
                </form>
            </div>
        </form>
    </div>
</div>
@endsection

