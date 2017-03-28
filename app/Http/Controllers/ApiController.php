<?php
namespace App\Http\Controllers;

use Min\FractalCommands\Traits\Fractal;
use App\Api\Tranformer\StateTranformer;
use Illuminate\Http\Request;
use App\State;

class ApiController extends Controller
{
    use Fractal;

    private $collection = [
        'states', 
        'districts',
        'townships',
        'towns',
        'villageTracts',
        'villages'
    ];

    private $item = [
        'state', 
        'district',
        'township',
        'town',
        'villageTract',
        'village'
    ];

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
        return $this->createCollectionTranformer($request, 'State');
    }

    public function state(Request $request, $name){
        return $this->createItemTranformer($request, 'State', $name);
    }
    // District 
    public function districts(Request $request){
        return $this->createCollectionTranformer($request, 'District');
    }

    public function district(Request $request, $name){
        return $this->createItemTranformer($request, 'District', $name);
    }

    // Township
    //
    public function Townships(Request $request){
        return $this->createCollectionTranformer($request, 'Township');
    }

    public function Township(Request $request, $name){
        return $this->createItemTranformer($request, 'Township', $name);
    }

    // Town
    public function Towns(Request $request){
        return $this->createCollectionTranformer($request, 'Town');
    }

    public function Town(Request $request, $name){
        //return \App\Town::where('name', $name)->toSql();
        return $this->createItemTranformer($request, 'Town', $name);
    }
    // Ward
    // Viallage Tracts
    // Village
    private function getInclude($request){
        if($request->has("include")){
            $this->fractal->parseIncludes($request->include);
        }
    }

    private function createCollectionTranformer($request, $class){
        $this->getInclude($request);
        $data = call_user_func(array($this->modelClass($class), 'all'));
        return $this->transform($data, $this->tranformerClass($class));

    }

    private function createItemTranformer($request, $class, $name){

        $this->getInclude($request);
        $utf = urldecode($name);
        $data = call_user_func(array($this->modelClass($class), 'where'), ['name' => $utf])->first();
        return $this->transformItem($data, $this->tranformerClass($class));

    }



    /**
     * undocumented function
     *
     * @return void
     */
    private function tranformerClass($name)
    {
        $namespace = 'App\\Api\\Tranformer\\';
        $class = $namespace . ucfirst($name) . "Tranformer";
        return new $class;
    }

    private function modelClass($name){
        $class = 'App\\' . ucfirst($name);
        return new $class;
    }
    

   }
