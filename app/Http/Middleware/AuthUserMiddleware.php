<?php

namespace App\Http\Middleware;

use Closure;

class AuthUserMiddleware
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
        $is_allow_access = false;

        $userId = session()->get("user_id");

        if (!is_null($userId)){
            $is_allow_access = true;
        }

        if (!$is_allow_access){
            return redirect()->to("/user/auth/signIn");
        }
        return $next($request);
    }
}
