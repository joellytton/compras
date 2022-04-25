<?php

namespace App\Models\Administracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessoAnotacao extends Model
{
    use HasFactory;

    protected $table = 'processo_anotacoes';

    protected $fillable = [
        'descricao',
        'processo_id',
        'user_cadastro_id',
        'user_alteracao_id',
        'status',
        'created_at',
        'updated_at'
    ];
}
