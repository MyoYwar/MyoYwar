<?php
namespace App\Api\Tranformer;

use App\Township;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class TownshipTranformer extends TransformerAbstract{ 
    use IncludeChild;
    protected $availableIncludes = ['township', 'town' ];

    public function transform(Township  $township)
	{
            return [
                'id' => $township->id,
                'name' => $township->name
	    ];
	}

}
