<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;
use Min\FractalCommands\Traits\Fractal;
use App\Http\Controllers\Traits\ApiTrait;

class DivisionsController extends Controller
{
    use Fractal,  ApiTrait;

    public $model;
    public $transformer;

    public function __construct(Model $model, TransformerAbstract $transformer)
    {
        $this->model = $model;

        $this->transformer = $transformer;

        $this->loadFractal();
    }

    public function divisions(Request $request){

        $data = $this->getBy($request);

        if($get = $request->input('get')){
            return $this->sendChildDivisions($get, $data);
        }

        $this->parseInclude($request);
        return $this->sendResponse($this->transform($data,$this->transformer));

    }

    public function division(Request $request, $id){
        $data = $this->model->find($id);
        $this->parseInclude($request);
        return $this->transformItem($data, $this->transformer);
    }

    public function subDivisions(Request $request, $id, $division){
        $data = $this->model->find($id)->$division()->get();
        return $this->transform($data,$this->transformerClass($division)); 
    }


}
