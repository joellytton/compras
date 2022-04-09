<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'joellytton mendonça dos santos',
            'email' => 'joellytton25@gmail.com',
            'password' => Hash::make(12345678),
            'perfil_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ])->pessoaFisica()->create([
            'user_id' => 1,
            'cpf' => '12345678901',
            'rg' => '123456789',
            'data_nascimento' => '1996-01-01',
            'sexo' => 'masculino',
            'user_cadastro_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
