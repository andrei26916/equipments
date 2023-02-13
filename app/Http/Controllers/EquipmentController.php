<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexEquipmentRequest;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Http\Resources\EquipmentCollection;
use App\Http\Resources\EquipmentResource;
use App\Services\EquipmentService;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * @param  IndexEquipmentRequest  $request
     * @param  EquipmentService  $service
     * @return EquipmentCollection
     */
    public function index(IndexEquipmentRequest $request, EquipmentService $service)
    {
        return new EquipmentCollection($service->index($request->validated()));
    }

    /**
     * @param  Request  $request
     * @param  EquipmentService  $service
     * @return EquipmentResource
     */
    public function show(Request $request, EquipmentService $service)
    {
        return new EquipmentResource($service->show($request->id));
    }

    /**
     * @param  StoreEquipmentRequest  $request
     * @param  EquipmentService  $service
     * @return EquipmentResource
     */
    public function store(StoreEquipmentRequest $request, EquipmentService $service)
    {
        return new EquipmentResource([
            'status' => $service->store($request->sns)
        ]);
    }

    /**
     * @param  UpdateEquipmentRequest  $request
     * @param  EquipmentService  $service
     * @return EquipmentResource
     */
    public function update(UpdateEquipmentRequest $request, EquipmentService $service)
    {
        return new EquipmentResource([
            'status' => $service->update($request->id, $request->validated())
        ]);
    }

    /**
     * @param  Request  $request
     * @param  EquipmentService  $service
     * @return EquipmentResource
     */
    public function remove(Request $request, EquipmentService $service)
    {
        return new EquipmentResource([
            'status' => $service->remove($request->id)
        ]);
    }
}
