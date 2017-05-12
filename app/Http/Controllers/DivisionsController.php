<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ApiControllerTrait;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class DivisionsController extends Controller
{
    use Fractal, ApiControllerTrait;

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

    public function districts(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'District'));
    }

    public function Townships(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Township'));
    }

    public function Towns(Request $request){
        return $this->sendResponse($this->createCollectionTranformer($request, 'Town'));
    }

    // Ward
    // Viallage Tracts
    // Village
   

   }
