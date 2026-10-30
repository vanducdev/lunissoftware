@extends('layouts.admin')

@section('page_title', 'Quản Lý Danh Mục Sản Phẩm')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Danh Mục Phần Mềm</h2>
        <p class="text-xs text-[#718096]">Phân loại sản phẩm để khách hàng dễ dàng tìm kiếm và khám phá</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Create Category Form (Left) -->
        <div class="lg:col-span-4">
            <div class="lush-card p-6">
                <h3 class="text-sm font-bold text-[#172B3A] dark:text-white mb-4">Thêm Danh Mục Mới</h3>
                <form method="POST" action="{{ route('admin.product-categories.store') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Tên danh mục <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" required placeholder="Ví dụ: Tự Động Hóa Marketing" class="w-full px-3 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Mô tả ngắn</label>
                        <textarea name="description" rows="3" placeholder="Mô tả nhóm giải pháp..." class="w-full px-3 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-[#172B3A] dark:text-[#E2E8F0] mb-1.5">Thứ tự hiển thị</label>
                        <input type="number" name="order" value="1" class="w-full px-3 py-2 rounded-xl border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs focus:outline-none focus:border-[#168BD2]">
                    </div>

                    <button type="submit" class="lush-btn-primary w-full !text-xs !py-2.5 !justify-center">
                        Tạo Danh Mục
                    </button>
                </form>
            </div>
        </div>

        <!-- Category List (Right) -->
        <div class="lg:col-span-8">
            <div class="lush-card overflow-hidden">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                        <tr>
                            <th class="px-6 py-3.5 font-bold">Thứ tự</th>
                            <th class="px-6 py-3.5 font-bold">Tên danh mục</th>
                            <th class="px-6 py-3.5 font-bold">Slug</th>
                            <th class="px-6 py-3.5 font-bold">Số sản phẩm</th>
                            <th class="px-6 py-3.5 font-bold text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                        @forelse($categories as $cat)
                            <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                                <td class="px-6 py-4 font-bold text-[#168BD2]">{{ $cat->order }}</td>
                                <td class="px-6 py-4 font-bold text-[#172B3A] dark:text-white">{{ $cat->name }}</td>
                                <td class="px-6 py-4 text-[#718096] font-mono">{{ $cat->slug }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-[#168BD2]/10 text-[#168BD2]">
                                        {{ $cat->products_count }} sản phẩm
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.product-categories.destroy', $cat->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 rounded-lg border border-[#E8EDF2] text-rose-500 hover:bg-rose-50" title="Xóa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-[#718096]">Chưa có danh mục nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

