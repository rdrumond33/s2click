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
        {{--<div class="col-sm-3"></div>--}}
        <div class="col-sm-12">

            <div class="box">
                <div class="box-body">

                    <div class="box-header with-border">
                        <h3 class="box-title">Paciente</h3>
                        <a onclick="addForm()" class="btn btn-default" style="float: right"><i
                                    class="fas fa-plus-circle"></i>&nbsp; Adicionar</a>

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
        </div>
        @include('Patient.formPatient')
    </div>












@stop


@section('js')
   <script type="text/javascript">

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
                {data: 'nome'},
                {data: 'responsavel'},
                {data: 'especiais'},
                {data: 'necessidade'},
                {data: 'receita'},
                {data: 'updated_at'},
                {data: 'action', orderable: false, searchable: false}

            ],

        });


        function addForm() {
            $('#modal-formPatient').modal('show');
            $('#modal-formPatientform')[0].reset();
            $('.modal-title').text('Adicionar Paciente');
        }

    </script>

@stop
