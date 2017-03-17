<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town Extends Model{

    public $incrementing = false;

    public function township(){
        return $this->belongTo('App\Township');
    }


}


