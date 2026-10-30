<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCustomerController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->orderByDesc('created_at')->paginate(12)->withQueryString();

        return view('admin.customers.index', compact('users'));
    }

    public function toggleStatus(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Không thể tự khóa tài khoản của chính mình.');
        }

        $user->status = $user->status === 'active' ? 'blocked' : 'active';
        $user->save();

        ActivityLog::log('user_status_changed', "Đã thay đổi trạng thái tài khoản {$user->email} thành: {$user->status}");

        return back()->with('success', "Đã cập nhật trạng thái tài khoản {$user->name}.");
    }

    public function toggleRole(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Không thể tự thay đổi vai trò của chính mình.');
        }

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        ActivityLog::log('user_role_changed', "Đã thay đổi vai trò của {$user->email} thành: {$user->role}");

        return back()->with('success', "Đã thay đổi vai trò của {$user->name} thành: {$user->role}.");
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Không thể xóa tài khoản hiện tại.');
        }

        $email = $user->email;
        $user->delete();

        ActivityLog::log('user_deleted', "Đã xóa tài khoản người dùng: {$email}");

        return back()->with('success', "Đã xóa người dùng {$email}.");
    }
}
