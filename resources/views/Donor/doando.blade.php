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

                    <button type="button" class="fas fa-plus-circle btn btn-default" aria-hidden="true"
                            data-toggle="modal"
                            data-target="#AdicionarProduto" style="float: right"></button>
                </div>
                <div class="box-body">
                    <form action="{{route('Product.RelacinarDonorProduct',$doador->id)}}" method="POST" class="form-horizontal">

                        @csrf

                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Produto</label>
                            <div class="col-md-6">
                                <select class="SelecionarProduto" name="state" style="width: 100%">
                                    @foreach(\App\Product::all() as $produto)
                                        <option value="{{$produto->id}}">{{$produto->nome}}
                                            :{{$produto->amount}}</option>
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
                    <h3 class="box-title">Produtos Doados pelo &nbsp <strong>{{\App\Donor::find($doador->id)->nome}}</strong></h3>


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
    </div>






    <!-- Modal add-->
    <div class="modal" id="AdicionarProduto" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <form method="post" class="form-horizontal" data-toggle="validator">
                    {{csrf_field()}} {{ method_field('POST') }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h3 class="modal-title">Cadastra Produto Novo</h3>

                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="nome" class="col-md-3 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" name="nome" class="form-control" id="nome">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cpf" class="col-md-3 control-label">Marca</label>
                            <div class="col-md-6">
                                <input type="text" name="marca" class="form-control" id="marca">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Categoria</label>
                            <div class="col-md-6">
                                <input type="text" name="categoria" class="form-control" id="categoria">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="endereco" class="col-md-3 control-label">DescricaoProduto</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" rows="3"></textarea>
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
                'pdf',
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


    </script>
@stop
