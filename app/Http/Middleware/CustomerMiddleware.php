<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (!$request->user() || $request->user()->type !== 'customer') {
            return response()->json([
                'message' => 'Access is available for Customers only.'
            ], 403);
        }
        return $next($request);
    }
}
