<?php
namespace App\Api\Tranformer;

use App\State;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class StateTranformer extends TransformerAbstract{ 
    use IncludeChild;

    protected $availableIncludes = ['district', 'township', 'town' ];

    public function transform(State  $state)
	{
            return [
                'id' => $state->id,
                'name' => $state->name
	    ];
    }

    

/*    public function includeTownship(State $state){*/
       //return $this->includeModel($state, 'township');
    //}

    //public function includeTown(State $state){
        //return $this->includeModel($state, 'town');
    //}

    //private function includeModel($parent, $child){
        //$data = call_user_func(array($parent, $child . 's'));
        //$namespace = 'App\\Api\\Tranformer\\';
        //$class = $namespace . ucfirst($child) . "Tranformer";
        //return $this->collection($data, new $class);
    //}

}
