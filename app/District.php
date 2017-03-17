<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District Extends Model{

    public $incrementing = false;

    public function state(){
        return $this->belongsTo('App\State');
    }
}


