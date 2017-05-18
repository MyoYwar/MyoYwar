<?php
namespace App\Http\Controllers;

use App\State;
use App\Api\Tranformer\StateTranformer;
use App\Http\Controllers\DivisionsController;

class StatesController extends DivisionsController
{

    public function __construct(State $model, StateTranformer $transformer)
    {
        parent::__construct($model, $transformer);

    }

}
