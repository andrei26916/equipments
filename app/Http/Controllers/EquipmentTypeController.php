<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexEquipmentTypeRequest;
use App\Http\Resources\EquipmentTypeResource;
use App\Services\EquipmentTypeService;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    /**
     * @param  IndexEquipmentTypeRequest  $request
     * @param  EquipmentTypeService  $service
     * @return EquipmentTypeResource
     */
    public function index(IndexEquipmentTypeRequest $request, EquipmentTypeService $service)
    {
        return new EquipmentTypeResource($service->index($request->validated()));
    }
}
