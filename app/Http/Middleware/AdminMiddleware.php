<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        // if(Auth::check()){
        //     if(Auth::user()->user_type == 'admin'){
        //         return $next($request);

        //     }else{
        //         // jodi login admin na hoi...
        //         return redirect('/user/dashboard')->with('message','You are not admin');
        //     }
            
        // }else{
        //     return redirect('/login')->with('message','login access the website info');
        // }

            if(Auth::user()->user_type == 'admin'){
                return $next($request);

            }else{
                // jodi login admin na hoi...
                session()->flush();
                return redirect('login');
            }

        




        return $next($request);
    }
}
