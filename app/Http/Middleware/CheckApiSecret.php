<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $authHeader = $request->header('Authorization') ?? '';

        if (!hash_equals('Bearer ' . config('app.secret_api'), $authHeader)) {
            return response('Forbidden', 403);
        }
        return $next($request);
    }
}
