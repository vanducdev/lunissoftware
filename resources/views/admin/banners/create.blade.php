@extends('layouts.admin')

@section('page_title', 'Thêm Banner Mới')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Tạo Banner Mới</h2>
            <p class="text-xs text-[#718096]">Thiết lập khẩu hiệu và các nút kêu gọi chuyển đổi</p>
        </div>
        <a href="{{ route('admin.banners.index') }}" class="lush-btn-secondary !text-xs !py-2">
            &larr; Quay lại danh sách
        </a>
    </div>

    <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="lush-card p-6 sm:p-8 space-y-4">
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tiêu đề Banner <span class="text-rose-500">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Ví dụ: Hệ Sinh Thái Phần Mềm Tăng Trưởng Toàn Diện" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                @error('title') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Huy hiệu (Badge)</label>
                    <input type="text" name="badge" value="{{ old('badge') }}" placeholder="CÔNG NGHỆ BỨT PHÁ 2026" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Vị trí hiển thị</label>
                    <input type="text" name="position" value="{{ old('position', 'home_hero') }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Mô tả phụ (Subtitle)</label>
                <textarea name="subtitle" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('subtitle') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nút chính: Tên nút</label>
                    <input type="text" name="link_text" value="{{ old('link_text', 'Khám phá sản phẩm') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nút chính: Đường dẫn (URL)</label>
                    <input type="text" name="link_url" value="{{ old('link_url', '/products') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nút phụ: Tên nút</label>
                    <input type="text" name="secondary_link_text" value="{{ old('secondary_link_text', 'Liên hệ tư vấn') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nút phụ: Đường dẫn (URL)</label>
                    <input type="text" name="secondary_link_url" value="{{ old('secondary_link_url', '/contact') }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thứ tự hiển thị</label>
                    <input type="number" name="order" value="{{ old('order', 1) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                        <span class="text-xs font-bold text-[#172B3A] dark:text-white">Kích hoạt hiển thị</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.banners.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy bỏ</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Lưu Banner</button>
        </div>
    </form>
</div>
@endsection

