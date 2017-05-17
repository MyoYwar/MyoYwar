<?php
namespace App\Http\Controllers\Traits;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

trait ApiControllerTrait{

    private function sendResponse($content){

        return response( $content , 200)
            ->header('Content-Type', 'json');

    }
    private function parseInclude($include){
        if( !is_null($include) ){
            if($include instanceof Request){
                $request = $include;
                if($request->has('include')){
                    $this->fractal->parseIncludes($this->toSingular($request->input('include')));
                }
            }else{
                $this->fractal->parseIncludes($this->toSingular($include));
            }
        }
    }
    private function toSingular($include){
        if (substr($include, -1) == 's') {
            return substr_replace($include, "", -1);
        }else{
            return $include;
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
   
    private function transformerClass($name)
    {
       
        $namespace = 'App\\Api\\Tranformer\\';
        $class = $namespace . $this->toSingular(ucfirst($name)) . "Tranformer";
        return new $class;
    }

    private function modelClass($name){
        $class = 'App\\' . ucfirst($name);
        return new $class;
    }

}
