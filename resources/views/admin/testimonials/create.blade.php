@extends('layouts.admin')

@section('page_title', 'Thêm Đánh Giá Khách Hàng')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Thêm Đánh Giá Khách Hàng Mới</h2>
            <p class="text-xs text-[#718096]">Nhập thông tin nhân vật và nội dung cảm nhận</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="lush-btn-secondary !text-xs !py-2">&larr; Quay lại</a>
    </div>

    <form method="POST" action="{{ route('admin.testimonials.store') }}" class="lush-card p-6 sm:p-8 space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Họ và tên khách hàng <span class="text-rose-500">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ví dụ: Trần Minh Hoàng" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Chức danh</label>
                <input type="text" name="position" value="{{ old('position') }}" placeholder="Giám đốc Marketing" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Công ty / Tổ chức</label>
                <input type="text" name="company" value="{{ old('company') }}" placeholder="TechGrowth Media" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nội dung nhận xét <span class="text-rose-500">*</span></label>
            <textarea name="content" rows="4" required placeholder="LushSoftware đã giúp chúng tôi..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('content') }}</textarea>
            @error('content') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Số sao đánh giá (1-5)</label>
                <select name="rating" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    <option value="5" selected>5 Sao ★★★★★</option>
                    <option value="4">4 Sao ★★★★☆</option>
                    <option value="3">3 Sao ★★★☆☆</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thứ tự hiển thị</label>
                <input type="number" name="order" value="{{ old('order', 1) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
            <div class="flex items-center pt-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                    <span class="text-xs font-bold text-[#172B3A] dark:text-white">Kích hoạt hiển thị</span>
                </label>
            </div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3">
            <a href="{{ route('admin.testimonials.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Lưu Đánh Giá</button>
        </div>
    </form>
</div>
@endsection
