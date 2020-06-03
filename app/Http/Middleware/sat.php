<?php

namespace App\Http\Middleware;

use Closure;

class sat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user = session()->get("userObj");
        //dd($user);
        if (session()->has("userObj")) {
                $rol = $user->rol; 
            if ($rol == null || $rol != 2 && $rol != 1) {
                return redirect()->to('errors');
            } else {
                return $next($request);
            }
        } else{
            return redirect()->to('errors');
        }
    }
}
