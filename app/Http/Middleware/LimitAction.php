<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LimitAction
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
        $current_user = Auth::user();
        if($current_user->type_account == 2){
            Session::flash('msg','limited with account');
            return redirect(route('error_page'));
        }
        return $next($request);
    }
}
