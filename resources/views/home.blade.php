@extends('adminlte::page')

@section('title', 'S2click')

@section('content_header')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{DB::table('users')->count()}}</h3>

                    <p>Usuarios registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Para saber quais<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{DB::table('products')->select('amount')->count()}}</h3>

                    <?php
                    $teste = 0;
                    foreach (\App\Product::all() as $produto) {
                        $teste += $produto->amount;
                    }
                    ?>


                    <h4>Produtos cadastrados: {{$teste}} </h4>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{DB::table('donors')->count()}}</h3>

                    <p>Doadores registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{DB::table('patients')->count()}}</h3>

                    <p>Pacientes registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-wheelchair" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>

@stop

@section('content')


    <div class="row">
        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Grafico De Recebiemnto</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="">
                    <div class="chart">
                        <canvas id="areaChart" style="height: 250px; width: 514px;" width="514" height="250"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
        </div>

        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Pacientes</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="">
                    <table id="tablePaciente" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>nome</th>
                            <th>responsavel</th>
                            <th>especiais</th>
                            <th>necessidade</th>
                            <th>receita</th>
                            <th>ultimaDoacao</th>

                            <th>Cadastrado</th>
                            <th>Acao</th>


                        </tr>
                        </thead>
                        <tfoot></tfoot>


                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="margin-left: ">
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
        </div>


    </div>





@stop

@section('js')



    <script>

        $(document).ready(function () {
            $('#tablePaciente').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('Patient.Api')}}",
                columns: [

                    {data: 'nome'},
                    {data: 'responsavel'},
                    {data: 'especiais'},
                    {data: 'necessidade'},
                    {data: 'receita'},
                    {data: 'ultimaDoacao'},
                    {data: 'created_at'},
                    {data: 'action', orderable: false, searchable: false}

                ],

            });
        });

    </script>

    <script>
        var ctx = document.getElementById("areaChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

@stop