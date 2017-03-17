<?php
namespace App\Api\Tranformer;

use App\Township;
use League\Fractal\TransformerAbstract;

class TownshipTranformer extends TransformerAbstract{ 

    public function transform(Township  $township)
	{
            return [
                'id' => $township->id,
                'name' => $township->name
	    ];
	}

}
