<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取cookie
        $name = \Cookie::get('name');
        if(empty($name)){    
           return redirect('/admin/login');
        }
        return $next($request);
       
    }
}
