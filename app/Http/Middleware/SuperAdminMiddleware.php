<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has 'super_admin' role
        if ($request->user() && $request->user()->hasRole('super_admin')) {
            // Redirect or return a response as desired
            return redirect()->route('admin.index')->with('error', 'Access denied for super_admin.');
        }

        return $next($request);
    }
}
