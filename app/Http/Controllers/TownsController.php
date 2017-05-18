<?php
namespace App\Http\Controllers;

use App\Town;
use App\Api\Tranformer\TownTranformer;
use App\Http\Controllers\DivisionsController;

class TownsController extends DivisionsController 
{

    public function __construct(Town $model, TownTranformer $transformer)
    {
        parent::__construct($model, $transformer);

    }

}
