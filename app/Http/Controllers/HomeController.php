<?php

namespace App\Http\Controllers;

use App\Models\AreaInfo;
use App\Models\City;
use App\Models\Dossier;
use App\Models\Locality;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller {
    protected $city, $locality, $dossier, $area_info;

    public function __construct() {
        $this->city = new City();
        $this->locality = new  Locality();
        $this->dossier = new Dossier();
        $this->area_info = new AreaInfo();
    }

    public function index() {
        $data['localities'] = $this->locality->get_all();
        $data['cities'] = $this->city->get_all();
        $data['dossiers'] = $this->dossier->get_limit(3);
        $data['area_info'] = $this->area_info->get_limit(3);
        $data['title'] = config('global.front_home_title');
        session()->put('active_menu','home');
        return view('front.home.index',$data);
    }

    public function school() {
        $data['localities'] = $this->locality->get_all();
        $data['cities'] = $this->city->get_all();
        $data['title'] = config('global.front_school_title');
        session()->put('active_menu','school');
        return view('front.home.school',$data);
    }

    public function error() {
        $data['title'] = config('global.front_error_title');
        $data['localities'] = $this->locality->get_all();
        return view('front.error.index',$data);
    }
}
