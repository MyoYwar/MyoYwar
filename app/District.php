<?php

namespace App;
use App\PlaceCode;

use Illuminate\Database\Eloquent\Model;

class District Extends Model{
    use PlaceCode;
    public $incrementing = false;

    public function state(){
        return $this->belongsTo('App\State');
    }

    public function townships(){
        return $this->hasMany('App\Township');
    }


}


