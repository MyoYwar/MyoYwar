<?php

namespace App\Http\Controllers;

use App\State;
use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;

class StatesController extends Controller
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

    //
    public function index(){
        return $this->transform(State::all(), new StateTranformer);
    }
}
