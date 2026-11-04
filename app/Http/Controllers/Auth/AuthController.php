<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Hiển thị trang đăng nhập Quản trị viên (/lush-admin).
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            if (Auth::user()->canAccessAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
        }

        return view('auth.login');
    }

    /**
     * Xử lý xác thực đăng nhập Quản trị viên.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if (! $user->isActive()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Tài khoản Quản trị viên của bạn đã bị khóa. Vui lòng liên hệ hỗ trợ.',
                ])->onlyInput('email');
            }

            if (! $user->canAccessAdmin()) {
                Auth::logout();

                return back()->withErrors([
                    'email' => 'Tài khoản này không có quyền truy cập khu vực Quản trị viên.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();
            ActivityLog::log('admin_login', 'Quản trị viên đăng nhập thành công vào hệ thống LushAdmin.', $user);

            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập Quản trị viên không chính xác.',
        ])->onlyInput('email');
    }

    /**
     * Đăng xuất khỏi hệ thống Quản trị và quay lại /lush-admin.
     */
    public function logout(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            ActivityLog::log('admin_logout', 'Quản trị viên đã đăng xuất khỏi hệ thống.', Auth::user());
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Bạn đã đăng xuất an toàn khỏi hệ thống quản trị.');
    }

    /**
     * Vô hiệu hóa trang đăng ký công khai -> chuyển hướng về trang chủ.
     */
    public function showRegisterForm(): RedirectResponse
    {
        return redirect()->route('home');
    }

    /**
     * Vô hiệu hóa hành động đăng ký công khai -> chuyển hướng về trang chủ.
     */
    public function register(Request $request): RedirectResponse
    {
        return redirect()->route('home');
    }

    public function showForgotForm(): View
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $request->validate(['email' => ['required', 'email']]);

        return back()->with('status', 'Nếu địa chỉ email tồn tại trên hệ thống, hướng dẫn đặt lại mật khẩu đã được gửi đến hộp thư của bạn.');
    }
}
