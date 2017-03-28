<?php
namespace App\Api\Tranformer;
use Illuminate\Database\Eloquent\Model;

trait Tranform{

    public function transform(Model $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'uni' => $model->unicode,
            'zg' => $model->zawgyi
        ];
    }
}
