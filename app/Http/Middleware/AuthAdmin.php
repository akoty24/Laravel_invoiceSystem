<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            if($request->user()->role=='ADM'){
                return $next($request);
            }else{
                return redirect()->route('login.page')->with('You do not have any permission to access this page');
            }
        } else {
            return redirect()->route('login.page')->with('login to access the website info');
        }
        return $next($request);
    }
}
