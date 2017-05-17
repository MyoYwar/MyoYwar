<?php
namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class DivisionController extends Controller
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

    public function state(Request $request, $id){

/*        $data = $this->setOrGetRedis(*/
            //$this->generateCacheKey([$name, $request->input('include')]),
            //$this->createItemTranformer($request, 'State', $name)
        //);
        $data = $this->createItemTranformer(new \App\State, $id, $request);
        return $data;
        return $this->sendResponse($data);
    }

    public function district(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer($request, 'District', $name));
    }

    public function Township(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer($request, 'Township', $name));
    }

    public function Town(Request $request, $name){
        //return \App\Town::where('name', $name)->toSql();
        return $this->sendResponse($this->createItemTranformer($request, 'Town', $name));
    }
    // Ward
    // Viallage Tracts
    // Village
   
    private function createItemTranformer($model, $id, $request){

        $this->parseInclude($request);
        return $this->transformItem($model->find($id), $this->tranformerClass($class));

    }

   }
