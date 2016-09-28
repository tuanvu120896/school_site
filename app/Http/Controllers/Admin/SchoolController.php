<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Course;
use App\Models\Locality;
use App\Models\School;
use App\Models\SchoolDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: Nguyen Tuan Vu
 * Date: 01/09/2016
 * Time: 9:21 SA
 */
class SchoolController extends Controller {
    protected $school;
    protected $city;
    protected $locality;
    protected $school_detail;
    protected $course;

    public function __construct() {
        $this->school = new School();
        $this->city = new City();
        $this->locality = new Locality();
        $this->school_detail = new SchoolDetail();
        $this->course = new Course();
    }

    public function index() {
        $data['schools'] = $this->school->get_all();
        return view('admin.school.index', $data);
    }

    public function details($id_school) {
        $data_details = $this->school->get_one($id_school);
        if ($data_details['status']) {
            $data_details['schools']['created_at'] = substr($data_details['schools']['created_at'],0,16);
            $data_details['schools']['phone'] = $this->php_num($data_details['schools']['phone']);
            $data_details['schools']['zip_code'] = $this->php_num($data_details['schools']['zip_code']);
            $data_details['schools']['fax'] = $this->php_num($data_details['schools']['fax']);
            $data['school'] = $data_details['schools'];
            return view('admin.school.details', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function show_entry() {
        $data['cities'] = $this->city->get_all();
        $data['localities'] = $this->locality->get_all();

        return view('admin.school.entry', $data);
    }

    public function do_entry(Request $data_post) {
        $result_entry = $this->school->entry($data_post);
        if ($result_entry['status']) {
            Session::flash('msg', '<div class="alert alert-success">Insert new user success, continue add info.</div>');
            return redirect(route('school_add_info', ['id' => $result_entry['id_insert']]));
        } else {
            Session::flash('msg', '<div class="alert alert-warning">Insert new user error.</div>');
            return redirect(route('school_entry'))->withErrors($result_entry['msg'])->withInput();
        }
    }

    public function before_add_info($id_school) {
        return view('admin.school.add_info', ['id_school' => $id_school]);
    }

    public function add_info(Request $data_post, $id_school) {
        $result_add = $this->school_detail->entry($data_post, $id_school);
        if ($result_add['status']) {
            Session::flash('msg', '<div class="alert alert-success">' . $result_add['msg'] . '</div>');
            return redirect(route('school_add_course', ['id' => $id_school]));
        } else {
            Session::flash('msg', '<div class="alert alert-warning">add info fail</div>');
            return redirect(route('school_add_info', ['id' => $id_school]))->withErrors($result_add['msg'])->withInput();
        }
    }

    public function before_add_course($id_school) {
        $data['courses'] = $this->course->get_all($id_school);
        $data['id_school'] = $id_school;
        return view('admin.school.add_course', $data);
    }

    public function add_course(Request $data_post, $id_school) {
        $result_add = $this->course->entry($data_post, $id_school);
        if ($result_add['status']) {
            Session::flash('msg', '<div class="alert alert-success">' . $result_add['msg'] . '</div>');
            return redirect(route('school_add_course', ['id' => $id_school]));
        } else {
            Session::flash('msg', '<div class="alert alert-warning">add new courses fail</div>');
            return redirect(route('school_add_course', ['id' => $id_school]))->withErrors($result_add['msg'])->withInput();
        }
    }

    public function before_edit($id_school) {
        $data_school = $this->school->get_one($id_school);
        if ($data_school['status']) {
            $data['cities'] = $this->city->get_all();
            $data['localities'] = $this->locality->get_all();
            $data['school'] = $data_school['schools'];
            return view('admin.school.edit', $data);
        } else {
            return redirect(route('error_page'));
        }

    }

    public function edit(Request $data_post, $id) {
        $result_edit = $this->school->edit($data_post, $id);
        if (!$result_edit['status']) {
            Session::flash('msg', '<div class="alert alert-warning">Update fail</div>');
            return redirect(route('school_edit', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        } else {
            $data_post->session()->put('active', 'home');
            return redirect(route('school_detail', ['id' => $id]));
        }
    }

    public function before_edit_info($id_school) {
        $data_school = $this->school_detail->get_by_school_id($id_school);
        if ($data_school['status']) {
            $data['id_school'] = $id_school;
            $data['school_detail'] = $data_school['school'];
            return view('admin.school.edit_info', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function edit_info(Request $data_post, $id) {
        $result_edit = $this->school_detail->edit($data_post, $id);
        if (!$result_edit['status']) {
            Session::flash('msg', '<div class="alert alert-warning">Update fail</div>');
            return redirect(route('school_edit_info', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        } else {
            $data_post->session()->put('active', 'info');
            return redirect(route('school_detail', ['id' => $id]));
        }
    }


    public function before_edit_course($id) {
        $course = $this->course->get_one($id);
        if ($course) {
            $data['id'] = $id;
            $data['course'] = $course;
            return view('admin.school.edit_course', $data);
        } else {
            Session::flash('msg', 'course not found');
            return redirect(route('error_page'));
        }

    }

    public function edit_course(Request $data_post, $id) {
        $result_edit = $this->course->edit($data_post, $id);
        if (!$result_edit['status']) {
            Session::flash('msg', '<div class="alert alert-warning">Update fail</div>');
            return redirect(route('school_edit_course', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        } else {
            $data_post->session()->put('active', 'course');
            return redirect(route('school_detail', ['id' => $result_edit['id_school']]));
        }
    }

    public function delete($id) {
        $result_delete = $this->school->remove($id);
        if ($result_delete['status']) {
            return redirect(route('school_list'));
        } else {
            return redirect(route('error_page'));
        }
    }

    public function delete_course($id) {
        $result_delete = $this->course->remove($id);
        if ($result_delete['status']) {
            return redirect(route('school_detail', ['id' => $result_delete['id_school']]));
        } else {
            return redirect(route('page_error'));
        }
    }

    public function ajax_get_city($id) {
        $cities = $this->city->get_city_by_locality($id);
        foreach ($cities as $city) {
            echo '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
    }

    public function php_num($numb) {
        if (!is_numeric(substr($numb, 0, 1)) && !is_numeric(substr($numb, 1, 1))) {
            return $numb;
        }

        $chars = array(' ', '(', ')', '-', '.');
        $numb = str_replace($chars, "", $numb);

        if (strlen($numb) > 10) {
            $numb = substr($numb, 0, 1) . '-' . substr($numb, 1, 3) . '-' . substr($numb, 4, 3) . '-' . substr($numb, 7, 4);
        } elseif (strlen($numb) == 8) {
            $numb = substr($numb, 0, 4) . '-' . substr($numb, 4, 4);
        } elseif (strlen($numb) == 7) {
            $numb = substr($numb, 0, 3) . '-' . substr($numb, 3, 4);
        } elseif (strlen($numb) == 6) {
            $numb = substr($numb, 0, 3) . '-' . substr($numb, 3, 3);
        } elseif (strlen($numb) == 5) {
            $numb = substr($numb, 0, 2) . '-' . substr($numb, 2, 3);
        } elseif (strlen($numb) < 5) {
            return $numb;
        } else {
            $numb = substr($numb, 0, 3) . '-' . substr($numb, 3, 3) . '-' . substr($numb, 6, 4);
        }

        return $numb;
    }
}