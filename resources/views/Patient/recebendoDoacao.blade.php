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
        <li><a href=""><i class="fa fa-dashboard"></i>Doando
                &nbsp;<strong>{{App\Patient::all()->find($idPacinete)->nome}}</strong>
            </a></li>

        <li class="active"></li>
    </ol>
@stop

@section('content')

    <div class="row">
        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Produtos </h2>


                </div>
                <div class="box-body">
                    <form action="{{route('Patient.relacionando',$idPacinete)}}" method="POST"

                          class="form-horizontal">

                        @csrf

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Produto</label>
                            <div class="col-md-6">
                                <select class="SelecionarProduto" name="idProduto" style="width: 100%">
                                    @foreach(\App\Product::all() as $produto)
                                        @if($produto->amount == 0)
                                            <option value="{{$produto->id}}">{{$produto->nome." ".$produto->marca}}
                                                &nbsp;<strong>Qdt:&nbsp; Indisponivel</strong></option>
                                        @else
                                            <option value="{{$produto->id}}">{{$produto->nome." ".$produto->marca}}
                                                &nbsp;<strong>Qdt:&nbsp;{{$produto->amount}}</strong></option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Quantidade</label>
                            <div class="col-md-6">
                                <input style="width: 50%" type="number" class="form-control" name="amount"
                                       id="amount"
                                       placeholder="quantidade">
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary btn-save">Salvar</button>
                        </div>
                    </form>

                </div>

            </div>


        </div>


        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Produtos Recebidos por
                        <strong> {{App\Patient::all()->find($idPacinete)->nome}}</strong></h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <table id="tabelaProdutodDoados" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nome produto</th>
                            <th>quantidade</th>
                            <th>data</th>

                        </tr>
                        <tfoot>
                        </tfoot>
                    </table>


                </div>

            </div>

        </div>
    </div>


@stop

@section('js')

    <script>
        $(document).ready(function () {

            $('.SelecionarProduto').select2({
                placeholder: 'Selecione o Produto'
            });

            var table = $('#tabelaProdutodDoados').DataTable({

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


                ajax: "{{route('Produto.Api.getDatableProductDoados',$idPacinete)}}",

                columns: [
                    {data: 'Produto'},
                    {data: 'quantidadeDoada'},
                    {data: 'created_at'},
                ],

            });


        });


    </script>




@stop