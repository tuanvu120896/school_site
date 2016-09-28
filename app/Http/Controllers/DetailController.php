<?php

namespace App\Http\Controllers;

use App\Models\AreaInfo;
use App\Models\Dossier;
use App\Models\Locality;
use App\Models\School;
use Illuminate\Http\Request;

use App\Http\Requests;

class DetailController extends Controller {
    protected $school, $locality, $dossier, $area_info;

    public function __construct() {
        $this->school = new School();
        $this->locality = new Locality();
        $this->dossier = new Dossier();
        $this->area_info = new AreaInfo();
    }

    public function index($name, $id) {
        $data_school = $this->school->get_one($id);
        if ($data_school['status']) {
            $data['localities'] = $this->locality->get_all();
            $data['school'] = $data_school['schools'];
            $data['school']['phone'] = $this->php_num($data['school']['phone']);
            $data['school']['fax'] = $this->php_num($data['school']['fax']);
            $data['school']['zip_code'] = $this->php_num($data['school']['zip_code']);
            $data['school']['school_details']->type_test = implode(',', $data['school']['school_details']->type_test);
            $data['title'] = strtolower($data['school']['name_en']);
            session()->put('active_menu', 'school');
            return view('front.details.index', $data);
        } else {
            return redirect(route('front_error'));
        }

    }

    public function dossier($title) {
        $dossier = $this->dossier->get_by_title($title);
        if ($dossier) {
            $data['dossier'] = $dossier;
            $data['localities'] = $this->locality->get_all();
            $data['dossier_reg'] = $this->dossier->get_random($title);
            $data['title'] = $dossier['name'];
            return view('front.details.dossier', $data);
        } else {
            return redirect(route('front_error'));
        }
    }

    public function area_info($title) {
        $area_info = $this->area_info->get_by_title($title);
        if ($area_info) {
            $data['area_info'] = $area_info;
            $data['localities'] = $this->locality->get_all();
            $data['area_info_reg'] = $this->area_info->get_random($title);
            $data['title'] = $area_info['name'];
            return view('front.details.area_info', $data);
        } else {
            return redirect(route('front_error'));
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
