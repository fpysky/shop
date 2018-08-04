<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfEmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->email_verified) {
            return response()->json(['status_code' => 400,'message' => '请先验证邮箱'], 400);
        }
        return $next($request);
    }
}
