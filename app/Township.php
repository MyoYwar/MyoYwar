<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township Extends Model{
    public $incrementing = false;
    use PlaceCode;

    public function district(){
        return $this->belongsTo('App\District');
    }


}


