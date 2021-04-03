<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('login_status')!=true){
            return redirect('log in');
        }
        return $next($request);
    }
}