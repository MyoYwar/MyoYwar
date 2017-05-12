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
        if( isset($include)){
            if($include instanceof Request){
                $request = $include;
                if($request->include){
                    $this->fractal->parseIncludes($request->include);
                }
            }else{

                $this->fractal->parseIncludes($include);
            }
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
   

    private function createCollectionTranformer($include, $class){
        $this->parseInclude($include);
        $data = call_user_func(array($this->modelClass($class), 'all'));
        return $this->transform($data, $this->tranformerClass($class));

    }

    private function createItemTranformer($include, $class, $name){

        $this->parseInclude($include);
        $utf = urldecode($name);
        $data = call_user_func(array($this->modelClass($class), 'where'), ['name' => $utf])->first();
        // null must show error
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
