<?php

namespace App\Traits;
use \Illuminate\Database\Eloquent\Builder;

trait QueryParams
{
    /**
     * @param  Builder  $model
     * @param array $query
     * @return Builder
     */
    public function setQuery(Builder $model, array $query): Builder
    {
        foreach ($query as $key => $item){
            $model = $model->where($key, $item);
        }

        return $model;
    }

}
