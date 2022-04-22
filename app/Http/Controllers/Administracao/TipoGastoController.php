<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\TipoGastoRequest;
use App\Models\Administracao\TipoGasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class TipoGastoController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $tiposGastos = TipoGasto::buscar($perPage, $keyword);

        return view('administracao.tipo_gasto.index', compact('tiposGastos'));
    }

    public function create(): View
    {
        return view('administracao.tipo_gasto.create');
    }

    public function store(TipoGastoRequest $request): Response
    {
        DB::beginTransaction();

        if (!TipoGasto::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao cadastrar um tipo de gasto!');
        }

        DB::commit();

        return redirect()->route('tipoGasto.index')->with('success', 'Tipo de gasto cadastrado com sucesso!');
    }

    public function edit(TipoGasto $tipoGasto): View
    {
        return view('administracao.tipo_gasto.edit', compact('tipoGasto'));
    }

    public function update(TipoGastoRequest $request, TipoGasto $tipoGasto): Response
    {
        DB::beginTransaction();

        if (!$tipoGasto->update($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao atualizar um tipo de gasto!');
        }

        DB::commit();

        return redirect()->route('tipoGasto.index')->with('success', 'Tipo de gasto atualizado com sucesso!');
    }

    public function destroy(TipoGasto $tipoGasto): Response
    {
        DB::beginTransaction();

        if (!$tipoGasto->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id])) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha ao excluir um tipo de gasto!');
        }

        DB::commit();

        return redirect()->route('tipoGasto.index')->with('success', 'Tipo de gasto excluído com sucesso!');
    }
}
