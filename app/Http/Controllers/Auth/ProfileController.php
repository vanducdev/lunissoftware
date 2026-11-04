<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $logs = ActivityLog::where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->take(15)
            ->get();

        $orders = Order::where(function ($q) use ($user) {
            $q->where('user_id', $user->id)
                ->orWhere('customer_email', $user->email);
        })->with('product')->orderByDesc('created_at')->get();

        return view('auth.profile', compact('user', 'logs', 'orders'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:30'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $path;
        }

        $user->update($validated);

        ActivityLog::log('profile_updated', 'Cập nhật thông tin tài khoản cá nhân.', $user);

        return back()->with('success', 'Thông tin cá nhân đã được cập nhật thành công.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        ActivityLog::log('password_changed', 'Thay đổi mật khẩu tài khoản thành công.', $user);

        return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
