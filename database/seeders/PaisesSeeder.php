<?php

namespace Database\Seeders;

use App\Models\Administracao\Pais;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create([
            'id' => '1',
            'sigla' => 'BR',
            'nome' => 'Brasil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
