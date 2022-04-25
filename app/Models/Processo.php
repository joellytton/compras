<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Administracao\ProcessoAnotacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function anotacoes()
    {
        return $this->hasMany(ProcessoAnotacao::class);
    }

    public function tiposGastos()
    {
        return $this->belongsToMany(TipoGasto::class, 'processos_tipos_gastos');
    }
}
