@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>
        S2CLICK
        <small>Version 1.0</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Tabela Doador</li>
    </ol>

@stop

@section('content')

    <div class="row"><!-- inicio da Row -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Doadores</h3>
                    <a onclick="addForm()" class="btn btn-default" style="float: right;margin-right: 5px"><i
                                class="fab fa-product-hunt" style="padding-right: 10px"></i>Adicionar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tabelaDoadores" class="table table-light table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>Tipo</th>
                                        <th>cadastrado</th>
                                        <th>acao</th>
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
        @include('Donor.form')
    </div> {{--fim da row--}}





@stop

@section('js')
    <script type="text/javascript">

        $(document).ready(function () {


            var table = $('#tabelaDoadores').DataTable({

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


                ajax: "{{route('donor.api.getDonor')}}",
                columns: [
                    {data: 'nome'},
                    {data: 'cpf'},
                    {data: 'endereco'},
                    {data: 'telefone'},
                    {data: 'email'},
                    {data: 'tipo'},
                    {data: 'created_at'},

                    {data: 'action', name: 'action', ordernable: false, searchable: false}
                ],

            });


        });

        function addForm() {
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Adicionar Doador');
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

                    },
                    error: function () {
                        alert("ERRO")
                    }

                });


            }


        }

    </script>


@stop
