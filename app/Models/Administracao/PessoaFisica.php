<?php

namespace App\Models\Administracao;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    use HasFactory;

    protected $table = 'pessoas_fisicas';

    protected $fillable = [
        'user_id',
        'cpf',
        'rg',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'user_cadastro_id',
        'user_alteracao_id',
        'created_at',
        'updated_at',
    ];

    protected function dataNascimento(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d')
        );
    }
}
