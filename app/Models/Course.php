<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Course extends Model {
    protected $table = 'courses';

    protected $fillable = [
        'id_school', 'name', 'time', 'date', 'admission_money', 'tuition_money',
        'other_money', 'record_money', 'deleted',
    ];

    private function _role_validate() {
        return [
            'name' => 'required',
            'time' => 'required',
            'date' => 'required',
            'admission_money' => 'required',
            'tuition_money' => 'required',
            'other_money' => 'required',
            'record_money' => 'required',
        ];
    }

    public function get_one($id) {
        $course = $this->where('id', $id)->first();
        return $course;
    }

    public function get_all($id_school) {
        $courses = $this->where(['id_school' => $id_school, 'deleted' => 0])->get();
        return $courses;
    }

    public function get_by_school_id($id_school) {
        $courses = $this->where(['id_school' => $id_school, 'deleted' => 0])->get();
        return $courses;
    }

    public function entry($data, $id_school) {
        $validator = Validator::make($data->all(), $this->_role_validate());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_insert = $this->_clean_data($data->all(), $id_school);
            $result_create = $this->create($data_insert);
            if ($result_create->id) {
                $status = TRUE;
                $msg = "add courses success";
            } else {
                $status = FALSE;
                $msg = "add courses fail";
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    public function edit($data, $id) {
        $course = $this->get_one($id);
        $msg = NULL;
        $status = TRUE;
        $id_school = NULL;
        $validator = Validator::make($data->all(), $this->_role_validate());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_update = $this->_clean_data_update($data->all());
            $result_update = $this->where('id', $id)->update($data_update);
            if ($result_update) {
                $status = TRUE;
                $id_school = $course->id_school;
                $msg = 'Update success';
                Session::flash('msg', '<div class="alert alert-success">Update success</div>');
            } else {
                $status = FALSE;
                $msg = 'Update fail';
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
            'id_school' => $id_school,
        ];
    }

    public function remove_by_id_school($id_school) {
        $courses = $this->where('id_school', $id_school)->get();
        if (count($courses) > 0) {
            foreach ($courses as $course) {
                $course->delete();
            }
        }
    }

    public function remove($id) {
        $course = $this->where('id', $id)->first();
        $id_school = $course->id_school;
        if ($course) {
            $course->delete();
            $status = TRUE;
            Session::flash('msg', '<div class="alert alert-success">delete success.</div>');
        } else {
            $status = FALSE;
            Session::flash('msg','user not found.');
        }

        return [
            'status' => $status,
            'id_school' => $id_school,
        ];
    }

    private function _clean_data_update($data) {
        unset($data['_token']);
        $data['updated_at'] = date('Y:m:d H:i:s');

        return $data;
    }

    private function _clean_data($data, $id_school) {
        unset($data['_token']);
        $data['deleted'] = 0;
        $data['id_school'] = $id_school;

        return $data;
    }
}
