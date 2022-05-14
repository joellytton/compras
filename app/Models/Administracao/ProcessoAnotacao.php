<?php

namespace App\Models\Administracao;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_cadastro_id', 'id');
    }
}
