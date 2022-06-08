<?php

namespace App\Http\Controllers\Administracao;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Administracao\AcaoConvenios;
use App\Http\Requests\Administracao\AcaoConvenioRequest;

class AcaoConveniosController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $acoes = AcaoConvenios::buscar($perPage, $keyword);
        return view('administracao.acao_convenio.index', compact('acoes'));
    }

    public function create()
    {
        return view('administracao.acao_convenio.create');
    }

    public function store(AcaoConvenioRequest $request)
    {
        DB::beginTransaction();

        try {
            AcaoConvenios::create($request->all());

            DB::commit();

            return redirect()->route('acaoConvenios.index')
                ->with('success', 'Acao/Convenios cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('acaoConvenio.index')->with('error', 'Erro ao cadastrar Acao/Convenios!');
        }
    }

    public function edit(AcaoConvenios $acaoConvenio)
    {
        return view('administracao.acao_convenio.edit', compact('acaoConvenio'));
    }

    public function update(AcaoConvenioRequest $request, AcaoConvenios $acaoConvenio)
    {
        DB::beginTransaction();

        try {
            $acaoConvenio->update($request->all());

            DB::commit();

            return redirect()->route('acaoConvenio.index')
                ->with('success', 'Ação/Convenios atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('acaoConvenio.index')->with('error', 'Erro ao atualizar Ação/Convenios!');
        }
    }

    public function destroy(AcaoConvenios $acaoConvenio)
    {
        DB::beginTransaction();

        try {
            $acaoConvenio->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id]);

            DB::commit();

            return redirect()->route('acaoConvenio.index')->with('success', 'Ação/Convenios excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('acaoConvenio.index')->with('error', 'Erro ao excluir Ação/Convenios!');
        }
    }
}
