@extends('layouts.admin')

@section('page_title', 'Chỉnh Sửa Bài Viết')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Chỉnh Sửa: {{ $article->title }}</h2>
            <p class="text-xs text-[#718096]">Cập nhật nội dung bài viết và tối ưu hóa SEO</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('articles.show', $article->slug) }}" target="_blank" class="lush-btn-secondary !text-xs !py-2">
                Xem trang ngoài &rarr;
            </a>
            <a href="{{ route('admin.articles.index') }}" class="lush-btn-secondary !text-xs !py-2">
                &larr; Danh sách
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Nội Dung Bài Viết</h3>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tiêu đề bài viết <span class="text-rose-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                    @error('title') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Chuyên mục</label>
                    <select name="category_id" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="">-- Chọn chuyên mục --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $article->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Đường dẫn Slug <span class="text-rose-500">*</span></label>
                <input type="text" name="slug" value="{{ old('slug', $article->slug) }}" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                @error('slug') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Đoạn trích tóm tắt (Excerpt)</label>
                <textarea name="excerpt" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('excerpt', $article->excerpt) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nội dung bài viết (HTML / Text) <span class="text-rose-500">*</span></label>
                <textarea name="content" rows="10" required class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('content', $article->content) }}</textarea>
                @error('content') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Ảnh đại diện (Thumbnail)</label>
                    @if($article->thumbnail)
                        <div class="mb-2 flex items-center gap-3 p-2 rounded-xl bg-slate-50 dark:bg-[#131D27] border border-[#E8EDF2] dark:border-[#1E2D3D]">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="Thumbnail" class="w-16 h-12 rounded-lg object-cover">
                            <span class="text-[11px] text-[#718096]">Ảnh hiện tại</span>
                        </div>
                    @endif
                    <input type="file" name="thumbnail" accept="image/*" class="w-full px-3 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                    <p class="text-[10px] text-[#718096] mt-1">Khuyến nghị kích thước chuẩn SEO: 1200x630px (tối đa 2MB)</p>
                    @error('thumbnail') <span class="text-xs text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Trạng thái</label>
                    <select name="status" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                        <option value="published" {{ old('status', $article->status) === 'published' ? 'selected' : '' }}>Xuất bản (Published)</option>
                        <option value="draft" {{ old('status', $article->status) === 'draft' ? 'selected' : '' }}>Bản nháp (Draft)</option>
                    </select>
                </div>
            </div>

            <div class="pt-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $article->is_featured) ? 'checked' : '' }} class="rounded border-[#E8EDF2] text-[#168BD2] focus:ring-[#168BD2]">
                    <span class="text-xs font-bold text-[#172B3A] dark:text-white">Đặt làm bài viết nổi bật (Hiển thị trang chủ)</span>
                </label>
            </div>
        </div>

        <!-- Advanced Yoast / RankMath SEO Suite -->
        @include('admin.articles._seo_suite', ['article' => $article])

        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.articles.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy bỏ</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5">Cập Nhật Bài Viết</button>
        </div>
    </form>
</div>
@endsection

