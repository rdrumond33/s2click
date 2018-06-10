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
                    <a onclick="addForm()" class="btn btn-default" style="float: right"><i
                                class="fas fa-plus-circle"></i>Adicionar</a>
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

    {{--<!-- Modal add-->--}}
    {{--<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}

                {{--<form action="{{route('donor.store')}}" method="POST" class="form-horizontal" data-toggle="validator">--}}

                    {{--@csrf--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}

                        {{--<h3 class="modal-title"></h3>--}}

                    {{--</div>--}}

                    {{--<div class="modal-body">--}}

                        {{--<input type="hidden" id="id" name="id">--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="nome" class="col-md-3 control-label">Nome</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" name="nome" class="form-control" id="nome" autofocus required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="cpf" class="col-md-3 control-label">CPF</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" name="cpf" class="form-control" id="cpf">--}}
                                {{--<span class="help-block with-errors"></span>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="email" class="col-md-3 control-label">Email</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="email" name="email" class="form-control" id="email" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="endereco" class="col-md-3 control-label">Endereco</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" name="endereco" class="form-control" id="endereco">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="telefone" class="col-md-3 control-label">Telefone</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="tel" name="telefone" class="form-control" id="telefone" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}

                            {{--<label for="tipo" class="col-md-3 control-label">Tipo</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<select class="form-control" name="tipo" id="tipo">--}}
                                    {{--<option>Mensal</option>--}}
                                    {{--<option>Esporadico</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div> --}}{{--fim modal body --}}{{--]--}}

                    {{--<div class="modal-footer">--}}

                        {{--<button type="submit" class="btn btn-primary btn-save">Salvar</button>--}}

                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>--}}
                    {{--</div>--}}

                {{--</form>--}}{{--fim do Formulario--}}
            {{--</div>--}}
        {{--</div> <!-- Fim modal-body -->--}}
    {{--</div> <!-- Fim Modal -->--}}


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


            $(function () {

                $('#modal-form form').validator().on('submit', function (e) {

                    if (!e.isDefaultPrevented()) {
                        var id = $('#id').val();
                        console.log(id);

                        if (save_method == 'add') {
                            url = "{{ route('donor.store') }}";
                        }
                        else {
                            url = "donor/" + id;
                        }
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: $('#modal-form from').serialize(),
                            success: function ($data) {
                                $('#modal-form').modal('hide');
                                $('#tabelaDoadores').DataTable().ajax.reload();

                            },
                            error: function (error) {
                                console.log(JSON.stringify(error));

                            }
                        });

                    }

                });

            });


        });

        function addForm() {
            save_method = "add";
            console.log(save_method);
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Adicionar Doador');
        }


        function editForm(id) {

            save_method = 'edit';
            console.log(save_method);
            $('input[name=_method]').val('PUT');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{url('donor')}}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-form').modal('show');
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
