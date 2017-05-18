<?php
namespace App\Http\Controllers;

use App\District;
use App\Api\Tranformer\DistrictTranformer;
use App\Http\Controllers\DivisionsController;

class DistrictsController extends DivisionsController
{

    public function __construct(District $model, DistrictTranformer $transformer)
    {
        parent::__construct($model, $transformer);

    }

}
