@extends('adminlte::page')

@section('title', 'S2Click|Pacientes')

@section('content_header')
    <h1>
        S2CLICK
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">

        <li><a href="home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href=""><i class="fa fa-dashboard"></i>Paciente</a></li>
        <li class="active"></li>
    </ol>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="box">
                <div class="box-body">

                    <div class="box-header with-border">
                        <h3 class="box-title">Paciente</h3>
                        <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                                data-target="#AdicionarPaciente" style="float: right;"></button>

                        <div class="box-tools pull-right">


                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tablePaciente" class="table " style="width:100%">
                            <thead>
                            <tr>
                                <th>nome</th>
                                <th>responsavel</th>
                                <th>especiais</th>
                                <th>necessidade</th>
                                <th>receita</th>
                                <th>Cadastrado</th>
                                <th>Upadate</th>
                            </tr>
                            <tfoot></tfoot>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>



    <!-- Modal add-->
    <div class="modal" id="AdicionarPaciente" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{route('Patient.store')}}" method="POST" class="form-horizontal" data-toggle="validator">

                    @csrf
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h3 class="modal-title">Adicionar Paciente</h3>

                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" name="nome" class="form-control" id="nome" required>

                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Responsavel</label>
                            <div class="col-md-6">

                                <input type="text" name="responsavel" class="form-control" id="responsavel" required>

                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nececidade especial</label>
                            <div class="col-md-6">

                                <select class="selected" name="especial" style="width: 100%">
                                    <option value="sim">Sim</option>
                                    <option value="nao">Nao</option>
                                </select>


                                <span class="help-block with-errors"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Qual necessidade</label>
                            <div class="col-md-6">
                                <input type="text" name="necessidade" class="form-control"
                                       id="necessidade">

                                <span class="help-block with-errors"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="cpf" class="col-md-3 control-label">Receita</label>
                            <div class="col-md-6">
                                <input type="text" name="receita" class="form-control" id="receita">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>


                    </div> {{--fim modal body --}}]

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                    </div>

                </form>{{--fim do Formulario--}}
            </div>
        </div> <!-- Fim modal-body -->
    </div> <!-- Fim Modal -->










@stop


@section('js')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#tablePaciente').DataTable({

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
                ajax: "{{route('pacient.Api.getDatablePaciente')}}",
                columns: [

                    {data: 'nome'},
                    {data: 'responsavel'},
                    {data: 'especiais'},
                    {data: 'necessidade'},
                    {data: 'receita'},
                    {data: 'updated_at'},

                    {data: 'action', orderable: false, searchable: false}

                ],
            });


        });
    </script>

@stop
