<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'activation_code', 'forgotten_password_code', 'forgotten_password_time','address',
        'remember_token', 'phone', 'birthday', 'active', 'gender', 'created_at', 'updated_at', 'image', 'type_account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    private function _role_validate() {
        return [
            'name' => 'required|min:3',
            'type_account' => 'required',
            'email' => 'required|email|unique:users',
        ];
    }

    public function get_one_user($id,$type = 'check') {
        if($type !== 'check'){
            $user = $this->where('id', $id)->first();
        }else {
            $user = $this->where('type_account', '!=', 0)->where('id', $id)->first();
        }
        if (count($user) == 0) {
            $status = FALSE;
            Session::flash('msg', 'User not found');
        } else {
            $status = TRUE;
        }
        return [
            'status' => $status,
            'user' => $user
        ];
    }

    public function get_all_user() {
        $users = $this->where('type_account', '!=', 0)->orderBy('id', 'DESC')->get();
        return $users;
    }

    public function entry($data) {
        $msg = NULL;
        $id_insert = NULL;
        $validator = Validator::make($data->all(), $this->_role_validate());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_insert = $this->_clear_data($data->all());

            if (count($data->file()) > 0) {
                $data_insert['image'] = $this->_do_upload_image($data);
            }
            $result_entry = $this->create($data_insert);
            if ($result_entry) {
                $id_insert = $result_entry->id;
                $data_insert['id'] = $id_insert;
                $user = (array)$data_insert;
                $this->_send_email($user, 'active_account', 'Confirm to active your account ');
                $status = TRUE;
                $msg = 'entry new user success.';
                Session::flash('msg', '<div class="alert alert-success">entry new user success.</div>');
            } else {
                $status = FALSE;
                $msg = 'entry user fail.';
                Session::flash('msg', '<div class="alert alert-warning">entry user fail.</div>');
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
            'id_insert' => $id_insert
        ];
    }

    public function before_active($id, $code) {
        $status = TRUE;
        $msg = NULL;
        $user = $this->where(['id' => $id, 'activation_code' => $code])->first();
        if (count($user) !== 1) {
            $status = FALSE;
            $msg = 'User not found.';
            Session::flash('msg', $msg);
        }

        return [
            'status' => $status,
            'msg' => $msg
        ];
    }

    public function do_active($data, $id, $code) {
        $status = TRUE;
        $msg = NULL;
        $validator = Validator::make($data->all(), [
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_update = array(
                'password' => bcrypt($data['password']),
                'activation_code' => NULL,
                'active' => 1,
            );
            $result_update = User::where('id', $id)->update($data_update);
            if ($result_update) {
                Session::flash('msg', '<div class="alert alert-success">Set password success, login in admin</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Set password fail</div>');
            }
        }

        return array(
            'status' => $status,
            'msg' => $msg
        );
    }

    public function edit($data,$id) {
        $msg = NULL;
        $status = TRUE;
        $role_validation = $this->_role_validate();
        $role_validation['password'] = 'min:5|confirmed';
        $role_validation['password_confirmation'] = 'min:5';
        $role_validation['email'] = 'required|email';
        if(!isset($data['type_account'])){
            $role_validation['type_account'] = '';
        }
        $validator = Validator::make($data->all(),$role_validation);
        if($validator->fails()){
            $status = FALSE;
            $msg = $validator->errors();
        }else {
            $data_update = $this->_clear_data_update($data->all());
            $result_update = $this->where('id',$id)->update($data_update);
            if($result_update){
                Session::flash('msg','<div class="alert alert-success">Edit success.</div>');
            }else {
                Session::flash('msg','<div class="alert alert-warning">Edit fail.</div>');
            }
        }

        return [
            'status' => $status,
            'msg'   => $msg
        ];
    }

    private function _clear_data_update($data){
        if(strlen($data['password']) > 5){
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        unset($data['password_confirmation'],$data['_token']);

        return $data;
    }

    public function remove($id) {
        $status = TRUE;
        $data = $this->get_one_user($id);
        if (!$data['status']) {
            Session::flash('msg', '<div class="alert alert-danger">User not found</div>');
            $status = FALSE;
        } else {
            $user = $data['user'];
            if ($user->type_account == 0) {
                Session::flash('msg', '<div class="alert alert-danger">permission denied to delete</div>');
                $status = FALSE;
            } else {
                $result_delete = User::where('id', $id)->delete();
                if ($result_delete) {
                    Session::flash('msg', '<div class="alert alert-success">User is deleted</div>');
                } else {
                    Session::flash('msg', '<div class="alert alert-warning">Delete is fail</div>');
                }
            }
        }

        return array(
            'status' => $status
        );
    }

    public function login($data) {
        $status = TRUE;
        $msg = NULL;
        $validator = Validator::make($data->all(), ['email' => 'required|email', 'password' => 'required|min:5|max:225']);
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']], $data['remember'])) {
                Session::flash('logged_in', '<div class="alert alert-success">You are logged in.</div>');
                $status = TRUE;
            } else {
                Session::flash('msg', '<div class="alert alert-warning">username or password is not pass !</div>');
                $status = FALSE;
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    public function remind_password($data) {
        $status = TRUE;
        $msg = NULL;
        $validator = Validator::make($data->all(), ['email' => 'required|email']);
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $user = $this->where(['email' => $data['email'], 'active' => 1])->first()->toArray();
            if ($user) {
                $template_mail = 'reset_password';
                $subject = 'Confirm to reset password';
                $this->_send_email($user, $template_mail, $subject);
                Session::flash('msg', '<div class="alert alert-info">We sent an email to <strong>' . $user['email'] . '</strong>, please confirm <a href="https://mail.google.com"><strong>Email</strong></a> to reset password.</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Email not found !</div>');
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    public function before_reset_password($id, $code) {
        $status = TRUE;
        $user = User::where(['id' => $id, 'forgotten_password_code' => $code])->first();
        if ($user) {
            $check_time = time() - $user->forgotten_password_time;
            if ($check_time > config('global.time_reset_password')) {
                $status = FALSE;
                Session::flash('msg', 'Error timeout');
            }
        } else {
            $status = FALSE;
            Session::flash('msg', 'User not found !');
        }

        return [
            'status' => $status,
            'user' => $user
        ];
    }

    public function do_reset_password($data, $id, $code) {
        $status = TRUE;
        $msg = NULL;
        $validator = Validator::make($data->all(), [
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_update = array(
                'password' => bcrypt($data['password']),
                'forgotten_password_code' => NULL,
                'forgotten_password_time' => NULL,
            );
            $result_update = User::where('id', $id)->update($data_update);
            if ($result_update) {
                Session::flash('msg', '<div class="alert alert-success">Your password is changed</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Change password is fail</div>');
            }
        }

        return array(
            'status' => $status,
            'msg' => $msg
        );
    }

    public function edit_image($id = NULL,$data_post){
        $msg = NULL;
        $name_field = 'image_edit';
        if($id == NULL){
            $id = Auth::user()->id;
            $data = $this->get_one_user(Auth::user()->id,'edit');
        }else {
            $data = $this->get_one_user($id);
        }
        if($data['status']){
            $validator = Validator::make($data_post->all(),[$name_field => 'required|image|mimes:jpeg,png,jpg,gif,tiff,ico,bmp']);
            if($validator->fails()){
                $status = FALSE;
                $msg = $validator->errors();
            }else {
                $image_name = $this->_do_upload_image($data_post,$data['user']->image,'update',$name_field);
                $this->where('id',$id)->update(['image' => $image_name]);
                $status = TRUE;
                Session::flash('msg_image','<div class="alert alert-success">update image success</div>');
            }
        }else{
            $status = FALSE;
            Session::flash('msg','User not found');
            $msg = 'error_user';
        }

        return [
            'status' => $status,
            'msg'   => $msg
        ];
    }

    private function _send_email($user, $template_mail, $subject = NULL) {
        $data_update = array(
            'forgotten_password_code' => str_random(55),
            'forgotten_password_time' => time(),
        );
        User::where('id', $user['id'])->update($data_update);
        $user['forgotten_password_code'] = $data_update['forgotten_password_code'];
        if (!$subject) {
            $user['subject'] = "Message for admin school site";
        } else {
            $user['subject'] = $subject;
        }
        Mail::send('admin.email.' . $template_mail, ['user' => $user], function ($m) use ($user) {
            $m->from(config('global.email'), config('global.site'));
            $m->to($user['email'], $user['name'])->subject($user['subject'] . ' - admin school site');
        });
    }

    /**
     * do upload image
     * @param string $action ;
     * $action : description 'entry' or 'update' image;
     *
     * @return image name
     */
    private function _do_upload_image($data,$old_image = NULL, $action = 'entry',$name_field = 'image') {
        $image = $data->file($name_field);
        $dir = 'asset/image/avatar/';
        if ($action !== 'entry') {
            File::delete($dir . $old_image);
        }
        $name_image = time() . "_" . $image->getClientOriginalName();
        $image->move($dir, $name_image);

        return $name_image;
    }

    private function _clear_data($data) {
        $data['active'] = 0;
        $data['activation_code'] = str_random(32);
        unset($data['_token']);

        return $data;
    }
}
