<?php

namespace App\Http\Controllers;

use App\Models\AreaInfo;
use App\Models\City;
use App\Models\Dossier;
use App\Models\Locality;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ListController extends Controller {
    protected $school, $city, $locality, $dossier, $area_info;

    public function __construct() {
        $this->school = new School();
        $this->city = new City();
        $this->locality = new Locality();
        $this->dossier = new Dossier();
        $this->area_info = new AreaInfo();
    }

    public function index($name, $id) {
        $data['localities'] = $this->locality->get_all();
        $city = $this->city->get_by_id($id);
        if ($city) {
            $data['name_area'] = $city['name'];
            $data['schools'] = $this->school->get_by_area($id);
            $data['title'] = strtolower($city['name']);
            session()->put('active_menu','school');
            return view('front.list.index', $data);
        } else {
            return redirect(url(route('front_error')));
        }
    }

    public function area($name, $id) {
        $locality = $this->locality->get_by_id($id);
        if ($locality) {
            $data['localities'] = $this->locality->get_all();
            $data['name_locality'] = $locality['name'];
            $data['schools'] = $this->school->get_by_areas($id);
            $data['title'] = strtolower($locality['name']);
            session()->put('active_menu','school');
            return view('front.list.area', $data);
        } else {
            return redirect(url(route('front_error')));
        }
    }

    public function dossier() {
        $data['localities'] = $this->locality->get_all();
        $data['dossiers'] = $this->dossier->get_with_paginate();
        $data['title'] = config('global.front_dossier_title');
        session()->put('active_menu','dossier');
        return view('front.list.dossier',$data);
    }

    public function area_info() {
        $data['localities'] = $this->locality->get_all();
        $data['area_info'] = $this->area_info->get_with_paginate();
        $data['title'] = config('global.front_area_info_title');
        session()->put('active_menu','area_info');
        return view('front.list.area_info',$data);
    }
}
