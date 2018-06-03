@extends('adminlte::page')

@section('title', 'S2click')

@section('content_header')
    <h1>
        S2CLICK
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"></li>
    </ol>
@stop

@section('content')


    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
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

        <div class="col-md-3 col-sm-6 col-xs-6">
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

                    <p>Quatidade em Stock:&nbsp;{{$teste}} </p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{DB::table('donors')->count()}}</h3>

                    <p>Doadores registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-donate"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-6">
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




    <div class="row"><!-- inicio da Row -->
        <div class="col-md-6 ">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Produtos</h3>
                    <a onclick="addForm()" class="btn btn-default" style="float: right;margin-right: 5px"><i
                                class="fab fa-product-hunt" style="padding-right: 10px"></i>Adicionar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">

                                <table id="tableProduto" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>nome</th>
                                        <th>marca</th>
                                        <th>categoria</th>
                                        <th>descricaoProduto</th>
                                        <th>amount</th>
                                        <th>Cadastrado</th>
                                        <th></th>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>


        <div class="col-md-6 ">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Paticente</h3>
                    <a onclick="addForm()" class="btn btn-default" style="float: right;margin-right: 5px"><i
                                class="fab fa-accessible-icon" style="padding-right: 10px"></i>Adicionar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">

                                <table id="tablePaciente" class="table table-striped table-bordered"
                                       style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>nome</th>
                                        <th>responsavel</th>
                                        <th>especiais</th>
                                        <th>necessidade</th>
                                        <th>receita</th>
                                        <th>ultimaDoacao</th>
                                        <th>Cadastrado</th>
                                        <th></th>


                                    </tr>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')

    <script>

        $(document).ready(function () {

            $table = $('#tablePaciente').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                language: {
                    sEmptyTable: "Nenhum registro encontrado",
                    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                    sInfoFiltered: "(Filtrados de _MAX_ registros)",
                    sInfoPostFix: "",
                    sInfoThousands: ".",
                    sLengthMenu: "_MENU_ resultados por página",
                    sLoadingRecords: "Carregando...",
                    sProcessing: "Processando...",
                    sZeroRecords: "Nenhum registro encontrado",
                    sSearch: "Pesquisar",
                    oPaginate: {
                        sNext: "Próximo",
                        sPrevious: "Anterior",
                        sFirst: "Primeiro",
                        sLast: "Último"
                    },
                    oAria: {
                        sSortAscending: ": Ordenar colunas de forma ascendente",
                        sSortDescending: ": Ordenar colunas de forma descendente"
                    }
                },
                order: [[5, "asc"]],
                ajax: "{{route('Patient.Api.getDatablePatient')}}",
                columns: [

                    {data: 'nome', orderable: false, searchable: false},
                    {data: 'responsavel', orderable: false, searchable: false},
                    {data: 'especiais', orderable: false, searchable: false},
                    {data: 'necessidade', orderable: false, searchable: false},
                    {data: 'receita', orderable: false, searchable: false},
                    {data: 'ultimaDoacao'},
                    {data: 'created_at', orderable: false, searchable: false},
                    {data: 'action', orderable: false, searchable: false}

                ],

            });

            $table2 = $('#tableProduto').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                language: {
                    sEmptyTable: "Nenhum registro encontrado",
                    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                    sInfoFiltered: "(Filtrados de _MAX_ registros)",
                    sInfoPostFix: "",
                    sInfoThousands: ".",
                    sLengthMenu: "_MENU_ resultados por página",
                    sLoadingRecords: "Carregando...",
                    sProcessing: "Processando...",
                    sZeroRecords: "Nenhum registro encontrado",
                    sSearch: "Pesquisar",
                    oPaginate: {
                        sNext: "Próximo",
                        sPrevious: "Anterior",
                        sFirst: "Primeiro",
                        sLast: "Último"
                    },
                    oAria: {
                        sSortAscending: ": Ordenar colunas de forma ascendente",
                        sSortDescending: ": Ordenar colunas de forma descendente"
                    }
                },

                order: [[5, "asc"]],
                ajax: "{{route('Produto.Api.getDatableProduct')}}",
                columns: [

                    {data: 'nome'},
                    {data: 'marca'},
                    {data: 'categoria'},
                    {data: 'descricaoProduto'},
                    {data: 'amount'},
                    {data: 'created_at'},

                    {data: 'action', orderable: false, searchable: false}

                ],
            });
        })
        ;

    </script>


@stop