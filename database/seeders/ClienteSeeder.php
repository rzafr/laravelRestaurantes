<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<5; $i++) {
            DB::table('users')->insert([
                'dni' => Str::random(10),
                'nombre' => Str::random(10),
                'apellidos' => Str::random(10),
                'email' => 'cliente'. $i .'@email.es',
                'password' => bcrypt('12345678'),
                'rol' => 'cliente',
                'direccion' => Str::random(15),
                'ciudad' => 'Cuevas del Almanzora',
                'telefono' => Str::random(9),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
