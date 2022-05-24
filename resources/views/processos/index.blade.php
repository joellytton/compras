@extends('layout.app')

@push('css')
<link rel="stylesheet" href="{{asset('assets/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Processo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Início</a></li>
                    <li class="breadcrumb-item active">Processo</li>
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
                        <a class="btn btn-primary btn-md" href="{{route('processo.create')}}" role="button">
                            Novo Processo
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de processos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped" id="processos">
                            <thead>
                                <tr>
                                    <th class="text-center">Sei</th>
                                    <th class="text-center">Edital</th>
                                    <th class="text-center">Área de Abrangência</th>
                                    <th class="text-center">Modalidade</th>
                                    <th class="text-center">Técnico Responsável</th>
                                    <th class="text-center">Tipo de Gasto</th>
                                    <th class="text-center">Centrais</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processos as $processo)
                                <tr>
                                    <td>{{$processo->id}}</td>
                                    <td class="text-center">{{$processo->sei}}</td>
                                    <td class="text-center">{{$processo->edital}}</td>
                                    <td class="text-center">{{$processo->areaAbrangencia[0]->nome}}</td>
                                    <td class="text-center">{{$processo->modalidade->nome}}</td>
                                    <td class="text-center">{{$processo->tecnicoResponsavel->name}}</td>
                                    <td class="text-center">
                                        @foreach ($processo->tiposGastos as $tipoGasto)
                                        {{$tipoGasto->nome}}
                                        @if ($loop->count > 1)
                                        <br>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @foreach ($processo->centrais as $central)
                                        {{$central->nome}}
                                        @if ($loop->count > 1)
                                        <br>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{$processo->situacaoAcompanhamento->nome}}</td>
                                    <td class="text-center">
                                        <a href="{{route('processo.edit', $processo->id)}}"
                                            class="btn btn-primary btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="{{route('processo.show', $processo->id)}}"
                                            class="btn btn-secondary btn-sm mr-1">
                                            <i class="fas fa-clipboard"></i>
                                        </a>
                                        <form action="{{route('processo.destroy', $processo->id)}}" method="POST"
                                            id="formLaravel{{$processo->id}}" style="display:inline;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm mr-1">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="card-footer clearfix">
                            {{ $processos->links() }}
                    </div> --}}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
    $(function () {
        $('#processos').DataTable({
            "oLanguage": {
                "sUrl": "{{asset('assets/datatables/Portuguese-Brasil.json')}}"
            },
            "paging": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, 'Todos'],
            ],
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    })

</script>
@endpush
