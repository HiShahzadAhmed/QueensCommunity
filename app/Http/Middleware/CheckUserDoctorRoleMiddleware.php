<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserDoctorRoleMiddleware
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

        if(Auth::User()->role == 'doctor' && Auth::User()->pmdc_no == '')
        {
            return redirect()->route('submit.doctor.detail')->withError('Please add your registration number to continue');
        }


        return $next($request);
    }
}
