<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Role
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user == null)
            return redirect()->route('home');

        foreach ($roles as $role) {
            if ($user->role == $role)
                return $next($request);
        }
        return redirect()->route('home');
    }
}
