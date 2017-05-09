<?php
namespace App\Api\Tranformer;

use App\District;
use App\Api\Tranformer\Traform;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class DistrictTranformer extends TransformerAbstract{ 
    use IncludeChild;
    use Tranform;
    protected $availableIncludes = ['township', 'town' ];

}

