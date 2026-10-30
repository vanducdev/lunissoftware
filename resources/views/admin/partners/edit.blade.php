@extends('layouts.admin')

@section('page_title', 'Chỉnh Sửa Đối Tác')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Chỉnh Sửa: {{ $partner->name }}</h2>
            <p class="text-xs text-[#718096]">Cập nhật thông tin đối tác chiến lược</p>
        </div>
        <a href="{{ route('admin.partners.index') }}" class="lush-btn-secondary !text-xs !py-2">&larr; Quay lại</a>
    </div>

    <form method="POST" action="{{ route('admin.partners.update', $partner->id) }}" class="lush-card p-6 sm:p-8 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tên đối tác / Thương hiệu <span class="text-rose-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Đường dẫn Website</label>
            <input type="url" name="website_url" value="{{ old('website_url', $partner->website_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thứ tự hiển thị</label>
                <input type="number" name="order" value="{{ old('order', $partner->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
            <div class="flex items-center pt-6">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $partner->is_active ? 'checked' : '' }} class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                    <span class="text-xs font-bold text-[#172B3A] dark:text-white">Kích hoạt hiển thị</span>
                </label>
            </div>
        </div>

        <div class="pt-4 flex items-center justify-end gap-3">
            <a href="{{ route('admin.partners.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Cập Nhật Đối Tác</button>
        </div>
    </form>
</div>
@endsection
