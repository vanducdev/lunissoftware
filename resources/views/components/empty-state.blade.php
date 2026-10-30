@props([
    'title' => 'Không tìm thấy dữ liệu',
    'description' => 'Hiện tại chưa có bản ghi nào trong mục này hoặc bộ lọc không khớp.',
    'actionText' => null,
    'actionUrl' => null,
])

<div class="lush-card p-12 text-center flex flex-col items-center justify-center">
    <div class="w-16 h-16 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] dark:bg-[#168BD2]/20 flex items-center justify-center mb-4">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
        </svg>
    </div>
    <h3 class="text-base font-bold text-[#172B3A] dark:text-white mb-1.5">{{ $title }}</h3>
    <p class="text-xs text-[#718096] dark:text-[#94A3B8] max-w-md leading-relaxed mb-6">{{ $description }}</p>
    @if($actionText && $actionUrl)
        <a href="{{ $actionUrl }}" class="lush-btn-primary !text-xs !py-2.5 !px-5">
            {{ $actionText }}
        </a>
    @endif
</div>

