<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbergueSeeder extends Seeder
{
    public function run()
    {
        DB::table('albergue')->insert([
            [
                'descripcion' => 'Albergue Infantil Esperanza',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'descripcion' => 'Hogar Comunitario San José',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
