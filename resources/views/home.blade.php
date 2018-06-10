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
                                        <th>Nome</th>
                                        <th>Responsavel</th>
                                        <th>Especiais</th>
                                        <th>Necessidade</th>
                                        <th>Receita</th>
                                        <th>Ultima Doação</th>
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

        {{--@include('Donor.form')--}}
        {{--@include('Donor.formEdit')--}}
        @include('Product.formAddProduto')


    </div>





@stop

@section('js')

    <script>

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
                ajax: "{{route('Patient.Api.getDatablePatient')}}",
                columns: [

                    {data: 'nome', orderable: false, searchable: true},
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



        function addForm() {
            save_method = "add";
            console.log(save_method);
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Adicionar Doador');
        }

        function addFormProduto() {
            save_method='add';
            console.log(save_method+'produto');

            $('input[name=_method]').val('POST');
            $('#modal-formAddProduto').modal('show');
            $('#modal-formAddProduto form')[0].reset();
            $('.modal-title').text('Adicionar Produto');
        }

        $(function () {
            $('#modal-formAddProduto from').validator().on('submit',function (e) {
                if (!e.isDefaultPrevented()){
                   var id=$('#id').val();

                    if (save_method == 'add') {
                        url="{{ route('product.store') }}";
                    }
                    else {
                        url = "{{url('product')}}" +'/'+ id;
                    }
                   $.ajax({
                       url:url,
                       type:"POST",
                       data:$('#modal-formAddProduto form').serialize(),
                       success: function ($data) {
                           $('#modal-formAddProduto').modal('hide')
                       },
                       error:function () {
                           alert("errro")
                       }
                   });
                   return false;
                }
            });
        });

        function editProduto(idproduto) {

            save_method = 'edit';
            console.log(save_method);
            $('#modal-formEditProduto form')[0].reset();
            $.ajax({
                url: "{{ url('product') }}" + '/' + idproduto + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-formEditProduto').modal('show');
                    $('.modal-title').text('Editar Produto');


                },

                error: function () {
                    alert("Nothin DATA")
                }
            });


        }



        function editForm(id) {

            save_method = 'edit';
            console.log(save_method);
            $('#modal-formEdit form')[0].reset();
            $.ajax({
                url: "{{url('donor')}}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-formEdit').modal('show');
                    $('.modal-title').text('Editar Doador');

                    $('#id').val(data.id);
                    $('#nome').val(data.nome);
                    $('#cpf').val(data.cpf);
                    $('#email').val(data.email);
                    $('#endereco').val(data.endereco);
                    $('#telefone').val(data.telefone);
                    $('#tipo').val(data.tipo);

                },

                error: function () {
                    alert("Nothin DATA")
                }
            });

        }

        function deletDonor(id) {
            var popup = confirm("Deseja mesmo deletar");
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (popup == true) {

                $.ajax({
                    url: "{{url('donor')}}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        $('#tabelaDoadores').DataTable().ajax.reload();
                        console.log(data);
                    },
                    error: function () {
                        alert("ERRO")
                    }

                });


            }


        }

    </script>


@stop