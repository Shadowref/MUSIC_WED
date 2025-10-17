<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
   public function handle(Request $request, Closure $next)
    {
        // Kiểm tra người dùng đã đăng nhập và có quyền admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Nếu không phải admin, chuyển hướng về trang chủ với thông báo lỗi
        return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
    }
}
