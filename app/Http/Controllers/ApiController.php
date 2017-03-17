<?php
namespace App\Http\Controllers;

use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;
use Illuminate\Http\Request;
use App\State;

class ApiController extends Controller
{
    use Fractal;

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
        if($request->has("include")){
            $this->fractal->parseIncludes($request->include);
        }
        return $this->transform(State::all(), new StateTranformer);
    }

}
