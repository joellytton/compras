<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{

    public function run()
    {
        DB::table("perfil")->insert(array("id" => "1", "nome" => "ADMINISTRADOR", "created_at" => now(), "updated_at" => now()));
        DB::table("perfil")->insert(array("id" => "2", "nome" => "TÉCNICO", "created_at" => now(), "updated_at" => now()));
        DB::table("perfil")->insert(array("id" => "3", "nome" => "USUÁRIO", "created_at" => now(), "updated_at" => now()));

    }
}
