<?php

namespace App\Http\Requests;

use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Services\MaskProcessingServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateEquipmentRequest extends FormRequest
{

    private $equipment;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!$this->equipment = Equipment::with('type')->find($this->id)){
            throw new \Exception('not found');
        }

        $this->mask();

        return Auth::check();
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function mask()
    {
        $service = new MaskProcessingServices();

        $type = $this->equipment->type;

        $sn = $this->sn;

        if (!is_null($this->type_id)){
            if (!$type = EquipmentType::find($this->type_id)){
                throw new \Exception('type_id not found');
            }
        }

        if (is_null($sn)){
            $sn = $this->equipment->sn;
        }

        if (!$service->checkMask($type->mask_sn, $sn)){
            throw new \Exception('sn: ' . $sn . ' does not match the mask');
        }
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sn' => 'sometimes|required|unique:Equipment',
            'type_id' => 'sometimes|required',
        ];
    }
}
