<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AreaInfo extends Model
{
    protected $table = 'area_info';

    protected $fillable = [
        'name','title','image','body', 'deleted','status','id', 'about'
    ];

    public function role_validate() {
        return [
            'name' => 'required|min:5|unique:dossiers',
            'image' => 'required|image|mimes:jpg,png,jpeg,bmp',
            'body' => 'required',
            'about' => 'required|max:255'
        ];
    }

    public function override_message() {
        return [
            'name.required' => 'Tên Không Được Bỏ Trống',
            'name.min' => 'Tên Ít Nhất Có 5 Ký Tự',
            'name.unique' => 'Tên Bài Viết Đã Tồn Tại',
            'image.required' => 'Hình Ảnh Không Được Bỏ Trống',
            'image.image' => 'Chỉ Upload Hình Ảnh',
            'image.mimes' => 'Định Dạng Hình Ảnh Không Đúng',
            'body.required' => 'Nội Dung Không Được Bỏ Trống',
            'about.required' => 'Phần Tóm Tắt Không Được Bỏ Trống',
            'about.max' => 'Không Được Quá 255 Ký Tự',
        ];
    }

    public function get_by_id($id) {
        $area_info = $this->where(['id' => $id, 'deleted' => 0])->first();
        if ($area_info) {
            return $area_info->toArray();
        }
        Session::flash('msg', '404 error not found');
        return NULL;
    }

    public function get_by_title($title) {
        $area_info = $this->where(['title' => $title, 'deleted' => 0, 'status' => 0])->first();
        if ($area_info) {
            return $area_info->toArray();
        }
        Session::flash('msg', '404 error not found');
        return NULL;
    }

    public function get_random($title) {
        $area_info = $this->where('title', '!=' , $title)->where(['deleted' => 0, 'status' => 0])->get()->random(4);
        return $area_info;
    }

    public function get_all() {
        $area_info = $this->where(['deleted' => 0])->orderBy('id','desc')->get();
        return $area_info;
    }

    public function get_limit($limit = NULL) {
        $area_info = $this->where(['deleted' => 0,'status' => 0])->limit($limit)->orderBy('id','desc')->get();
        return $area_info;
    }

    public function get_with_paginate() {
        $area_info = $this->where(['deleted' => 0,'status' => 0])->orderBy('id','desc')->simplePaginate(3);
        return $area_info;
    }

    public function entry($data) {
        $status = NULL;
        $msg = NULL;
        $id_insert = NULL;
        $validator = Validator::make($data->all(), $this->role_validate(), $this->override_message());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {

            $status = TRUE;
            $data_insert = $this->_clean_data_insert($data);
            $result_insert = $this->create($data_insert);
            if ($result_insert) {
                $id_insert = $result_insert->id;
                Session::flash('msg', '<div class="alert alert-success">Entry new success</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Entry new fail</div>');
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
            'id_insert' => $id_insert
        ];
    }

    private function _clean_data_insert($data) {
        $data_insert = $data->all();
        $data_insert['image'] = $this->_do_upload_image($data);
        unset($data_insert['_token']);
        $data_insert['deleted'] = 0;
        $data_insert['title'] = $this->_change_title($data_insert['name']);
        $data_insert['title'] = str_replace(' ', '-', $data_insert['title']);

        return $data_insert;
    }

    private function _change_title($name) {
        $name = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $name);
        $name = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $name);
        $name = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $name);
        $name = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $name);
        $name = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $name);
        $name = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $name);
        $name = preg_replace("/(đ)/", 'd', $name);

        $name = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $name);
        $name = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $name);
        $name = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $name);
        $name = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $name);
        $name = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $name);
        $name = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $name);
        $name = preg_replace("/(Đ)/", 'D', $name);

        return $name;
    }

    public function edit($data, $id) {
        $status = NULL;
        $msg = NULL;
        $role_validate = $this->role_validate();
        $role_validate['name'] = 'required|min:5';
        $role_validate['image'] = 'image|mimes:jpg,png,jpeg,bmp';
        $validator = Validator::make($data->all(), $role_validate, $this->override_message());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $status = TRUE;
            $data_update = $this->_clean_data_update($data, $id);
            $result_insert = $this->where('id', $id)->update($data_update);
            if ($result_insert) {
                Session::flash('msg', '<div class="alert alert-success">Edit success</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Edit fail</div>');
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    private function _clean_data_update($data, $id) {
        $area_info = $this->get_by_id($id);
        $data_update = $data->all();
        if($data->file('image')){
            $data_update['image'] = $this->_do_upload_image($data, 'update', $area_info->image);
        }
        unset($data_update['_token']);
        $data_update['deleted'] = 0;
        $data_update['created_at'] = date('Y:m:d H:i:s');
        $data_update['title'] = $this->_change_title($data_update['name']);
        $data_update['title'] = str_replace(' ', '-', $data_update['title']);

        return $data_update;
    }

    public function remove($id) {
        $msg = NULL;
        $status = TRUE;
        $area_info = $this->where(['id' => $id, 'deleted' => 0])->first();
        if ($area_info) {
            $status = TRUE;
            $result_delete = $area_info->delete();
            if ($result_delete) {
                Session::flash('msg', '<div class="alert alert-success">Delete successfully</div>');
            } else {
                Session::flash('msg', '<div class="alert alert-warning">Delete fail</div>');
            }
        } else {
            $status = FALSE;
            Session::flash('msg', 'error 404 - info not found');
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    private function _do_upload_image($data, $action = 'entry', $old_image = NULL) {
        $image = $data->file('image');
        $dir = 'asset/image/icon/area_info';
        if ($action != 'entry') {
            File::delete($dir . $old_image);
        }
        $name_image = time() . '_' . $image->getClientOriginalName();
        $image->move($dir, $name_image);

        return $name_image;
    }

}
