<?php

namespace App\Models\Administracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class Modalidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'modalidade',
        'status',
        'user_cadastro_id',
        'user_alteracao_id',
        'created_at',
        'updated_at'
    ];

    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('status', 'ativo')
            ->where('modalidade', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }
}
