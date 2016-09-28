<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class School extends Model {
    protected $table = 'schools';
    protected $course;
    protected $school_detail;
    protected $city;
    protected $locality;

    protected $fillable = [
        'name_en', 'email', 'name_jp', 'phone', 'zip_code', 'city', 'building', 'url', 'fax', 'home', 'address1', 'address2',
        'deleted', 'created_at', 'image', 'status'
    ];


    private function _role_validate() {
        return [
            'name_jp' => 'required',
            'name_en' => 'required',
            'locality' => 'required',
            'city' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:8,14|numeric',
            'zip_code' => 'required|digits_between:3,8',
            'address1' => 'required',
            'address2' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,tiff,ico,bmp',
            'home' => 'required',
            'building' => 'required',
            'url' => 'required|url',
            'fax' => 'required',
            'status' => 'required',
        ];
    }

    public function get_all() {
        $this->course = new Course();
        $this->school_detail = new SchoolDetail();
        $schools = $this->where(['deleted' => 0])->get();
        foreach ($schools as $school) {
            $school->school_details = $this->school_detail->get_by_school_id($school->id);
            $school->courses = $this->course->get_by_school_id($school->id);
        }

        return $schools;
    }

    public function get_by_area($id) {
        $schools = $this->where(['city' => $id, 'deleted' => 0, 'status' => 0])->get();
        return $schools;
    }

    public function get_by_areas($id) {
        $list_item = array();
        $this->city = new City();
        $cities = $this->city->get_city_by_locality($id);

        foreach ($cities as $city) {
            $schools = $this->where(['city' => $city->id, 'deleted' => 0, 'status' => 0])->get();
            if (count($schools) > 0) {
                foreach ($schools as $school) {
                    $item = $school->toArray();
                    $city = $this->city->get_by_id($item['city']);
                    $school->city_name = $city['name'];
                }
                $list_item[] = $schools->toArray();
            }
        }

        if (count($list_item) > 0) {
            $all_schools = $list_item[0];
            for ($i = 1; $i < count($list_item); $i++) {
                $all_schools = array_merge($all_schools, $list_item[$i]);
            }
        } else {
            $all_schools = NULL;
        }
        return $all_schools;
    }

    public function get_one($id_school) {
        $this->course = new Course();
        $this->school_detail = new SchoolDetail();
        $this->city = new City();
        $this->locality = new Locality();

        $schools = $this->where(['id' => $id_school, 'deleted' => 0])->first();
        if ($schools) {
            $status = TRUE;
            $schools = $schools->toArray();

            $school_details = $this->school_detail->get_by_school_id($id_school);
            $schools['school_details'] = $school_details['school'];

            $schools['courses'] = $this->course->get_by_school_id($id_school);

            $city = $this->city->get_by_id($schools['city']);
            $schools['city_id'] = $city['id'];
            $schools['city_name'] = $city['name'];

            $locality = $this->locality->get_by_id($city['id_locality']);
            $schools['locality_id'] = $city['id_locality'];
            $schools['locality_name'] = $locality['name'];

            $school['school_details'] = $this->school_detail->get_by_school_id($id_school);
            $school['courses'] = $this->course->get_by_school_id($id_school)->toArray();
        } else {
            $status = FALSE;
            Session::flash('msg','School not found');
        }


        return [
            'status' => $status,
            'schools' => $schools
        ];
    }

    public function entry($data) {
        $msg = NULL;
        $id_insert = NULL;
        $validator = Validator::make($data->all(), $this->_role_validate());
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_insert = $this->_clean_data_insert($data->all());
            if (count($data->file('image')) > 0) {
                $data_insert['image'] = $this->_do_upload_image($data);
            }
            $result_insert = $this->create($data_insert);
            if ($result_insert->id) {
                $status = TRUE;
                $msg = 'insert new school success';
                $id_insert = $result_insert->id;
            } else {
                $status = FALSE;
                $msg = 'insert fails';
            }
        }

        return [
            'status' => $status,
            'msg' => $msg,
            'id_insert' => $id_insert,
        ];
    }

    public function edit($data, $id) {
        $msg = NULL;
        $status = TRUE;
        $role_validate = $this->_role_validate();
        $role_validate['image'] = '';
        $validator = Validator::make($data->all(), $role_validate);
        if ($validator->fails()) {
            $status = FALSE;
            $msg = $validator->errors();
        } else {
            $data_update = $this->_clean_data_update($data, $id);
            $result_update = $this->where('id', $id)->update($data_update);
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

    public function remove($id) {
        $this->course = new Course();
        $this->school_detail = new SchoolDetail();
        $school = $this->where('id', $id)->first();
        if ($school) {
            $this->course->remove_by_id_school($id);
            $this->school_detail->delete_by_id_school($id);
            $school->delete();
            $status = TRUE;
            Session::flash('msg', '<div class="alert alert-success">delete success</div>');
        } else {
            $status = FALSE;
            Session::flash('msg', 'user not found.');
        }

        return [
            'status' => $status
        ];
    }

    private function _clean_data_update($data, $id) {
        $data_return = $data->all();
        $school = $this->get_one($id);
        if ($data->file('image')) {
            $data_return['image'] = $this->_do_upload_image($data, $school['image'], 'update', 'image');

        } else {
            unset($data_return['image']);
        }
        unset($data_return['_token'], $data_return['locality']);
        $data_return['updated_at'] = date("Y:m:d H:i:s");

        return $data_return;
    }

    private function _clean_data_insert($data) {
        unset($data['_token']);
        $data['deleted'] = 0;
        return $data;
    }

    private function _do_upload_image($data, $old_image = NULL, $action = 'entry', $name_field = 'image') {
        $image = $data->file($name_field);
        $dir = 'asset/image/school/';
        if ($action !== 'entry') {
            File::delete($dir . $old_image);
        }
        $name_image = time() . "_" . $image->getClientOriginalName();
        $image->move($dir, $name_image);

        return $name_image;
    }

    /**
     * Checks hiragana
     * ぁ-ゖー
     *
     * @param string $check The value to check.
     * @param boolean $allowSpace Allow double-byte space.
     * @return boolean
     */
    public function is_hiragana($check, $allowSpace = TRUE) {
        if ($allowSpace) {
            $pattern = '/^(\xe3(\x80\x80|\x81[\x81-\xbf]|\x82[\x80-\x96]|\x83\xbc))*$/';
        } else {
            $pattern = '/^(\xe3(\x81[\x81-\xbf]|\x82[\x80-\x96]|\x83\xbc))*$/';
        }
        return (bool)preg_match($pattern, $check);
    }

    /**
     * Checks katakana
     * ァ-ヶー
     *
     * @param string $check The value to check.
     * @param boolean $allowSpace Allow double-byte space.
     * @return boolean
     */
    public function is_katakana($check, $allowSpace = TRUE) {
        if ($allowSpace) {
            $pattern = '/^(\xe3(\x80\x80|\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc))*$/';
        } else {
            $pattern = '/^(\xe3(\x82[\xa1-\xbf]|\x83[\x80-\xb6]|\x83\xbc))*$/';
        }
        return (bool)preg_match($pattern, $check);
    }
}
