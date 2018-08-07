<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $level)
     {
         if(Auth::check()){
             $user = Auth::user();
             $intlevel = (int)$level;
             // var_dump($intlevel);exit();
             if ( $user && $user->level != $intlevel){
                 return App::Abort(Auth::check()? 403 : 401,
                 Auth::check()? 'Forbidden, You cant access this Page' : 'Unauthorizred');
                 // return redirect('/');
             }
             return $next($request);
         }else{
             return redirect('/');
         }

     }
}
