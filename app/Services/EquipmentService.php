<?php

namespace App\Services;

use App\DTO\EquipmentDTO;
use App\Models\Equipment;
use App\Traits\QueryParams;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class EquipmentService
{
    use QueryParams;

    /**
     * @param $query
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($query = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $equipment =  Equipment::query();

        if (!is_null($query)){
            $equipment = $this->setQuery($equipment, $query);
        }

        return $equipment->paginate(10);
    }

    /**
     * @param  int  $id
     * @return Builder|Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show(int $id)
    {
        return Equipment::query()->find($id);
    }

    /**
     * @param  array $fillable
     * @return bool
     */
    public function store(array $fillable): bool
    {
        return DB::table('equipment')->insert($fillable);
    }

    /**
     * @param  int  $id
     * @param  array  $fillable
     * @return bool
     */
    public function update(int $id, array $fillable): bool
    {
        return Equipment::query()->where('id', $id)->update($fillable);
    }

    /**
     * @param  int  $id
     * @return bool
     */
    public function remove(int $id): bool
    {
        return Equipment::query()->where('id', $id)->delete();
    }
}
