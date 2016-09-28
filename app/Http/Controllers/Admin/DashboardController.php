<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

/**
 * Created by PhpStorm.
 * User: Nguyen Tuan Vu
 * Date: 25/08/2016
 * Time: 3:00 CH
 */
class DashboardController extends Controller {
    public function index(){
        return view('admin.dashboard.index');
    }
}