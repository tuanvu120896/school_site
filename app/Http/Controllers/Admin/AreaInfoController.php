<?php

namespace App\Http\Controllers\Admin;

use App\Models\AreaInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AreaInfoController extends Controller
{
    protected $area_info;

    public function __construct() {
        $this->area_info = new AreaInfo();
    }

    public function index() {
        $data['area_info'] = $this->area_info->get_all();
        return view('admin.area_info.index', $data);
    }

    public function details($id) {
        $area_info = $this->area_info->get_by_id($id);
        if ($area_info) {
            $data['area_info'] = $area_info;
            return view('admin.area_info.details', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function before_entry() {
        return view('admin.area_info.entry');
    }

    public function entry(Request $data_post) {
        $result_entry = $this->area_info->entry($data_post);
        if ($result_entry['status']) {
            return redirect(route('area_info_list'));
        } else {
            return redirect(route('area_info_entry'))->withErrors($result_entry['msg'])->withInput();
        }
    }

    public function before_edit($id) {
        $area_info = $this->area_info->get_by_id($id);
        if ($area_info) {
            $data['area_info'] = $area_info;
            return view('admin.area_info.edit', $data);
        } else {
            return redirect(route('error_page'));
        }
    }

    public function edit(Request $data_post, $id) {
        $result_edit = $this->area_info->edit($data_post, $id);
        if ($result_edit['status']) {
            return redirect(route('area_info_details', ['id' => $id]));
        } else {
            return redirect(route('area_info_edit', ['id' => $id]))->withErrors($result_edit['msg'])->withInput();
        }
    }

    public function delete($id) {
        $result_delete = $this->area_info->remove($id);
        if (!$result_delete['status']) {
            return redirect(route('error_page'));
        } else {
            return redirect(route('area_info_list'));
        }
    }
}
