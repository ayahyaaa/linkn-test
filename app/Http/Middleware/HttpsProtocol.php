<?php

namespace MyApp\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocol1 {

    public function handle($request, Closure $next)
    {
            if (!$request->secure() && App::environment() === 'production') {
                return redirect()->secure($request->getRequestUri());
            }
            $request->setTrustedProxies( [ $request->getClientIp() ] ); 
            return $next($request); 
    }
}