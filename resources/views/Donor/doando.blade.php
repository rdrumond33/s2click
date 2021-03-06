@extends('adminlte::page')

@section('title', 'S2Click||Doando')

@section('content_header')
    <h1>
        S2CLICK
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="{{route('donor.index')}}"><i class="fa fa-dashboard"></i>Doadores</a></li>
        <li><a href=""><i class="fa fa-dashboard"></i>Doação</a></li>

        <li class="active"></li>
    </ol>
@stop


@section('content')

    <div class="row">
        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Produto doado</h2>

                    <a onclick="addForm()" class="btn btn-default" style="float: right;margin-right: 5px"><i
                                class="fab fa-product-hunt" style="padding-right: 10px"></i>Adicionar</a>
                </div>
                <div class="box-body">

                    <form action="{{route('Product.RelacinarDonorProduct',$doador->id)}}" method="POST"
                          class="form-horizontal">

                        @csrf

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Produto</label>
                            <div class="col-md-6">
                                <select class="SelecionarProduto" name="state" style="width: 100%">
                                    @foreach(\App\Product::all() as $produto)
                                        <option value="{{$produto->id}}">{{$produto->nome.' '.$produto->marca}}
                                            &nbsp;<strong>Qdt:&nbsp;{{$produto->amount}}</strong></option>
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

        <div class="col-lg-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Produtos Doados pelo
                        <strong>{{\App\Donor::find($doador->id)->nome}}</strong></h3>


                </div>


                <div class="box-body" style="">


                    <table id="tabelaDoacao" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nome produto</th>
                            <th>quantidade</th>
                            <th>data</th>
                        </tr>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
        @include('Donor.donorProductadd')
    </div>









@stop

@section('js')
    <script>

        $('.SelecionarProduto').select2({
            placeholder: 'Selecione um Produto'
        });


        $table = $('#tabelaDoacao').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    title: 'Produtos doados por {{$doador->nome}}'
                }
            ],

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

            ajax: "{{route('donor.api.getDonorProduct',$doador->id)}}",
            columns: [

                {data: 'Produto'},
                {data: 'quantidade'},
                {data: 'created_at'},

            ],

        });

        function addForm() {
            $('#modal-formAddProduto').modal('show');
            $('#modal-formAddProduto form')[0].reset();
            $('.modal-title').text('Adicionar Produto');
        }

    </script>
@stop
