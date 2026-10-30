@extends('layouts.admin')

@section('page_title', 'Quản Lý Sản Phẩm')

@section('content')
<div class="space-y-6">
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Danh Sách Sản Phẩm Phần Mềm</h2>
            <p class="text-xs text-[#718096]">Quản lý thông tin, tính năng, bảng giá và trạng thái hiển thị của các sản phẩm LushSoftware</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="lush-btn-primary !text-xs !py-2.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Thêm Sản Phẩm Mới</span>
        </a>
    </div>

    <!-- Filter Bar -->
    <div class="lush-card p-4">
        <form method="GET" action="{{ route('admin.products.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3">
            <div class="sm:col-span-5 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm theo tên sản phẩm hoặc tagline..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                <svg class="w-4 h-4 text-[#718096] absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="sm:col-span-4">
                <select name="category" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả danh mục</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-3">
                <select name="status" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả trạng thái</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Đã xuất bản (Published)</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Bản nháp (Draft)</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Product Table -->
    <div class="lush-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <tr>
                        <th class="px-6 py-3.5 font-bold">Sản phẩm</th>
                        <th class="px-6 py-3.5 font-bold">Danh mục</th>
                        <th class="px-6 py-3.5 font-bold">Phiên bản</th>
                        <th class="px-6 py-3.5 font-bold">Lượt xem</th>
                        <th class="px-6 py-3.5 font-bold">Trạng thái</th>
                        <th class="px-6 py-3.5 font-bold text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                    @forelse($products as $p)
                        <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-[#168BD2]/10 text-[#168BD2] flex items-center justify-center font-bold">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                    </div>
                                    <div>
                                        <a href="{{ route('products.show', $p->slug) }}" target="_blank" class="font-bold text-[#172B3A] dark:text-white hover:text-[#168BD2] text-sm">
                                            {{ $p->name }}
                                        </a>
                                        <p class="text-[11px] text-[#718096] line-clamp-1">{{ $p->tagline }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[#718096] font-medium">{{ $p->category->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 font-mono font-semibold text-[#168BD2]">{{ $p->version }}</td>
                            <td class="px-6 py-4 text-[#718096]">{{ number_format($p->view_count) }}</td>
                            <td class="px-6 py-4">
                                @if($p->status === 'published')
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Xuất bản</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">Bản nháp</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.products.edit', $p->id) }}" class="p-1.5 rounded-lg border border-[#E8EDF2] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2]" title="Chỉnh sửa">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $p->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg border border-[#E8EDF2] text-rose-500 hover:bg-rose-50" title="Xóa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-[#718096]">Chưa có sản phẩm nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
