<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessoRequest;
use App\Models\Administracao\AreaAbrangencia;
use App\Models\Administracao\CentralAtendimento;
use App\Models\Administracao\Modalidade;
use App\Models\Administracao\Objeto;
use App\Models\Administracao\SituacaoAcompanhamento;
use App\Models\Administracao\TipoGasto;
use App\Models\Administracao\UnidadesContempladas;
use App\Models\Processo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ProcessoController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $processos = Processo::buscar($perPage, $keyword);

        return view('processos.index', compact('processos'));
    }

    public function create(): View
    {
        $objetos = Objeto::where('status', '=', 'ativo')->get();
        $modalidades = Modalidade::where('status', '=', 'ativo')->get();
        $tiposGastos = TipoGasto::where('status', '=', 'ativo')->get();
        $usuarios = User::where('status', '=', 'ativo')->get();
        $unidadesContempladas = UnidadesContempladas::where('status', '=', 'ativo')->get();
        $areasDeAbrangencias = AreaAbrangencia::where('status', '=', 'ativo')->get();
        $situacoes = SituacaoAcompanhamento::where('status', '=', 'ativo')->get();
        $centrais = CentralAtendimento::where('status', '=', 'ativo')->get();
        return view('processos.create', compact(
            'objetos',
            'modalidades',
            'tiposGastos',
            'usuarios',
            'unidadesContempladas',
            'areasDeAbrangencias',
            'situacoes',
            'centrais'
        ));
    }

    public function store(ProcessoRequest $request): Response
    {
        DB::beginTransaction();

        $processo = Processo::create($request->all());

        if (!$processo) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar um processo!');
        }

        if (!$processo->areaAbrangencia()->sync($request->area_abrangencia_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar uma area de abrangência processo!');
        }

        if (!$processo->unidade()->sync($request->unidades_contempladas_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar uma unidade contemplada!');
        }

        if (!$processo->anotacoes()->create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar as anotações do processo!');
        }

        if (!$processo->tiposGastos()->sync([$request->tipos_gastos_id, $request->valor_tipo_gasto])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar os tipos de gastos do processo!');
        }

        if (!$processo->centrais()->sync($request->central_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar os tipos de gastos do processo!');
        }

        DB::commit();
        return redirect()->route('processo.index')
            ->with('success', 'Processo cadastrado com sucesso!');
    }

    public function show(Processo $processo): View
    {
        return view('processos.show', compact('processo'));
    }

    public function edit(Processo $processo): View
    {
        $objetos = Objeto::where('status', '=', 'ativo')->get();
        $modalidades = Modalidade::where('status', '=', 'ativo')->get();
        $tiposGastos = TipoGasto::where('status', '=', 'ativo')->get();
        $usuarios = User::where('status', '=', 'ativo')->get();
        $unidadesContempladas = UnidadesContempladas::where('status', '=', 'ativo')->get();
        $areasDeAbrangencias = AreaAbrangencia::where('status', '=', 'ativo')->get();
        $situacoes = SituacaoAcompanhamento::where('status', '=', 'ativo')->get();
        $centrais = CentralAtendimento::where('status', '=', 'ativo')->get();

        return view('processos.edit', compact(
            'processo',
            'objetos',
            'modalidades',
            'tiposGastos',
            'usuarios',
            'unidadesContempladas',
            'areasDeAbrangencias',
            'situacoes',
            'centrais'
        ));
    }

    public function update(ProcessoRequest $request, Processo $processo): Response
    {
        DB::beginTransaction();

        if (!$processo->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar um processo!');
        }


        if (!$processo->areaAbrangencia()->sync($request->area_abrangencia_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar uma area de abrangência processo!');
        }

        if (!$processo->unidade()->sync($request->unidades_contempladas_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar uma unidade contemplada!');
        }

        if (!$processo->anotacoes()->create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar as anotações do processo!');
        }

        $dadosTipoGasto = [];
        foreach ($request->tipos_gastos_id as $key => $tipoGasto) {
            $dadosTipoGasto[$tipoGasto] = ['valor_tipo_gasto' => $request->valor_tipo_gasto[$key]];
        }
        
        if (!$processo->tiposGastos()->sync($dadosTipoGasto)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar os tipos de gastos do processo!');
        }

        if (!$processo->centrais()->sync($request->central_id)) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar os tipos de gastos do processo!');
        }

        DB::commit();
        return redirect()->route('processo.index')->with('success', 'Processo cadastrado com sucesso!');
    }

    public function destroy(Processo $processo): Response
    {
        DB::beginTransaction();

        if (!$processo->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar um processo!');
        }

        return redirect()->route('processo.index')->with('success', 'Processo excluído com sucesso!');
    }
}
