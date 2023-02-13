<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment_types')->insert([
            [
                'name' => 'TP-Link TL-WR74',
                'mask_sn' => 'XXAAAAAXAA',
            ],
            [
                'name' => 'D-Link DIR-300',
                'mask_sn' => 'NXXAAXZXaa',
            ],
            [
                'name' => 'D-Link DIR-300 E',
                'mask_sn' => 'NAAAAXZXXX',
            ],
        ]);
    }
}
