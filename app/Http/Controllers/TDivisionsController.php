<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class TDivisionsController extends Controller
{
    use Fractal, ApiControllerTrait;

   public function __construct()
    {
        $this->loadFractal();
    }

    public function states(Request $request){

        $data = $this->getBy($request, new \App\State);
        $this->parseInclude($request);
        return $this->transform($data, $this->tranformerClass('State')); 
        return $this->sendResponse($data);
    }

    private function getBy($request, $model){

        if($id = $request->input('id')){
            return $model->where('id', $id)->get();
        }
        if($name = $request->input('name')){
            return $model->where('name', $name)
                ->get();
        }
        return $model->all();
        
    }



    public function districts(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'District'));
    }

    public function Townships(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Township'));
    }

    public function Towns(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Town'));
    }

    private function createCollectionTranformer($include, $class){
        $this->parseInclude($include);
        $data = call_user_func(array($this->modelClass($class), 'all'));
        return $this->transform($data, $this->tranformerClass($class));

    }
    // Ward
    // Viallage Tracts
    // Village
   

   }
