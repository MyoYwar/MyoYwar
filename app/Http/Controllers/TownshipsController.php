<?php
namespace App\Http\Controllers;

use App\Township;
use App\Api\Tranformer\TownshipTranformer;
use App\Http\Controllers\DivisionsController;

class TownshipsController extends DivisionsController
{

    public function __construct(Township $model, TownshipTranformer $transformer)
    {
        parent::__construct($model, $transformer);

    }

}
