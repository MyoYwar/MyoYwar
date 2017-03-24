<?php
namespace App\Api\Tranformer;

use App\District;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class DistrictTranformer extends TransformerAbstract{ 
    use IncludeChild;
    protected $availableIncludes = ['township', 'town' ];

    public function transform(District  $district)
	{
            return [
                'id' => $district->id,
                'name' => $district->name

	    ];
	}

}
