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
                {{--<a href="#" class="small-box-footer">Para saber quais<i class="fa fa-arrow-circle-right"></i></a>--}}
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
                {{--<a href="#" class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>--}}
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
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
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
                {{--<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>


    </div>




    <div class="row"><!-- inicio da Row -->
        <div class="col-md-6 ">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Produtos</h3>

                    <a onclick="addFormProduto()" class="btn btn-default" style="float: right;margin-right: 5px"><i
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
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Categoria</th>
                                        <th>DescricaoProduto</th>
                                        <th>Amount</th>
                                        <th>Data de cadastro</th>
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
                    <a onclick="addFormPatient()" class="btn btn-default" style="float: right;margin-right: 5px"><i
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
                                        <th>Nome</th>
                                        <th>Cpf Paciente</th>
                                        <th>Responsavel</th>
                                        <th>Cpf responsavel</th>
                                        <th>Especiais</th>
                                        <th>Necessidade</th>
                                        <th>Receita</th>
                                        <th>Ultima Doação</th>
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

        @include('Product.formAddProduto')


    </div>

        @include('Patient.formPatient')




@stop

@section('js')

    <script>

        var $table = $('#tablePaciente').DataTable({
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
            ajax: "{{route('Patient.Api.getDatablePatient')}}",
            columns: [

                {data: 'nome', orderable: false, searchable: true},
                {data: 'cpfPaciente', orderable: false, searchable: true},
                {data: 'responsavel', orderable: false, searchable: false},
                {data: 'Cpfresponsavel', orderable: false, searchable: true},

                {data: 'especiais', orderable: false, searchable: false},
                {data: 'necessidade', orderable: false, searchable: false},
                {data: 'receita', orderable: false, searchable: false},
                {data: 'ultimaDoacao'},
                {data: 'action', orderable: false, searchable: false}

            ],

        });

        var $tableproduto = $('#tableProduto').DataTable({
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


        function addFormProduto() {
            $('#modal-formAddProduto').modal('show');
            $('#modal-formAddProduto form')[0].reset();
            $('.modal-title').text('Adicionar Produto');
        }

        function deletproduct(id) {
            var popup = confirm("Deseja mesmo deletar este Produto");
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (popup == true) {

                $.ajax({
                    url: "{{url('product')}}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        $('#tableProduto').DataTable().ajax.reload();
                        window.location.reload();

                    },
                    error: function () {
                        alert("ERRO")
                    }

                });


            }


        }

        //--------------Paciente---------------
        function addFormPatient() {
            $('#modal-formPatient').modal('show');
            $('#modal-formPatient form')[0].reset();
            $('.modal-title').text('Adicionar Paciente');
        }

        function deletPatient(id) {
            var popup = confirm("Deseja Eliminar este Paciente ");
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (popup == true) {

                $.ajax({
                    url: "{{url('patient')}}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        window.location.reload();
                        $('#tablePaciente').DataTable().ajax.reload();
                        window.location.reload();


                    },
                    error: function () {
                        alert("ERRO")
                    }

                });


            }


        }

    </script>





@stop