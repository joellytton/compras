<?php

namespace App\Http\Controllers\Administracao;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Administracao\ProjetoAtividade;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Administracao\ProjetoAtividadeRequest;

class ProjetoAtividadeController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $projetoAtividades =  ProjetoAtividade::buscar($perPage, $keyword);
        return view("administracao.projeto_atividade.index", compact('projetoAtividades'));
    }

    public function create(): View
    {
        return view("administracao.projeto_atividade.create");
    }

    public function store(ProjetoAtividadeRequest $request): Response
    {
        DB::beginTransaction();

        try {
            ProjetoAtividade::create($request->all());

            DB::commit();

            return redirect()->route('projetoAtividade.index')
                ->with('success', 'Projeto Atividade cadastrado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('projetoAtividade.index')->with('error', 'Erro ao cadastrar Projeto Atividade!');
        }
    }

    public function edit(ProjetoAtividade $projetoAtividade): View
    {
        return view("administracao.projeto_atividade.edit", compact("projetoAtividade"));
    }

    public function update(ProjetoAtividadeRequest $request, ProjetoAtividade $projetoAtividade): Response
    {
        DB::beginTransaction();

        try {
            $projetoAtividade->update($request->all());

            DB::commit();

            return redirect()->route('projetoAtividade.index')
                ->with('success', 'Projeto Atividade atualizado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('projetoAtividade.index')->with('error', 'Erro ao atualizar Projeto Atividade!');
        }
    }

    public function destroy(ProjetoAtividade $projetoAtividade): Response
    {
        DB::beginTransaction();

        try {
            $projetoAtividade->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id]);

            DB::commit();

            return redirect()->route('projetoAtividade.index')
                ->with('success', 'Projeto Atividade excluído com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('projetoAtividade.index')->with('error', 'Erro ao excluir Projeto Atividade!');
        }
    }
}
