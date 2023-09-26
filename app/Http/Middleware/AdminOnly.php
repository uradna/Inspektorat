<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user->level == 1) {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
