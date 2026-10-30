@extends('layouts.admin')

@section('page_title', 'Chỉnh Sửa Sản Phẩm: ' . $product->name)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Chỉnh Sửa: {{ $product->name }}</h2>
            <p class="text-xs text-[#718096]">Cập nhật thông tin chi tiết và trạng thái phát hành</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="lush-btn-secondary !text-xs !py-2">
                Xem trang ngoài &rarr;
            </a>
            <a href="{{ route('admin.products.index') }}" class="lush-btn-secondary !text-xs !py-2">
                &larr; Danh sách
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Thông Tin Chung</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tên sản phẩm <span class="text-rose-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('name') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Đường dẫn Slug <span class="text-rose-500">*</span></label>
                    <input type="text" name="slug" value="{{ old('slug', $product->slug) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('slug') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Danh mục</label>
                    <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Phiên bản</label>
                    <input type="text" name="version" value="{{ old('version', $product->version) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tagline</label>
                <input type="text" name="tagline" value="{{ old('tagline', $product->tagline) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Mô tả ngắn</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nội dung chi tiết (HTML)</label>
                <textarea name="content" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('content', $product->content) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Download URL</label>
                    <input type="url" name="download_url" value="{{ old('download_url', $product->download_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Video Demo URL</label>
                    <input type="url" name="video_url" value="{{ old('video_url', $product->video_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Trạng thái</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="published" {{ old('status', $product->status) === 'published' ? 'selected' : '' }}>Xuất bản (Published)</option>
                        <option value="draft" {{ old('status', $product->status) === 'draft' ? 'selected' : '' }}>Bản nháp (Draft)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thứ tự hiển thị</label>
                    <input type="number" name="order" value="{{ old('order', $product->order) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                        <span class="text-xs font-bold text-[#172B3A] dark:text-white">Sản phẩm nổi bật</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.products.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy bỏ</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Cập Nhật Thay Đổi</button>
        </div>
    </form>
</div>
@endsection
