<?php

namespace App;

trait PlaceCode{

    protected $place = ['state', 'district', 'township', 'town', 'villageTract'];
    protected $methods;

    public function districts(){
        $this->methods = debug_backtrace()[0]['function'];
        return $this->CallInclude('App\District');
    }


    public function townships(){
        $this->methods = debug_backtrace()[0]['function'];
        return $this->CallInclude('App\Township');
    }

       public function towns(){
        $this->methods = debug_backtrace()[0]['function'];
        return $this->CallInclude('App\Town');
    }

    private function getInclude($model){
        return call_user_func_array(array($model, 'where'), array('path', 'Like', "%" . $this->id . "%" ));
    }

    private function callInclude($model){
        if( $this->canCallMethod()){
            return $this->getInclude($model, $this->id);
        }else{
            throw new \Exception("No method");
        }
    }

    private function className(){
        $class = explode("\\", get_class($this));
        return end($class);
    }

    private function canCallMethod(){
        //$methods = debug_backtrace()[2]['function'];

        $method = array_search(strtolower(substr($this->methods, 0, -1)), $this->place);
        $class = array_search(strtolower($this->className()), $this->place);
        return $class < $method;
    }

}



