<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        $domains = ['http://localhost:3000','http://hydrasuccess.jumpittlabs.cl'];
        if (isset($request->server()['HTTP_ORIGIN'])) {
            $origin = $request->server()['HTTP_ORIGIN'];
            if (in_array($origin, $domains)) {
                header('Access-Control-Allow-Origin: ' . $origin);
                header('Access-Control-Expose-Headers: Access-Token, Uid, filename');
                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Requested-With');
            }
        }
        return $next($request);
    }
}
