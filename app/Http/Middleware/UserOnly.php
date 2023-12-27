<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->level == 0) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
