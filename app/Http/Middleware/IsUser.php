<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            $usertype = User::findOrFail(Auth::user()->id);
            if($usertype->usertype == 0)
            {
                \session('IsUser', true);
                return $next($request);
            }
        }
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
