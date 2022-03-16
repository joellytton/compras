<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administracao\AreaAbrangenciaRequest;
use App\Models\Administracao\AreaAbrangencia;
use App\Models\Administracao\Cidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AreaAbrangenciaController extends Controller
{
    public function index(Request $request): View
    {
        $perPage = 10;
        $keyword = empty($request->search) ? '' : $request->search;

        $areasAbrangencia = AreaAbrangencia::buscar($perPage, $keyword);
        return view('administracao.area_abrangencia.index', compact('areasAbrangencia'));
    }

    public function create(): View
    {
        $cidades = Cidade::where('status', 'ativo')->get();
        return view('administracao.area_abrangencia.create', compact('cidades'));
    }

    public function store(AreaAbrangenciaRequest $request): Response
    {
        DB::beginTransaction();

        if (!AreaAbrangencia::create($request->all())) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar área de abrangência!');
        }

        DB::commit();
        return redirect()->route('areaAbrangencia.index')
            ->with('success', 'Área de abrangência cadastrada com sucesso!');
    }


    public function edit(AreaAbrangencia $areaAbrangencia): View
    {
        $cidades = Cidade::where('status', 'ativo')->get();
        return view('administracao.area_abrangencia.edit', compact('areaAbrangencia', 'cidades'));
    }

    public function update(AreaAbrangenciaRequest $request, AreaAbrangencia $areaAbrangencia): Response
    {
        $areaAbrangencia->update($request->all());

        return redirect()->route('areaAbrangencia.index')
            ->with('success', 'Área de abrangência atualizada com sucesso!');
    }

    public function destroy(AreaAbrangencia $areaAbrangencia): Response
    {
        $areaAbrangencia->update(['status' => 'inativo', 'user_alteracao_id' => auth()->user()->id]);

        return redirect()->route('areaAbrangencia.index')
            ->with('success', 'Área de abrangência excluída com sucesso!');
    }
}
