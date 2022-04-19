<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'sei',
        'edital',
        'total_estimado',
        'total_homologado',
        'data_processo',
        'status',
        'objeto_id',
        'modalidade_id',
        'tecnico_responsavel_id',
        'situacao_acompanhamento_id',
        'user_cadastro_id',
        'user_alteracao_id',
        'created_at',
        'updated_at'
    ];

    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('edital', 'like', "%{$keyword}%")->paginate($perPage);
    }
}
