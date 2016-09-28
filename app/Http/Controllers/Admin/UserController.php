<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {
    protected $user;

    public function __construct() {
        $this->user = new User();
    }

    public function index() {
        $data['users'] = $this->user->get_all_user();
        return view('admin.user.index', $data);
    }

    public function details($id) {
        $data = $this->user->get_one_user($id);
        if ($data['status']) {
            return view('admin.user.details', ['user' => $data['user']]);
        }
        return view('errors.common');
    }

    public function entry(Request $data_post) {
        $result_entry = $this->user->entry($data_post);
        if (!$result_entry['status']) {
            return redirect(route('user_entry'))->withErrors($result_entry['msg'])->withInput();
        } else {
            return redirect(route('user_details', ['id' => $result_entry['id_insert']]));
        }
    }

    public function show_edit($id) {
        $data = $this->user->get_one_user($id);
        if ($data['status']) {
            return view('admin.user.edit', ['user' => $data['user']]);
        }
        return view('errors.common');
    }

    public function do_edit(Request $data_post, $id) {
        $result_edit = $this->user->edit($data_post, $id);
        if ($result_edit['status']) {
            return redirect(route('user_details', ['id' => $id]));
        } else {
            return redirect(route('user_edit', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        }
    }

    public function delete($id) {
        $result_delete = $this->user->remove($id);
        if (!$result_delete['status']) {
            return view('errors.common');
        } else {
            return redirect(route('user_list'));
        }
    }

    public function show_active($id, $code) {
        $result_show = $this->user->before_active($id, $code);
        if ($result_show['status']) {
            return view('admin.site.active_account', ['id' => $id, 'code' => $code]);
        } else {
            return view('errors.common');
        }
    }

    public function do_active(Request $data_post, $id, $code) {
        $result_active = $this->user->do_active($data_post, $id, $code);
        if ($result_active['status']) {
            return redirect(route('admin_login'));
        } else {
            return redirect(route('active_account', ['id' => $id, 'code' => $code]))->withErrors($result_active['msg'])->withInput();
        }
    }

    public function image(Request $data_post, $id) {
        $result_edit = $this->user->edit_image($id, $data_post);
        if ($result_edit['status']) {
            return redirect(route('user_edit', ['id' => $id]));
        } else {
            if ($result_edit['msg'] == 'error_user') {
                return view('errors.common');
            } else {
                return redirect(route('user_edit', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
            }
        }
    }

    public function view_profile() {
        $data['user'] = Auth::user();
        return view('admin.user.profile.index',$data);
    }

    public function before_edit_profile(){
        $id = Auth::user()->id;
        $data = $this->user->get_one_user($id,'edit');
        if ($data['status']) {
            return view('admin.user.profile.edit', ['user' => $data['user']]);
        }
        return view('errors.common');
    }

    public function do_edit_profile(Request $data_post){
        $id = Auth::user()->id;
        $result_edit = $this->user->edit($data_post,$id);
        if ($result_edit['status']) {
            return redirect(route('profile_view'));
        } else {
            return redirect(route('profile_edit'))->withErrors($result_edit['msg'])->withInput();
        }
    }

    public function profile_image(Request $data_post) {
        $result_edit = $this->user->edit_image(NULL,$data_post);
        if ($result_edit['status']) {
            return redirect(route('profile_edit'));
        } else {
            if ($result_edit['msg'] == 'error_user') {
                return view('errors.common');
            } else {
                return redirect(route('profile_edit'))->withErrors($result_edit['msg'])->withInput();
            }
        }
    }
}
