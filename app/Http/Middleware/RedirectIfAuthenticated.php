<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if ($guard === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            // Chuyển hướng đến trang chủ sau khi đăng nhập thành công
            return redirect()->route('home');  // Hoặc route phù hợp của bạn
        }

        return $next($request);
    }
}
