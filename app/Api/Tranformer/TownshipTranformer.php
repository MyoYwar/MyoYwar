<?php
namespace App\Api\Tranformer;

use App\Township;
use App\Api\Tranformer\Traform;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class TownshipTranformer extends TransformerAbstract{ 
    use IncludeChild;
    use Tranform;

    protected $availableIncludes = ['township', 'town' ];


}
