<?php

namespace App\Http\Middleware;

use auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = auth()->user();
        $userIdToEdit = $request->route('user')->id;

        if ($currentUser->id == $userIdToEdit) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
