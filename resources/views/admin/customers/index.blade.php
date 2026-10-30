@extends('layouts.admin')

@section('page_title', 'Quản Lý Khách Hàng & Người Dùng')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl font-bold text-[#172B3A] dark:text-white">Tài Khoản Thành Viên & Khách Hàng</h2>
        <p class="text-xs text-[#718096]">Quản lý danh sách người dùng, phân quyền quản trị và kiểm soát trạng thái truy cập</p>
    </div>

    <!-- Filter Bar -->
    <div class="lush-card p-4">
        <form method="GET" action="{{ route('admin.customers.index') }}" class="grid grid-cols-1 sm:grid-cols-12 gap-3">
            <div class="sm:col-span-6 relative">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Tìm theo tên, email hoặc số điện thoại..." class="w-full pl-9 pr-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                <svg class="w-4 h-4 text-[#718096] absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="sm:col-span-3">
                <select name="role" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả vai trò</option>
                    <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Quản trị viên (Admin)</option>
                    <option value="user" {{ request('role') === 'user' ? 'selected' : '' }}>Thành viên (Member)</option>
                </select>
            </div>
            <div class="sm:col-span-3">
                <select name="status" onchange="this.form.submit()" class="w-full px-3 py-2 rounded-lg border border-[#E8EDF2] dark:border-[#1E2D3D] bg-white dark:bg-[#0B1118] text-xs">
                    <option value="">Tất cả trạng thái</option>
                    <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="blocked" {{ request('status') === 'blocked' ? 'selected' : '' }}>Bị khóa</option>
                </select>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="lush-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F8FAFC] dark:bg-[#0B1118] text-[#718096] uppercase border-b border-[#E8EDF2] dark:border-[#1E2D3D]">
                    <tr>
                        <th class="px-6 py-3.5 font-bold">Người dùng</th>
                        <th class="px-6 py-3.5 font-bold">Số điện thoại</th>
                        <th class="px-6 py-3.5 font-bold">Vai trò</th>
                        <th class="px-6 py-3.5 font-bold">Trạng thái</th>
                        <th class="px-6 py-3.5 font-bold">Ngày đăng ký</th>
                        <th class="px-6 py-3.5 font-bold text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E8EDF2] dark:divide-[#1E2D3D]">
                    @forelse($users as $u)
                        <tr class="hover:bg-[#F8FAFC] dark:hover:bg-[#1A2634] transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $u->avatar_url }}" alt="{{ $u->name }}" class="w-8 h-8 rounded-full object-cover">
                                    <div>
                                        <p class="font-bold text-[#172B3A] dark:text-white">{{ $u->name }}</p>
                                        <p class="text-[11px] text-[#718096]">{{ $u->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[#718096] font-mono">{{ $u->phone ?: 'Chưa cập nhật' }}</td>
                            <td class="px-6 py-4">
                                @if($u->isAdmin())
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-[#168BD2]/10 text-[#168BD2] border border-[#168BD2]/20">Administrator</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300">Khách hàng</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($u->isActive())
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Hoạt động</span>
                                @else
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 border border-rose-200">Đã khóa</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-[#718096]">{{ $u->created_at->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Toggle status -->
                                    <form method="POST" action="{{ route('admin.customers.toggle-status', $u->id) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2.5 py-1 text-[11px] font-semibold rounded-lg border {{ $u->isActive() ? 'border-amber-200 text-amber-600 hover:bg-amber-50' : 'border-emerald-200 text-emerald-600 hover:bg-emerald-50' }}" title="{{ $u->isActive() ? 'Khóa tài khoản' : 'Mở khóa' }}">
                                            {{ $u->isActive() ? 'Khóa' : 'Mở' }}
                                        </button>
                                    </form>

                                    <!-- Toggle role -->
                                    <form method="POST" action="{{ route('admin.customers.toggle-role', $u->id) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2.5 py-1 text-[11px] font-semibold rounded-lg border border-[#E8EDF2] text-[#718096] hover:text-[#168BD2] hover:border-[#168BD2]" title="Chuyển quyền">
                                            {{ $u->isAdmin() ? 'Hạ quyền' : 'Nâng Admin' }}
                                        </button>
                                    </form>

                                    <!-- Delete -->
                                    <form method="POST" action="{{ route('admin.customers.destroy', $u->id) }}" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 rounded-lg border border-[#E8EDF2] text-rose-500 hover:bg-rose-50" title="Xóa">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-[#718096]">Không tìm thấy người dùng phù hợp.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-[#E8EDF2] dark:border-[#1E2D3D]">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection

