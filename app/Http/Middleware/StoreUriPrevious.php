<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class StoreUriPrevious
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function no_store_uri() {
        return [
            route('auth.login')
        ];
    }

    public function handle(Request $request, Closure $next)
    {
        if (!in_array(url()->current(), $this->no_store_uri()) )
            Cookie::queue('back_uri', url()->current());

        return $next($request);
    }
}
