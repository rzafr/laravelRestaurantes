<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<30; $i++) {
            DB::table('restaurantes')->insert([
                'nombre' => 'Restaurante '. $i,
                'direccion' => Str::random(10),
                'ciudad' => 'Cuevas del Almanzora',
                'telefono' => rand(600000000, 799999999),
                'latitud' => '37.296944',
                'longitud' => '-1.879722',
                'created_at' => Carbon::now()
            ]);
        }
    }
}
