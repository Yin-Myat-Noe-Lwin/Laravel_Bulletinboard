<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $currentUser = auth()->user();
        $userIdToEdit = $request->route('user')->id;

        if ($currentUser->role === 'admin' || $currentUser->id == $userIdToEdit) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
