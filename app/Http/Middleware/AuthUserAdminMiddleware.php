<?php

namespace App\Http\Middleware;

use App\Entity\User;
use Closure;

class AuthUserAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $is_allow_access = false;

        $userId = session()->get("user_id");

        if (!is_null($userId)) {
            $user = User::findOrFail($userId);

            if ($user->type == "A") {
                $is_allow_access = true;
            }
        }

        if (!$is_allow_access) {
            return redirect()->to("/");
        }

        return $next($request);
    }
}
