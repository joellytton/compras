@extends('layout.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ação/Convênio</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                    <li class="breadcrumb-item active">Ação/Convênio</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 text-right mb-4">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary btn-md" href="{{route('acaoConvenio.create')}}" role="button">
                            Nova ação/convênio
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de ação/convênios</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th class="text-center">Ação/Convênio</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($acoes as $acao)
                                <tr>
                                    <td>{{$acao->id}}</td>
                                    <td class="text-center">{{$acao->nome}}</td>
                                    <td class="text-center">
                                        <a href="{{route('acaoConvenio.edit', $acao->id)}}"
                                            class="btn btn-primary btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{route('acaoConvenio.destroy', $acao->id)}}" method="POST"
                                            id="formLaravel{{$acao->id}}" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm mr-1 submit" idform={{$acao->id}}>
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">Nenhum ação/conenio encontrado</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="card-footer clearfix">
                            {{ $acoes->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
