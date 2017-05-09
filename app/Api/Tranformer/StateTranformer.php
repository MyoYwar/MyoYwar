<?php
namespace App\Api\Tranformer;

use App\State;
use App\Api\Tranformer\Traform;
use App\Api\Tranformer\IncludeChild;
use League\Fractal\TransformerAbstract;

class StateTranformer extends TransformerAbstract{ 
    use IncludeChild;
    use Tranform;

    protected $availableIncludes = ['district', 'township', 'town' ];


}
