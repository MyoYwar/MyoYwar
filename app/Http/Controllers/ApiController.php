<?php
namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class ApiController extends Controller
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

    public function states(Request $request){
        $data = $this->setOrGetRedis(
            $this->generateCacheKey( ['states', $request->input('include')]), 
            $this->createCollectionTranformer($request, 'State')
        );
        return $this->sendResponse($data);
    }

    public function state(Request $request, $name){

        $data = $this->setOrGetRedis(
            $this->generateCacheKey([$name, $request->input('include')]),
            $this->createItemTranformer($request, 'State', $name)
        );

        return $this->sendResponse($data);
    }
    // District 
    public function districts(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'District'));
    }

    public function district(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer($request, 'District', $name));
    }

    // Township
    //
    public function Townships(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Township'));
    }

    public function Township(Request $request, $name){
        return $this->sendResponse($this->createItemTranformer($request, 'Township', $name));
    }

    // Town
    public function Towns(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Town'));
    }

    public function Town(Request $request, $name){
        //return \App\Town::where('name', $name)->toSql();
        return $this->sendResponse($this->createItemTranformer($request, 'Town', $name));
    }
    // Ward
    // Viallage Tracts
    // Village
   

   }
