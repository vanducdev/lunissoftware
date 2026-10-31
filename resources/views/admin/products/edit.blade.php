@extends('layouts.admin')

@section('page_title', 'Chỉnh Sửa Sản Phẩm: ' . $product->name)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Chỉnh Sửa: {{ $product->name }}</h2>
            <p class="text-xs text-[#718096]">Cập nhật hình ảnh mockup, tính năng và trạng thái phát hành</p>
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

        <!-- 1. Thông Tin Cơ Bản -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3 flex items-center gap-2">
                <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Thông Tin Cơ Bản</span>
            </h3>

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
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Danh mục phần mềm</label>
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
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Mô tả tóm tắt (Hiển thị trên thẻ sản phẩm)</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Nội dung chi tiết & hướng dẫn (HTML)</label>
                <textarea name="content" rows="6" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">{{ old('content', $product->content) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Link tải phần mềm (Download URL)</label>
                    <input type="url" name="download_url" value="{{ old('download_url', $product->download_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Link Video Demo (YouTube)</label>
                    <input type="url" name="video_url" value="{{ old('video_url', $product->video_url) }}" class="w-full px-4 py-2.5 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-sm focus:outline-none focus:border-[#168BD2]">
                </div>
            </div>
        </div>

        <!-- 2. Quản Lý Hình Ảnh & Mockup Hộp Phần Mềm -->
        <div class="lush-card p-6 sm:p-8 space-y-6">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Hình Ảnh & Mockup Hộp Phần Mềm</span>
                </div>
                <span class="text-xs text-[#718096]">Định dạng: PNG, JPG, WEBP, SVG (Tối đa 5MB)</span>
            </h3>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Banner Image (8 cols) -->
                <div class="lg:col-span-8 space-y-3">
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                        Ảnh Mockup Hộp Phần Mềm / Cover Thumbnail (Banner Image)
                    </label>
                    <p class="text-xs text-[#718096]">Hiển thị ở đầu thẻ sản phẩm ngoài trang chủ & trang danh sách phần mềm.</p>

                    @if($product->banner_url)
                        <div class="relative rounded-2xl overflow-hidden border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#101923] p-2 flex items-center justify-center h-52 group">
                            <img src="{{ $product->banner_url }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                                <span class="text-xs font-bold text-white bg-black/60 px-3 py-1.5 rounded-lg">Ảnh đang sử dụng</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 text-xs">
                            <label class="flex items-center gap-1.5 cursor-pointer text-rose-500 font-semibold">
                                <input type="checkbox" name="remove_banner_image" value="1" class="rounded border-rose-300 text-rose-500">
                                <span>Xóa ảnh hiện tại</span>
                            </label>
                        </div>
                    @endif

                    <div class="mt-2 flex flex-col items-center justify-center p-6 border-2 border-dashed border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] rounded-2xl bg-[#F8FAFC] dark:bg-[#101923] transition-all relative group cursor-pointer" onclick="document.getElementById('banner_input_edit').click()">
                        <div id="banner_preview_box_edit" class="w-full h-48 rounded-xl overflow-hidden hidden mb-3 bg-white dark:bg-[#0B1118] border border-[#E8EDF2] dark:border-[#1E2D3D] flex items-center justify-center">
                            <img id="banner_preview_img_edit" src="#" alt="Preview" class="w-full h-full object-contain">
                        </div>
                        <div id="banner_placeholder_edit" class="flex flex-col items-center text-center">
                            <div class="w-10 h-10 rounded-full bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mb-1 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <span class="text-xs font-bold text-[#172B3A] dark:text-white">{{ $product->banner_url ? 'Nhấp để thay đổi ảnh mockup khác' : 'Nhấp để tải lên ảnh mockup hộp' }}</span>
                            <span class="text-[11px] text-[#718096]">Khuyến nghị tỷ lệ 16:10 hoặc 16:9</span>
                        </div>
                        <input type="file" id="banner_input_edit" name="banner_image" accept="image/*" class="hidden" onchange="previewFile(this, 'banner_preview_img_edit', 'banner_preview_box_edit', 'banner_placeholder_edit')">
                    </div>
                </div>

                <!-- Logo Image (4 cols) -->
                <div class="lg:col-span-4 space-y-3">
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                        Biểu Tượng Ứng Dụng (Logo)
                    </label>
                    <p class="text-xs text-[#718096]">Icon vuông cạnh tên sản phẩm.</p>

                    @if($product->logo_url)
                        <div class="flex items-center gap-3 p-3 rounded-2xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#101923]">
                            <img src="{{ $product->logo_url }}" alt="{{ $product->name }}" class="w-14 h-14 rounded-xl object-contain border border-[#E8EDF2] dark:border-[#1E2D3D] shadow-xs">
                            <label class="flex items-center gap-1.5 cursor-pointer text-xs text-rose-500 font-semibold">
                                <input type="checkbox" name="remove_logo" value="1" class="rounded border-rose-300 text-rose-500">
                                <span>Xóa logo</span>
                            </label>
                        </div>
                    @endif

                    <div class="mt-2 flex flex-col items-center justify-center p-5 border-2 border-dashed border-[#E8EDF2] dark:border-[#1E2D3D] hover:border-[#168BD2] rounded-2xl bg-[#F8FAFC] dark:bg-[#101923] transition-all relative group cursor-pointer" onclick="document.getElementById('logo_input_edit').click()">
                        <div id="logo_preview_box_edit" class="w-16 h-16 rounded-2xl overflow-hidden hidden mb-2 bg-white dark:bg-[#0B1118] border border-[#E8EDF2] flex items-center justify-center shadow-md">
                            <img id="logo_preview_img_edit" src="#" alt="Logo Preview" class="w-full h-full object-contain">
                        </div>
                        <div id="logo_placeholder_edit" class="flex flex-col items-center text-center">
                            <span class="text-xs font-bold text-[#172B3A] dark:text-white">{{ $product->logo_url ? 'Thay đổi Logo' : 'Tải Logo' }}</span>
                            <span class="text-[10px] text-[#718096]">Tỷ lệ 1:1</span>
                        </div>
                        <input type="file" id="logo_input_edit" name="logo" accept="image/*" class="hidden" onchange="previewFile(this, 'logo_preview_img_edit', 'logo_preview_box_edit', 'logo_placeholder_edit')">
                    </div>
                </div>
            </div>

            <!-- Existing Gallery Screenshots -->
            @if($product->images->count() > 0)
                <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-3">
                    <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                        Các Ảnh Chụp Màn Hình Đã Tải Lên ({{ $product->images->count() }} ảnh)
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        @foreach($product->images as $img)
                            <div class="relative group rounded-xl overflow-hidden border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#101923] p-1.5 shadow-2xs">
                                <img src="{{ $img->url }}" alt="{{ $img->caption }}" class="w-full h-28 object-cover rounded-lg">
                                <div class="p-1 text-[11px] truncate text-[#718096]">{{ $img->caption ?? 'Screenshot' }}</div>
                                <button type="button" onclick="deleteProductImage('{{ route('admin.products.images.destroy', [$product->id, $img->id]) }}')" class="absolute top-2 right-2 w-7 h-7 rounded-full bg-rose-500 text-white flex items-center justify-center text-xs opacity-0 group-hover:opacity-100 transition-opacity shadow-md hover:bg-rose-600" title="Xóa ảnh này">
                                    &times;
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Upload More Gallery Screenshots -->
            <div class="pt-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D] space-y-2">
                <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0]">
                    Tải Thêm Ảnh Chụp Màn Hình (Gallery Screenshots)
                </label>
                <input type="file" name="gallery_images[]" multiple accept="image/*" class="w-full text-xs text-[#718096] file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#168BD2]/10 file:text-[#168BD2] hover:file:bg-[#168BD2]/20 cursor-pointer">
            </div>
        </div>

        <!-- 3. Cấu Hình Tính Năng Nổi Bật (Card Bullet Points) -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <div class="flex items-center justify-between border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Tính Năng Nổi Bật (Dấu tích xanh trên thẻ)</span>
                </h3>
                <button type="button" onclick="addFeatureRow()" class="text-xs font-bold text-[#168BD2] hover:underline flex items-center gap-1">
                    <span>+ Thêm tính năng</span>
                </button>
            </div>

            <div id="features_container" class="space-y-3">
                @forelse($product->features as $idx => $feature)
                    <div class="grid grid-cols-12 gap-3 items-center feature-row">
                        <div class="col-span-11">
                            <input type="text" name="features[{{ $idx }}][title]" value="{{ $feature->title }}" placeholder="Nhập tính năng nổi bật..." class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                        </div>
                        <div class="col-span-1 text-center">
                            <button type="button" onclick="this.closest('.feature-row').remove()" class="text-rose-400 hover:text-rose-600 font-bold text-sm" title="Xóa">&times;</button>
                        </div>
                    </div>
                @empty
                    <div class="grid grid-cols-12 gap-3 items-center feature-row">
                        <div class="col-span-11">
                            <input type="text" name="features[0][title]" placeholder="Ví dụ: Tự động đăng bài hàng loạt lên 100+ Group Facebook" class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                        </div>
                        <div class="col-span-1 text-center">
                            <button type="button" onclick="this.closest('.feature-row').remove()" class="text-rose-400 hover:text-rose-600 font-bold text-sm" title="Xóa">&times;</button>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- 4. Trạng Thái & Điều Khiển -->
        <div class="lush-card p-6 sm:p-8 space-y-4">
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white border-b border-[#E8EDF2] dark:border-[#1E2D3D] pb-3">Phát Hành & Thứ Tự</h3>
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

        <div class="flex items-center justify-end gap-3 pt-4">
            <a href="{{ route('admin.products.index') }}" class="lush-btn-secondary !text-xs !py-2.5">Hủy bỏ</a>
            <button type="submit" class="lush-btn-primary !text-xs !py-2.5 shadow-lg shadow-[#168BD2]/25">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>Cập Nhật Thay Đổi</span>
            </button>
        </div>
    </form>
</div>

<!-- Hidden Delete Image Form -->
<form id="delete_image_form" method="POST" action="" class="hidden">
    @csrf
    @method('DELETE')
</form>

<script>
function previewFile(input, imgId, boxId, placeholderId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(imgId).src = e.target.result;
            document.getElementById(boxId).classList.remove('hidden');
            if (placeholderId) {
                document.getElementById(placeholderId).classList.add('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteProductImage(actionUrl) {
    if (confirm('Bạn có chắc chắn muốn xóa ảnh chụp màn hình này không?')) {
        const form = document.getElementById('delete_image_form');
        form.action = actionUrl;
        form.submit();
    }
}

let featIdx = {{ max($product->features->count(), 1) + 10 }};
function addFeatureRow() {
    const container = document.getElementById('features_container');
    const row = document.createElement('div');
    row.className = 'grid grid-cols-12 gap-3 items-center feature-row';
    row.innerHTML = `
        <div class="col-span-11">
            <input type="text" name="features[${featIdx}][title]" placeholder="Nhập tính năng nổi bật mới..." class="w-full px-4 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
        </div>
        <div class="col-span-1 text-center">
            <button type="button" onclick="this.closest('.feature-row').remove()" class="text-rose-400 hover:text-rose-600 font-bold text-sm" title="Xóa">&times;</button>
        </div>
    `;
    container.appendChild(row);
    featIdx++;
}
</script>
@endsection
