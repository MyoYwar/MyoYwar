<?php
namespace App\Api\Tranformer;
use Illuminate\Database\Eloquent\Model;
use League\Resource\Collection;

trait IncludeChild{

    public function includeDistrict(Model $model){

        $this->canCall(debug_backtrace()[0]['function']);
        return $this->includeModel($model, 'district');

    }

    public function includeTownship(Model $model){
        $this->canCall(debug_backtrace()[0]['function']);
        return $this->includeModel($model, 'township');
    }

    public function includeTown(Model $model){
        $this->canCall(debug_backtrace()[0]['function']);
        return $this->includeModel($model, 'town');
    }

    private function includeModel($parent, $child){
        $data = call_user_func(array($parent, $child . 's'));
        $namespace = 'App\\Api\\Tranformer\\';
        $class = $namespace . ucfirst($child) . "Tranformer";
        return $this->collection($data->get(), new $class);
    }

    private function canCall( $func ){
        $method = strtolower(str_replace('include',"", $func));
        if(! in_array($method, $this->availableIncludes)){
            throw new \Exception("no method avaliavle");
        }

    }

}
