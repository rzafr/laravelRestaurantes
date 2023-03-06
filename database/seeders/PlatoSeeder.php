<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<31; $i++) {
            for($j=0; $j<10; $j++) {
                DB::table('platos')->insert([
                    'nombre' => 'Plato ' . $j,
                    'descripcion' => Str::random(30),
                    'foto' => 'storage/pizza-romana-03.jpg',
                    'precio' => rand(8.00, 19.99),
                    'categoria' => 'italiana',
                    'created_at' => Carbon::now(),
                    'restaurante_id' => $i
                ]);
            }
        }
    }
}
