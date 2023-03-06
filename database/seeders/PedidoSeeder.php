<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<500; $i++) {
            DB::table('pedidos')->insert([
                'estado' => 'recibido',
                'created_at' => Carbon::now(),
                'cliente_id' => rand(1, 5),
                'restaurante_id' => rand(1, 30),
                'repartidor_id' => 2
            ]);
        }
    }
}
