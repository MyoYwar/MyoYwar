<?php
namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class HierarchicalDivisionController extends Controller
{
    use Fractal, ApiControllerTrait;


   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->loadFractal();
    }

    public function districts(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer('district', 'State', $name));
    }

    public function townships(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer('township', 'District', $name));
    }

    public function towns(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer('town', 'Township', $name));
    }


     }
