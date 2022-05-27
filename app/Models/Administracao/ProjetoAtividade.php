<?php

namespace App\Models\Administracao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjetoAtividade extends Model
{
    use HasFactory;

    protected $table = 'projeto_atividades';

    protected $fillable = [
        'nome',
        'tipo',
        'status',
        'user_cadastro_id',
        'user_alteracao_id',
        'created_at',
        'updated_at'
    ];

    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'ativo')
            ->where('nome', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }
}
