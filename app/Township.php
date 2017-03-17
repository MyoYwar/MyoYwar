<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Township Extends Model{

    public $incrementing = false;

    public function district(){
        return $this->belongsTo('App\District');
    }


}


