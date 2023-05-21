<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClinicMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $clinic = $request->clinic;
        if ($user && $clinic->users()->find($user->id)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
