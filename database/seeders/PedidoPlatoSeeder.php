<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoPlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<500; $i++) {
            DB::table('pedido_plato')->insert([
                'pedido_id' => rand(20, 200),
                'plato_id' => rand(1, 300),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
