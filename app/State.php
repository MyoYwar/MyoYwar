<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State Extends Model{

    public $incrementing = false;

    public function districts(){
        return $this->hasMany('App\District');
    }


    public function townships(){
        return $this->getInclude("App\Township", $this->id);
    }

    public function towns(){
        return $this->getInclude("App\Town");
    }

    public function getInclude($model){
        return call_user_func_array(array($model, 'where'), array('path', 'Like', "%" . $this->id . "%" ))->get();
    }
}


