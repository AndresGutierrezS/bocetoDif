<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpedienteSeeder extends Seeder
{
    public function run()
    {
        DB::table('expediente')->insert([
            [
                'no_expediente' => 'EXP-001',
                'antiguedad_expediente' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_expediente' => 'EXP-002',
                'antiguedad_expediente' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
