<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model {
    protected $table = 'localities';

    public function get_all() {
        $localities = $this->all();
        return $localities;
    }

    public function get_by_id($id) {
        $locality = $this->where(['id' => $id])->first();
        if($locality){
            return $locality->toArray();
        }
        return NULL;
    }
}
