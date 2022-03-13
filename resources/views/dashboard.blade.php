@extends('layout.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="background-color: #a1a7ad47;">
                        <div class="card-header">
                            <h3 class="card-title">Agendamentos não aprovados</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex flex-column justify-content-between">
                                    <div><i class="fas fa-car-side"></i> Saida: 16/04/2022 às 09:30</div>
                                    <div><i class="fas fa-car-side fa-flip-horizontal"></i> Retorno: 17/04/2022 às 14:10</div>
                                    <div class="text-truncate">
                                        <i class="fas fa-map-marked"></i> Destino: 3ª Batalhão de Sena Madureira sdsds
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex flex-column justify-content-between">
                                    <div><i class="fas fa-car-side"></i> Saida: 16/04/2022 às 09:30</div>
                                    <div><i class="fas fa-car-side fa-flip-horizontal"></i> Retorno: 17/04/2022 às 14:10</div>
                                    <div class="text-truncate">
                                        <i class="fas fa-map-marked"></i> Destino: 3ª Batalhão de Sena Madureira sdsds
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex flex-column justify-content-between">
                                    <div><i class="fas fa-car-side"></i> Saida: 16/04/2022 às 09:30</div>
                                    <div><i class="fas fa-car-side fa-flip-horizontal"></i> Retorno: 17/04/2022 às 14:10</div>
                                    <div class="text-truncate">
                                        <i class="fas fa-map-marked"></i> Destino: 3ª Batalhão de Sena Madureira sdsds
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="card card-success" style="background-color: #dbf2d947;">
                        <div class="card-header">
                            <h3 class="card-title">Agendamentos aprovados</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex flex-column justify-content-between">
                                    <div><i class="fas fa-car-side"></i> Saida: 16/04/2022 às 09:30</div>
                                    <div><i class="fas fa-car-side fa-flip-horizontal"></i> Retorno: 17/04/2022 às 14:10</div>
                                    <div class="text-truncate">
                                        <i class="fas fa-map-marked"></i> Destino: 3ª Batalhão de Sena Madureira sdsds
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex flex-column justify-content-between">
                                    <div><i class="fas fa-car-side"></i> Saida: 16/04/2022 às 09:30</div>
                                    <div><i class="fas fa-car-side fa-flip-horizontal"></i> Retorno: 17/04/2022 às 14:10</div>
                                    <div class="text-truncate">
                                        <i class="fas fa-map-marked"></i> Destino: 3ª Batalhão de Sena Madureira sdsds
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Agendamentos nos últimos(30 dias)</h3>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body ">

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
