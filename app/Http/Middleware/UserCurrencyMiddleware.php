<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class UserCurrencyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!$request->get('currency') && !$request->getSession()->get('currency')) {
        $clientIP = $request->getClientIp();
        $localCurrency = geoip($clientIP)->getAttribute('currency');
        $isoCode = geoip($clientIP)->getAttribute('iso_code');
        $request->getSession()->put([
            'currency' => $localCurrency,
            'isoCode' => $isoCode
        ]);
        // }
        return $next($request);
    }
}
