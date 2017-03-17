<?php
namespace App\Api\Tranformer;

use App\Town;
use League\Fractal\TransformerAbstract;

class TownTranformer extends TransformerAbstract{ 

    public function transform(Town  $town)
	{
            return [
                'id' => $town->id,
                'name' => $town->name

	    ];
	}

}
