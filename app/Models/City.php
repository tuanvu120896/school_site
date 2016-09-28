<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    protected $table = 'cities';

    public function get_all() {
        $cities = $this->orderBy('number','asc')->get();
        return $cities;
    }

    public function get_city_by_locality($id) {
        $cities = $this->where('id_locality', $id)->get();
        return $cities;
    }

    public function get_by_id($id) {
        $city = $this->where(['id' => $id])->first();
        if($city){
            return $city->toArray();
        }
        return NULL;
    }

}
