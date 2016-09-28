<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SchoolDetail extends Model {
    protected $table = 'school_details';

    protected $fillable = [
        'id_school', 'dorm_money', 'dorm_status', 'type_test', 'career', 'scholarship',
        'overtime', 'staff', 'number_student', 'about', 'japanese', 'number_country', 'deleted',
    ];

    private function _role_validate() {
        return [
            'dorm_status' => 'required',
            'dorm_money' => 'required',
            'type_test' => 'required',
            'career' => 'required',
            'scholarship' => 'required',
            'overtime' => 'required',
            'staff' => 'required',
            'number_student' => 'required',
            'about' => 'required',
            'japanese' => 'required',
            'number_country' => 'required',
        ];
    }

    public function get_by_school_id($id_school) {
        $school_details = $this->where(['id_school' => $id_school, 'deleted' => 0])->first();
        if (!$school_details) {
            $status = FALSE;
            Session::flash('msg', 'school to edit not found');
        } else {
            $status = TRUE;
            $school_details->type_test = explode(';', $school_details->type_test);
        }
        return [
            'status' => $status,
            'school' => $school_details
        ];
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
                $msg = "add info success";
            } else {
                $status = FALSE;
                $msg = "add info fail";
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
        ];
    }

    public function edit($data, $id) {
        $msg = NULL;
        $status = TRUE;
        $validator = Validator::make($data->all(), $this->_role_validate());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_update = $this->_clean_data_update($data->all());
            $result_update = $this->where('id_school', $id)->update($data_update);
            if ($result_update) {
                $status = TRUE;
                $msg = 'Update success';
                Session::flash('msg', '<div class="alert alert-success">Update success</div>');
            } else {
                $status = FALSE;
                $msg = 'Update fail';
            }
        }

        return [
            'status' => $status,
            'msg' => $msg
        ];
    }

    public function delete_by_id_school($id) {
        $school_detail = $this->where('id_school', $id)->first();
        if ($school_detail) {
            $school_detail->delete();
        }
    }

    private function _clean_data_update($data) {
        if(is_array($data['type_test'])){
            $data['type_test'] = implode(';',$data['type_test']);
        }
        unset($data['_token']);
        $data['updated_at'] = date('Y:m:d H:i:s');

        return $data;
    }

    private function _clean_data($data, $id_school) {
        if (is_array($data['type_test']) && !is_null($data['type_test'])) {
            $data['type_test'] = implode(';', $data['type_test']);
        }
        unset($data['_token']);
        $data['deleted'] = 0;
        $data['id_school'] = $id_school;

        return $data;
    }
}
