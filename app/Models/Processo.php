<?php

namespace App\Models;

use App\Models\Administracao\AcaoConvenios;
use Carbon\Carbon;
use App\Models\Administracao\TipoGasto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Administracao\Modalidade;
use Illuminate\Pagination\AbstractPaginator;
use App\Models\Administracao\AreaAbrangencia;
use App\Models\Administracao\ProcessoAnotacao;
use App\Models\Administracao\CentralAtendimento;
use App\Models\Administracao\ProjetoAtividade;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Administracao\UnidadesContempladas;
use App\Models\Administracao\SituacaoAcompanhamento;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_processo',
        'edital',
        'modalidade_id',
        'objeto_id',
        'sei',
        'situacao_acompanhamento_id',
        'status',
        'tecnico_responsavel_id',
        'total_estimado',
        'total_homologado',
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
        return self::with(
            'areaAbrangencia',
            'centrais',
            'modalidade',
            'situacaoAcompanhamento',
            'tecnicoResponsavel',
            'tiposGastos',
        )
            ->where('status', 'ativo')
            ->where('edital', 'like', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function acaoConvenio()
    {
        return $this->belongsToMany(
            AcaoConvenios::class,
            'acao_convenios_processos',
            'processo_id',
            'acao_convenios_id'
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

    public function anotacoes()
    {
        return $this->hasMany(ProcessoAnotacao::class);
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

    public function modalidade()
    {
        return $this->belongsTo(Modalidade::class);
    }

    public function projetoAtividade()
    {
        return $this->belongsToMany(
            ProjetoAtividade::class,
            'projeto_atividades_processos',
            'processo_id',
            'projeto_atividades_id'
        );
    }

    public function tiposGastos()
    {
        return $this->belongsToMany(TipoGasto::class, 'processos_tipos_gastos', 'processo_id', 'tipos_gastos_id')
            ->withPivot('valor_tipo_gasto', 'valor_tipo_gasto')->withTimestamps();
    }

    public function tecnicoResponsavel()
    {
        return $this->belongsTo(User::class, 'tecnico_responsavel_id', 'id');
    }

    public function situacaoAcompanhamento()
    {
        return $this->belongsTo(SituacaoAcompanhamento::class);
    }

    public function unidades()
    {
        return $this->belongsToMany(
            UnidadesContempladas::class,
            'processo_unidade',
            'processo_id',
            'unidades_contempladas_id'
        );
    }
}
