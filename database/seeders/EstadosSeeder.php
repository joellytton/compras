<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert(array('id' => '11', 'pais_id' => '1', 'sigla' => 'RO', 'nome' => 'Rondônia', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '12', 'pais_id' => '1', 'sigla' => 'AC', 'nome' => 'Acre', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '13', 'pais_id' => '1', 'sigla' => 'AM', 'nome' => 'Amazonas', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '14', 'pais_id' => '1', 'sigla' => 'RR', 'nome' => 'Roraima', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '15', 'pais_id' => '1', 'sigla' => 'PA', 'nome' => 'Pará', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '16', 'pais_id' => '1', 'sigla' => 'AP', 'nome' => 'Amapá', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '17', 'pais_id' => '1', 'sigla' => 'TO', 'nome' => 'Tocantins', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '21', 'pais_id' => '1', 'sigla' => 'MA', 'nome' => 'Maranhão', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '22', 'pais_id' => '1', 'sigla' => 'PI', 'nome' => 'Piauí', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '23', 'pais_id' => '1', 'sigla' => 'CE', 'nome' => 'Ceará', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '24', 'pais_id' => '1', 'sigla' => 'RN', 'nome' => 'Rio Grande do Norte', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '25', 'pais_id' => '1', 'sigla' => 'PB', 'nome' => 'Paraíba', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '26', 'pais_id' => '1', 'sigla' => 'PE', 'nome' => 'Pernambuco', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '27', 'pais_id' => '1', 'sigla' => 'AL', 'nome' => 'Alagoas', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '28', 'pais_id' => '1', 'sigla' => 'SE', 'nome' => 'Sergipe', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '29', 'pais_id' => '1', 'sigla' => 'BA', 'nome' => 'Bahia', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '31', 'pais_id' => '1', 'sigla' => 'MG', 'nome' => 'Minas Gerais', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '32', 'pais_id' => '1', 'sigla' => 'ES', 'nome' => 'Espírito Santo', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '33', 'pais_id' => '1', 'sigla' => 'RJ', 'nome' => 'Rio de Janeiro', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '35', 'pais_id' => '1', 'sigla' => 'SP', 'nome' => 'São Paulo', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '41', 'pais_id' => '1', 'sigla' => 'PR', 'nome' => 'Paraná', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '42', 'pais_id' => '1', 'sigla' => 'SC', 'nome' => 'Santa Catarina', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '43', 'pais_id' => '1', 'sigla' => 'RS', 'nome' => 'Rio Grande do Sul', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '50', 'pais_id' => '1', 'sigla' => 'MS', 'nome' => 'Mato Grosso do Sul', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '51', 'pais_id' => '1', 'sigla' => 'MT', 'nome' => 'Mato Grosso', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '52', 'pais_id' => '1', 'sigla' => 'GO', 'nome' => 'Goiás', 'created_at' => now(), 'updated_at' => now()));
        DB::table('estados')->insert(array('id' => '53', 'pais_id' => '1', 'sigla' => 'DF', 'nome' => 'Distrito Federal', 'created_at' => now(), 'updated_at' => now()));
    }
}
