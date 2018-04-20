<?php

namespace App\Http\Middleware;

use Closure;

class ConfigCokielang
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
        if (in_array($request->segment(1), config('app.all_langs'))) {
            if ($request->cookie('btc_lang') !== null) {
                if ($request->cookie('btc_lang') !== $request->segment(1)) {
                    \Cookie::forget('btc_lang');
                    \Cookie::queue('btc_lang', $request->segment(1), 'forever');
                }
            } else {
                \Cookie::queue('btc_lang', $request->segment(1), 'forever');
            }
        }
        return $next($request);
    }
}
