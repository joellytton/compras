<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Administracao\TipoGasto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administracao\Modalidade;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Administracao\AreaAbrangencia;
use App\Models\Administracao\ProcessoAnotacao;
use App\Models\Administracao\CentralAtendimento;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Administracao\UnidadesContempladas;
use App\Models\Administracao\SituacaoAcompanhamento;
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

    protected function dataProcesso(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('d/m/Y'),
            set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::where('edital', 'like', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function anotacoes()
    {
        return $this->hasMany(ProcessoAnotacao::class);
    }

    public function tiposGastos()
    {
        return $this->belongsToMany(TipoGasto::class, 'processos_tipos_gastos', 'processo_id', 'tipos_gastos_id')
            ->withPivot('valor_tipo_gasto', 'valor_tipo_gasto')->withTimestamps();
    }

    public function centrais()
    {
        return $this->belongsToMany(
            CentralAtendimento::class,
            'central_atendimento_processos',
            'processo_id',
            'central_atendimento_id'
        );
    }

    public function areaAbrangencia()
    {
        return $this->belongsToMany(
            AreaAbrangencia::class,
            'areas_abrangencias_processos',
            'processo_id',
            'area_abrangencia_id'
        );
    }

    public function unidade()
    {
        return $this->belongsToMany(
            UnidadesContempladas::class,
            'processo_unidade',
            'processo_id',
            'unidades_contempladas_id'
        );
    }

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function tecnicoResponsavel()
    {
        return $this->belongsTo(User::class, 'tecnico_responsavel_id', 'id');
    }

    public function situacaoAcompanhamento()
    {
        return $this->belongsTo(SituacaoAcompanhamento::class);
    }
}
