<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RepartidorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<2; $i++) {
            DB::table('users')->insert([
                'nombre' => Str::random(10),
                'apellidos' => Str::random(10),
                'email' => 'repartidor'. $i .'@email.es',
                'password' => bcrypt('12345678'),
                'rol' => 'repartidor',
                'telefono' => rand(600000000, 799999999),
                'salario' => rand(1100, 1300),
                'estado' => 'libre',
                'created_at' => Carbon::now()
            ]);
        }
    }
}
