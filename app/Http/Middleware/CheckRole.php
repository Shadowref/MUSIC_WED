<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  // role được truyền từ route
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Chưa đăng nhập
            return redirect('/login');
        }

        // Giả sử cột role trong users là kiểu 'admin', 'user', v.v.
        if (Auth::user()->role !== $role) {
            // Không đúng vai trò => về trang 403
            abort(403, 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
}
