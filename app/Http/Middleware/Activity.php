<?php
/**
 * Created by PhpStorm.
 * User: cash
 * Date: 2018/02/15
 * Time: 00:11
 */

namespace App\Http\Middleware;


use Closure;

class Activity
{
    // before
//    public function handle($request,Closure $next)
//    {
//        if (time() < strtotime("2018-02-14")){
//            return redirect("activity");
//        }
//
//        return $next($request);
//    }

    // after
    public function handle($request,Closure $next)
    {
        $response = $next($request);
        echo($response);

        // logic
        echo "after handle";

        return $response;
    }
}