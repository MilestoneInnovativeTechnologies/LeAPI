<?php

namespace Milestone\LeAPI\Middleware;

use Closure;
use Illuminate\Http\Request;

class LeAPIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $CLIENTS = config('leapi.CLIENTS');
        $clients = array_keys($CLIENTS); $client = $request->route('client');
        if(!in_array($client,$clients)) return response('Unauthorized',401);
        define('CLIENT',$CLIENTS[$client]); define('CLIENT_ID',$client);
        define('ACTION',$request->route('action')); define('TABLE',$request->route('table'));
        return $next($request);
    }
}
