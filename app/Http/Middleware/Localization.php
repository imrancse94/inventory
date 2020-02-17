<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Cookie;

class Localization
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
        if (Cookie::has('locale')) {
        App::setLocale(Cookie::get('locale'));
        }
        return $next($request);

    }
}
