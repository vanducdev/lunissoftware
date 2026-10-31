{{-- Product SEO Configuration Card --}}
@props(['product' => null])

@php
    $currentFocus = old('focus_keyword', $product->focus_keyword ?? '');
    $currentSeoTitle = old('seo_title', $product->seo_title ?? '');
    $currentSeoDesc = old('seo_description', $product->seo_description ?? '');
    $currentSeoKeys = old('seo_keywords', $product->seo_keywords ?? '');
    $currentCanonical = old('canonical_url', $product->canonical_url ?? '');
    $currentRobots = old('robots_meta', $product->robots_meta ?? 'index, follow');
@endphp

<div class="lush-card p-6 sm:p-8 space-y-4 border border-[#168BD2]/20">
    <div class="flex items-center justify-between pb-3 border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-[#168BD2]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white">Cấu Hình Siêu Dữ Liệu SEO Google Sản Phẩm</h3>
        </div>
        <span class="text-[10px] font-bold text-[#168BD2] bg-[#168BD2]/10 px-2 py-0.5 rounded-full uppercase tracking-wider">Top 1 Search Engine</span>
    </div>

    <!-- Live Google Snippet Preview -->
    <div class="p-4 rounded-xl border border-slate-200 dark:border-slate-800 bg-[#F8FAFC] dark:bg-[#0B1118] space-y-1">
        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Xem trước kết quả tìm kiếm Google</span>
        <div class="text-[11px] text-[#4D5156] dark:text-[#9AA0A6] truncate">
            {{ url('/products') }}/<span class="text-[#168BD2]">{{ $product->slug ?? 'ten-san-pham-phan-mem' }}</span>
        </div>
        <h4 id="prod-preview-title" class="text-base font-medium text-[#1A0DAB] dark:text-[#8AB4F8] truncate">
            {{ $currentSeoTitle ?: ($product->name ?? 'Tên phần mềm chuyên nghiệp – LushSoftware') }}
        </h4>
        <p id="prod-preview-desc" class="text-xs text-[#4D5156] dark:text-[#BDC1C6] line-clamp-2">
            {{ $currentSeoDesc ?: ($product->tagline ?? $product->description ?? 'Mô tả giải pháp phần mềm tự động hóa tiếp thị hàng đầu Việt Nam...') }}
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Từ Khóa Mục Tiêu (Focus Keyword)</label>
            <input type="text" name="focus_keyword" value="{{ $currentFocus }}" placeholder="VD: phần mềm crm, lush marketing..." class="w-full px-4 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
        </div>

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">SEO Title (Tiêu Đề Tìm Kiếm)</label>
            <input type="text" id="prod_seo_title" name="seo_title" value="{{ $currentSeoTitle }}" placeholder="Để trống sẽ dùng tên phần mềm" class="w-full px-4 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
        </div>
    </div>

    <div>
        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Meta Description (Mô Tả Google - Tối ưu 120-160 ký tự)</label>
        <textarea id="prod_seo_desc" name="seo_description" rows="2" placeholder="Tóm tắt tính năng vượt trội, lợi ích và lý do khách hàng nên chọn phần mềm..." class="w-full px-4 py-2.5 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">{{ $currentSeoDesc }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">SEO Keywords</label>
            <input type="text" name="seo_keywords" value="{{ $currentSeoKeys }}" placeholder="phan mem nuoi nick, zalo automation..." class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
        </div>

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Chỉ thị Robots Meta</label>
            <select name="robots_meta" class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
                <option value="index, follow" {{ $currentRobots === 'index, follow' ? 'selected' : '' }}>index, follow (Khuyến nghị)</option>
                <option value="noindex, follow" {{ $currentRobots === 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
                <option value="noindex, nofollow" {{ $currentRobots === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
            </select>
        </div>

        <div>
            <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1">Canonical URL (Nếu có)</label>
            <input type="url" name="canonical_url" value="{{ $currentCanonical }}" placeholder="https://..." class="w-full px-3 py-2 rounded-xl border border-[#CBD5E1] dark:border-[#2D3F52] bg-white dark:bg-[#14202E] text-xs text-[#172B3A] dark:text-white focus:outline-none focus:border-[#168BD2]">
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleIn = document.getElementById('prod_seo_title');
    const descIn = document.getElementById('prod_seo_desc');
    const nameIn = document.querySelector('input[name="name"]');
    const prevTitle = document.getElementById('prod-preview-title');
    const prevDesc = document.getElementById('prod-preview-desc');

    function updateProdPreview() {
        if (prevTitle) prevTitle.textContent = (titleIn?.value || nameIn?.value || 'Tên phần mềm chuyên nghiệp') + ' – LushSoftware';
        if (prevDesc && descIn?.value) prevDesc.textContent = descIn.value;
    }

    [titleIn, descIn, nameIn].forEach(el => {
        if (el) el.addEventListener('input', updateProdPreview);
    });
});
</script>
