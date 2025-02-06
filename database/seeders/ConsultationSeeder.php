<?php

namespace Database\Seeders;

use App\Models\MasterData\Consultation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $consultation=[
            [
                'name'=> 'JANTUNG SESAK',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'TEKANAN DARAH TINGGI',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
            [
                'name'=> 'GANGGUAN IRAMA JANTUNG',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s'),
            ],
           
        ];

        // this array will be inserted into the Consulation
        Consultation::insert($consultation);

    }
}
