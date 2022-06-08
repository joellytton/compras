@extends('layout.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Ação/Convênio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{route('acaoConvenio.index')}}">Lista de ação/convênio</a>
                        </li>
                        <li class="breadcrumb-item active">Editar Ação/Convênio</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <form action="{{route('acaoConvenio.update', $acaoConvenio)}}" method="post">
                            @csrf
                            @method('PUT')
                            @include('administracao.acao_convenio.form')
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
