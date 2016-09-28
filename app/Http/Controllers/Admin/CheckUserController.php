<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Nguyen Tuan Vu
 * Date: 25/08/2016
 * Time: 3:46 CH
 */
class CheckUserController extends Controller {
    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function login(Request $data_post) {
        $result_login = $this->user->login($data_post);
        if ($result_login['status']) {
            if (Session::has('url_continue')) {
                $url = Session::get('url_continue');
                return redirect(url($url));
            }
            return redirect(route('dashboard'));
        } else {
            return redirect(route('admin_login'))->withErrors($result_login['msg'])->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect(route('admin_login'))->with('msg', '<h4 style="color: green">Logged out. login to continue !</h4>');
    }

    public function remind_password(Request $data_post) {
        $result_remind = $this->user->remind_password($data_post);
        if (!$result_remind['status']) {
            return redirect(route('remind_password'))->withErrors($result_remind['msg'])->withInput();
        }
        return redirect(route('remind_password'));
    }

    public function show_reset_password($id, $code) {
        $result_reset = $this->user->before_reset_password($id, $code);
        $data['user'] = $result_reset['user'];
        if ($result_reset['status']) {
            return view('admin/site/reset_password', $data);
        } else {
            return view('errors/common');
        }
    }

    public function do_reset_password(Request $data_post, $id, $code) {
        $result_reset = $this->user->do_reset_password($data_post, $id, $code);
        if ($result_reset['status']) {
            return redirect(route('admin_login'));
        } else {
            return redirect(route('reset_password', ['id' => $id, 'code' => $code]))->withErrors($result_reset['msg'])->withInput();
        }
    }
}