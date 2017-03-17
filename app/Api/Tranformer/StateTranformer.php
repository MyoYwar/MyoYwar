<?php
namespace App\Api\Tranformer;

use App\State;
use League\Resource\Collection;
use League\Fractal\TransformerAbstract;
use App\Api\Tranformer\TownshipTranformer;

class StateTranformer extends TransformerAbstract{ 
    protected $availableIncludes = [ 'township', 'town' ];

    public function transform(State  $state)
	{
            return [
                'id' => $state->id,
                'name' => $state->name
	    ];
    }

    public function includeTownship(State $state){
        //$township = $state->townships();
        //return $this->collection($township, new TownshipTranformer);
        return $this->includeModel($state, 'township');
    }

    public function includeTown(State $state){
        return $this->includeModel($state, 'town');
    }
    private function includeModel($parent, $child){
        $data = call_user_func(array($parent, $child . 's'));
        $namespace = 'App\\Api\\Tranformer\\';
        $class = $namespace . ucfirst($child) . "Tranformer";
        return $this->collection($data, new $class);
    }

}
