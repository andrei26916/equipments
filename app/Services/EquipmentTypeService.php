<?php

namespace App\Services;

use App\Models\EquipmentType;
use App\Traits\QueryParams;

class EquipmentTypeService
{
    use QueryParams;

    /**
     * @param $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($query = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $equipmentType =  EquipmentType::query();

        if (!is_null($query)){
            $equipmentType = $this->setQuery($equipmentType, $query);
        }

        return $equipmentType->paginate(10);
    }

}
