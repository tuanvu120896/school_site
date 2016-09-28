<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class CheckLogin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!Auth::check()) {
            $current_url = $request->path();
            Session::put('url_continue', $current_url);
            return redirect(route('admin_login'));
        } else {
            $current_user = Auth::user();
            if ($current_user->active == 0) {
                Auth::logout();
                $msg = '<p  class="text-danger">Account is inactive,To continue please go to email : <a href="https://mail.google.com">'.$current_user->email.'</a> to active now.</p>';
                Session::flash('msg',$msg);
                return redirect(route('error_page'));
            }
            if ($current_user->type_account == 3) {
                Auth::logout();
                Session::flash('msg', 'account has been locked');
                return redirect(route('error_page'));
            }
        }
        return $next($request);
    }
}
