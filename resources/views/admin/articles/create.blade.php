@extends('layouts.admin')

@section('page_title', 'Viết Bài Viết Mới')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Thêm Bài Viết Mới</h2>
            <p class="text-xs text-[#718096]">Soạn thảo nội dung và cấu hình siêu dữ liệu SEO</p>
        </div>
        <a href="{{ route('admin.articles.index') }}" class="lush-btn-secondary !text-xs !py-2">
            &larr; Quay lại danh sách
        </a>
    </div>

    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Nội Dung Bài Viết</h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tiêu đề bài viết <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required placeholder="Nhập tiêu đề hấp dẫn..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('title') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Chuyên mục</label>
                    <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="">-- Chọn chuyên mục --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Đoạn trích tóm tắt (Excerpt)</label>
                <textarea name="excerpt" rows="2" placeholder="Tóm tắt nội dung chính trong 1-2 câu..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('excerpt') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nội dung bài viết (HTML / Text) <span class="text-rose-500">*</span></label>
                <textarea name="content" rows="10" required placeholder="Nội dung chi tiết của bài viết..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('content') }}</textarea>
                @error('content') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Trạng thái</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Xuất bản ngay</option>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Lưu bản nháp</option>
                    </select>
                </div>

                <div class="flex items-center pt-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                        <span class="text-xs font-bold text-[#172B3A] dark:text-white">Đặt làm bài viết nổi bật</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- SEO Metadata Box -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Cấu Hình SEO Google</h3>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">SEO Title</label>
                <input type="text" name="seo_title" value="{{ old('seo_title') }}" placeholder="Để trống sẽ dùng tiêu đề bài viết" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">SEO Description</label>
                <textarea name="seo_description" rows="2" placeholder="Mô tả tóm tắt hiển thị trên kết quả tìm kiếm Google..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('seo_description') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">SEO Keywords</label>
                <input type="text" name="seo_keywords" value="{{ old('seo_keywords') }}" placeholder="marketing automation, phan mem lush, crm..." class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
            </div>
        </div>

        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.articles.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy bỏ</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Lưu & Xuất Bản</button>
        </div>
    </form>
</div>
@endsection
