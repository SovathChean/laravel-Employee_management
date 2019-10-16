<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Middleware\Authenticate;
use Auth;

class isAdmin
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
         $user= Auth::user();

         if(!($user->isAdmin()))
         {
           return redirect('/admin');
         }
        
        return $next($request);
    }
}
