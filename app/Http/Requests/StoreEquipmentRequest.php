<?php

namespace App\Http\Requests;

use App\Models\Equipment;
use App\Models\EquipmentType;
use App\Services\MaskProcessingServices;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEquipmentRequest extends FormRequest
{

    protected $array = [];

    public $sns = [];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @throws \Exception
     */
    public function authorize()
    {
        $this->setSn();

        $this->mask();

        return Auth::check();
    }

    private function setSn()
    {
        if (!is_array($this->sn)){
            $this->array[] = $this->sn;
        }else{
            $this->array = $this->sn;
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function mask()
    {
        $service = new MaskProcessingServices();

        $equipmentType = EquipmentType::query()->select('id', 'mask_sn')->get();

        foreach ($this->array as $key=>$value){
            foreach ($equipmentType as $type){
                $this->sns[$key] = [
                    'sn' => $value,
                    'type_id' => null,
                ];

                if ($service->checkMask($type->mask_sn, $value)){
                    $this->sns[$key] = [
                        'sn' => $value,
                        'type_id' => $type->id
                    ];
                    break;
                }
            }

            if (is_null($this->sns[$key]['type_id'])){
                throw new \Exception('sn: ' . $value . ' does not match the mask');
            }
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
            'sn' => 'required|unique:Equipment',
        ];
    }
}
