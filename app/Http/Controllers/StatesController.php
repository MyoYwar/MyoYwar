<?php
namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class StatesController extends Controller
{
    use Fractal, ApiControllerTrait;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $model;

    public function __construct(State $model)
    {
        $this->model = $model;
        $this->loadFractal();
    }

    public function states(Request $request){

        $data = $this->getBy($request);

        if($func = $request->input('get')){
            
            $data  = $data->first()->$func()->get();
            return $this->sendResponse($this->transform($data,$this->transformerClass($func)));

        }
        $this->parseInclude($request);
        return $this->sendResponse($this->transform($data,new StateTranformer));
    }

    public function state(Request $request, $id){
        $data = $this->model->find($id);
        $this->parseInclude($request);
        return $this->transformItem($data, new StateTranformer);
    }

    public function divisions(Request $request, $id, $division){
        $data = $this->model->find($id)->$division()->get();
        return $this->transform($data,$this->transformerClass($division)); 
    }

    private function parseParameter($request){
        
    }
    private function getBy($request){

        if($id = $request->input('id')){
            return $this->model->where('id', $id)->get();
        }
        if($name = $request->input('name')){
            return $this->model->where('name', $name)
                ->get();
        }
        return $this->model->all();

    }



}
