<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//default route
Route::get('/', function () {
    return redirect(route('front_home'));
});

/**
 * ADMIN ROUTE
 */

//inside admin
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => ['checklogin']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'CheckUserController@logout')->name('admin_logout');

    //user route
    Route::group(['prefix' => 'user', 'middleware' => 'checktypeuser'], function () {
        Route::get('list', 'UserController@index')->name('user_list');
        Route::get('entry', function () {
            return view('admin.user.entry');
        })->name('user_entry');
        Route::post('entry', 'UserController@entry')->name('user_entry');
        Route::get('details/{id}', 'UserController@details')->name('user_details');
        Route::get('edit/{id}', 'UserController@show_edit')->name('user_edit');
        Route::post('edit/{id}', 'UserController@do_edit')->name('user_edit');
        Route::get('delete/{id}', 'UserController@delete')->name('user_delete');
        Route::post('image/{id}', 'UserController@image')->name('user_image');
        Route::get('image/{id}', function ($id) {
            return redirect(route('user_edit', ['id' => $id]));
        })->name('user_image');
    });

    //profile route
    Route::group(['prefix' => 'profile'], function () {
        Route::get('view', 'UserController@view_profile')->name('profile_view');
        Route::get('edit', 'UserController@before_edit_profile')->name('profile_edit');
        Route::post('edit', 'UserController@do_edit_profile')->name('profile_edit');
        Route::get('image', function () {
            return redirect(route('profile_edit'));
        })->name('profile_image');
        Route::post('image', 'UserController@profile_image')->name('profile_image');
    });

    //school route
    Route::group(['prefix' => 'school'], function () {
        Route::get('list', 'SchoolController@index')->name('school_list');
        Route::get('details/{id}', 'SchoolController@details')->name('school_detail');
        Route::get('entry', 'SchoolController@show_entry')->name('school_entry');
        Route::post('entry', 'SchoolController@do_entry')->name('school_entry');
        Route::get('add_info/{id}', 'SchoolController@before_add_info')->name('school_add_info');
        Route::post('add_info/{id}', 'SchoolController@add_info')->name('school_add_info');
        Route::get('add_course/{id}', 'SchoolController@before_add_course')->name('school_add_course');
        Route::post('add_course/{id}', 'SchoolController@add_course')->name('school_add_course');
        Route::get('ajax/city/{id}', 'SchoolController@ajax_get_city')->name('ajax_get_city');
        Route::get('edit/ajax/city/{id}', 'SchoolController@ajax_get_city')->name('ajax_get_city');
    });
    //school route check limit
    Route::group(['prefix' => 'school', 'middleware' => ['limitaction']], function () {
        Route::get('edit/{id}', 'SchoolController@before_edit')->name('school_edit');
        Route::post('edit/{id}', 'SchoolController@edit')->name('school_edit');
        Route::get('edit_info/{id}', 'SchoolController@before_edit_info')->name('school_edit_info');
        Route::post('edit_info/{id}', 'SchoolController@edit_info')->name('school_edit_info');
        Route::get('edit_course/{id}', 'SchoolController@before_edit_course')->name('school_edit_course');
        Route::post('edit_course/{id}', 'SchoolController@edit_course')->name('school_edit_course');
        Route::get('delete/{id}', 'SchoolController@delete')->name('school_delete');
        Route::get('delete_course/{id}', 'SchoolController@delete_course')->name('school_delete_course');
    });

    //dossier route
    Route::group(['prefix' => 'dossier'], function () {
        Route::get('list', 'DossierController@index')->name('dossier_list');
        Route::get('details/{id}', 'DossierController@details')->name('dossier_details');
        Route::get('entry', 'DossierController@before_entry')->name('dossier_entry');
        Route::post('entry', 'DossierController@entry')->name('dossier_entry');
        Route::get('edit/{id}', 'DossierController@before_edit')->name('dossier_edit');
        Route::post('edit/{id}', 'DossierController@edit')->name('dossier_edit');
        Route::get('delete/{id}', 'DossierController@delete')->name('dossier_delete');
    });

    //area info route
    Route::group(['prefix' => 'area-info'], function () {
        Route::get('list', 'AreaInfoController@index')->name('area_info_list');
        Route::get('details/{id}', 'AreaInfoController@details')->name('area_info_details');
        Route::get('entry', 'AreaInfoController@before_entry')->name('area_info_entry');
        Route::post('entry', 'AreaInfoController@entry')->name('area_info_entry');
        Route::get('edit/{id}', 'AreaInfoController@before_edit')->name('area_info_edit');
        Route::post('edit/{id}', 'AreaInfoController@edit')->name('area_info_edit');
        Route::get('delete/{id}', 'AreaInfoController@delete')->name('area_info_delete');
    });
});


//Outside Admin
Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => 'checklogout'], function () {
    Route::get('login', function () {
        return view('admin/site/login');
    })->name('admin_login');
    Route::post('login', 'CheckUserController@login')->name('admin_login');
    Route::get('remind_password', function () {
        return view('admin/site/remind_password');
    })->name('remind_password');
    Route::post('remind_password', 'CheckUserController@remind_password')->name('remind_password');
    Route::get('reset_password/{id}/{code}', 'CheckUserController@show_reset_password')->name('reset_password');
    Route::post('reset_password/{id}/{code}', 'CheckUserController@do_reset_password')->name('reset_password');
    Route::get('active_account/{id}/{code}', 'UserController@show_active')->name('active_account');
    Route::post('active_account/{id}/{code}', 'UserController@do_active')->name('active_account');
});

Route::get('error', function () {
    return view('errors.common');
})->name('error_page');

/**
 * FRONT ROUTE
 */
Route::group(['prefix' => 'home'], function () {
    Route::get('/', 'HomeController@index')->name('front_home');
    Route::get('list/{name}/{id}', 'ListController@index')->name('front_list');
    Route::get('{name}/{id}', 'ListController@area')->name('front_area');
    Route::get('details/{name}/{id}', 'DetailController@index')->name('front_details');
});

Route::group(['prefix' => 'school'], function () {
    Route::get('/', 'HomeController@school')->name('front_school');
});

Route::group(['prefix' => 'category'], function () {
    Route::get('huong-dan-lam-ho-so', 'ListController@dossier')->name('front_dossier_list');
    Route::get('thong-tin-cac-vung', 'ListController@area_info')->name('front_area_info_list');
    Route::get('huong-dan-lam-ho-so/{name}', 'DetailController@dossier')->name('front_dossier_detail');
    Route::get('thong-tin-cac-vung/{name}', 'DetailController@area_info')->name('front_area_info_detail');
});


Route::get('error_404', 'HomeController@error')->name('front_error');
