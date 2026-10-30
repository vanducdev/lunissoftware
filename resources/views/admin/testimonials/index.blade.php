@extends('layouts.admin')

@section('page_title', 'Quản Lý Đánh Giá Khách Hàng')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Cảm Nhận & Đánh Giá Khách Hàng</h2>
            <p class="text-xs text-[#718096]">Quản lý ý kiến đánh giá hiển thị trên trang chủ của LushSoftware</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="lush-btn-primary !text-xs !py-2.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Thêm Đánh Giá Mới</span>
        </a>
    </div>

    <div class="lush-card overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                <tr>
                    <th class="px-6 py-3.5 font-bold">Thứ tự</th>
                    <th class="px-6 py-3.5 font-bold">Khách hàng</th>
                    <th class="px-6 py-3.5 font-bold">Chức danh / Công ty</th>
                    <th class="px-6 py-3.5 font-bold">Đánh giá</th>
                    <th class="px-6 py-3.5 font-bold">Trạng thái</th>
                    <th class="px-6 py-3.5 font-bold text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                @forelse($testimonials as $t)
                    <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                        <td class="px-6 py-4 font-bold text-[#168BD2]">{{ $t->order }}</td>
                        <td class="px-6 py-4 font-bold text-[#172B3A] dark:text-white">{{ $t->name }}</td>
                        <td class="px-6 py-4 text-[#718096]">{{ $t->position }} - {{ $t->company }}</td>
                        <td class="px-6 py-4 text-amber-500 font-bold">{{ $t->rating }} ★</td>
                        <td class="px-6 py-4">
                            @if($t->is_active)
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Hiển thị</span>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200">Ẩn</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="p-1.5 rounded-lg border border-[#E8EDF2] text-[#718096] hover:text-[#168BD2]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form method="POST" action="{{ route('admin.testimonials.destroy', $t->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 rounded-lg border border-[#E8EDF2] text-rose-500 hover:bg-rose-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-[#718096]">Chưa có đánh giá nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
