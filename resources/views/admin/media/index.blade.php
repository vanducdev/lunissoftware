@extends('layouts.admin')

@section('title', 'Thư viện Tệp tin & Media')
@section('page_title', 'Thư viện Tệp tin (Media Library)')

@section('content')
<div class="space-y-6">
    <!-- Top Stats & Upload Bar -->
    <div class="lush-card p-6">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div class="flex items-center gap-6">
                <div>
                    <span class="text-xs text-[#718096] uppercase font-semibold">Tổng số tệp</span>
                    <p class="text-xl font-bold text-[#172B3A] dark:text-white">{{ number_format($totalCount) }}</p>
                </div>
                <div class="border-l border-[#E8EDF2] dark:border-[#1E2D3D] pl-6">
                    <span class="text-xs text-[#718096] uppercase font-semibold">Dung lượng sử dụng</span>
                    <p class="text-xl font-bold text-[#168BD2]">
                        {{ $totalBytes >= 1048576 ? number_format($totalBytes / 1048576, 2) . ' MB' : number_format($totalBytes / 1024, 1) . ' KB' }}
                    </p>
                </div>
            </div>

            <!-- Upload Form -->
            <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data" class="flex flex-wrap items-center gap-2">
                @csrf
                <input type="file" name="file" required accept="image/*,.pdf" id="media-upload-input" class="hidden" onchange="this.form.submit()">
                <button type="button" onclick="document.getElementById('media-upload-input').click()" class="lush-btn-primary !text-xs !py-2.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    Tải Lên Tệp Mới
                </button>
            </form>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="lush-card p-4">
        <form method="GET" action="{{ route('admin.media.index') }}" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
            <div class="flex-1 w-full flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên file hoặc mô tả..." class="lush-input text-xs">
                <select name="type" class="lush-input !w-auto text-xs" onchange="this.form.submit()">
                    <option value="">Tất cả loại</option>
                    <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Chỉ hình ảnh</option>
                </select>
                <button type="submit" class="lush-btn-secondary !text-xs !py-2">Tìm</button>
            </div>
            @if(request()->anyFilled(['search', 'type']))
                <a href="{{ route('admin.media.index') }}" class="text-xs text-[#168BD2] hover:underline whitespace-nowrap">Xóa bộ lọc</a>
            @endif
        </form>
    </div>

    <!-- Media Grid -->
    @if($mediaFiles->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($mediaFiles as $media)
                <div class="lush-card p-3 flex flex-col justify-between group relative overflow-hidden">
                    <div class="aspect-square rounded-lg bg-[#F8FAFC] dark:bg-[#101923] flex items-center justify-center overflow-hidden mb-2 border border-[#E8EDF2] dark:border-[#1E2D3D] relative">
                        @if($media->isImage())
                            <img src="{{ $media->url }}" alt="{{ $media->alt_text }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200">
                        @else
                            <svg class="w-10 h-10 text-[#718096]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        @endif

                        <!-- Hover Actions Overlay -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <button type="button" onclick="navigator.clipboard.writeText('{{ $media->url }}'); window.showToast('Đã sao chép link tệp!', 'success');" class="p-1.5 rounded-lg bg-white/90 text-[#172B3A] hover:bg-white" title="Sao chép Link">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            </button>
                            <form method="POST" action="{{ route('admin.media.destroy', $media) }}" onsubmit="return confirm('Bạn có chắc muốn xóa tệp này?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg bg-rose-600 text-white hover:bg-rose-700" title="Xóa tệp">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-[#172B3A] dark:text-white truncate" title="{{ $media->original_name }}">
                            {{ $media->original_name }}
                        </p>
                        <div class="flex items-center justify-between text-[10px] text-[#718096] mt-1">
                            <span>{{ $media->formatted_size }}</span>
                            @if($media->width && $media->height)
                                <span>{{ $media->width }}x{{ $media->height }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($mediaFiles->hasPages())
            <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
                {{ $mediaFiles->links() }}
            </div>
        @endif
    @else
        <div class="lush-card p-12 text-center">
            <div class="w-16 h-16 rounded-2xl bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-sm font-bold text-[#172B3A] dark:text-white mb-1">Chưa có tệp tin nào trong thư viện</h3>
            <p class="text-xs text-[#718096] mb-4">Nhấn nút "Tải Lên Tệp Mới" ở trên để tải hình ảnh giao diện phần mềm hoặc tài liệu.</p>
        </div>
    @endif
</div>
@endsection

