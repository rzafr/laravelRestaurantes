<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'dni' => Str::random(10),
            'nombre' => 'German',
            'apellidos' => 'Lopez Ruiz',
            'email' => 'admin1@email.es',
            'password' => bcrypt('12345678'),
            'rol' => 'admin',
            'telefono' => Str::random(9),
            'created_at' => Carbon::now()
        ]);
    }
}
