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

    public function districts(Request $request, $name, $division){
        //$model = \App\State::where('name', $name)->first();
        //$data = call_user_func([$model, $division])->get();
        return $this->sendResponse($this->getTranformer($name, $division, 'State'));
    }

    public function townships(Request $request, $name, $division){
        return $this->sendResponse($this->getTranformer($name, $division, 'District'));
    }

    public function towns(Request $request, $name, $division){
        return $this->sendResponse($this->getTranformer($name, $division, 'Township'));
    }

    public function getTranformer($name, $divison, $class){
        $model = call_user_func([$this->modelClass($class), 'where'], 'name', $name)->first();
        $data = call_user_func([$model, $divison])->get();
        return $this->transform($data, $this->tranformerClass($divison));

    }
}
