<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class EnsureApiKeyIsValid {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if (!$key = $request->get('apikey') or $key !== env('MIX_API_KEY')) {
            return response("Unauthorized", 401);
        }
        return $next($request);
    }
}
