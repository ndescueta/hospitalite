<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //KAPAG MAY SESSION PA UNG MIDDLEWARE
        switch ($guard) {
            //REDIRECT BALIK SA ADMIN HOME PAG PUMUNTA SYA SA LOGIN NA MERON PANG SESSION
            case 'admin' :
                if (Auth::guard($guard)->check()) {
                    return redirect('admin/trainings');
                }
                break;
            //REDIRECT SA USERS ACCOUNT PAG PUMUNTA SA LOGIN
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('hosp/home');
                }
                break;
        }

        return $next($request);
    }
}
