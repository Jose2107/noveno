<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            'nombre' => 'Metepec',
        ]);
        DB::table('municipios')->insert([
            'nombre' => 'Toluca',
        ]);
        DB::table('municipios')->insert([
            'nombre' => 'Lerma',
           
        ]);
        DB::table('municipios')->insert([
            'nombre' => 'Xonacatlan',
           
        ]);
        DB::table('municipios')->insert([
            'nombre' => 'Temoaya',
           
        ]);
    }
}
