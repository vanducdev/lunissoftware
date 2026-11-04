<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->guest(route('admin.login'))->with('error', 'Vui lòng đăng nhập quyền Quản trị viên để truy cập.');
        }

        if (! auth()->user()->canAccessAdmin()) {
            abort(403, 'Bạn không có quyền truy cập vào khu vực quản trị.');
        }

        if (! auth()->user()->isActive()) {
            auth()->logout();

            return redirect()->route('admin.login')->with('error', 'Tài khoản của bạn đã bị khóa.');
        }

        return $next($request);
    }
}
