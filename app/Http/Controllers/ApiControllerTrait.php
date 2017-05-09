<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redis;

trait ApiControllerTrait{

    private function sendResponse($content){

        return response( $content , 200)
            ->header('Content-Type', 'json');

    }
    private function parseInclude($request){
        if($request->has("include")){
            $this->fractal->parseIncludes($request->include);
        }
    }

    private function setOrGetRedis($key, $data){

        if(  Redis::exists($key) ){
            $data = Redis::get($key);
        }else{
            Redis::set($key, $data);
        }
        return $data;
    }

    private function generateCacheKey(array $keys){
        // remove empty value
        $arr = array_filter($keys);
        return implode($arr, ".");
    }
   

    private function createCollectionTranformer($request, $class){
        $this->parseInclude($request);
        $data = call_user_func(array($this->modelClass($class), 'all'));
        return $this->transform($data, $this->tranformerClass($class));

    }

    private function createItemTranformer($request, $class, $name){

        $this->parseInclude($request);
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
