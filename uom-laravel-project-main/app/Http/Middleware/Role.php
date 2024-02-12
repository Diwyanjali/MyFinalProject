<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user()->role !== $role) {
            if ($request->user()->role === 'admin') {
                return redirect(route('admin.dashboard'));
            } else if ($request->user()->role === 'user') {
                return redirect(route('user.dashboard'));
            } else if ($request->user()->role === 'doctor') {
                return redirect(route('doctor.dashboard'));
            }
        }
        return $next($request);
    }
}
