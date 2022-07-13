<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next,...$g)
    {
    //    if (Auth::user()->role_id == 1){
    //        return redirect()->route('admin.login');
    //    }
    //    else{
    //        return redirect()->route('admin.main');
    //    }
    if (!Auth::check()) {
        return redirect()->route('admin.login');
    }
    return $next($request);

    }

}
