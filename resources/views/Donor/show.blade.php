@extends('adminlte::page')

@section('title', 'S2Click')

@section('content_header')
    <h1>O {{$doador->nome}} <br> id:{{$doador->id}} </h1>

@stop



@section('content')

    <div class="row">
        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h2 class="box-title">Produto doado</h2>
                </div>
                <div class="box-body">
                    <form action="{{route('Product.RelacinarDonorProduct',$doador->id)}}" method="POST">

                        @csrf


                        <div class="form-row">

                            <div class="col-sm-6">
                                <select class="js-example-basic-single" name="state" style="width: 100%">
                                    @foreach(\App\Product::all() as $produto)
                                        <option value="{{$produto->id}}">{{$produto->nome}}
                                            :{{$produto->amount}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-sm-6">
                                <input type="text" name="amount" class="form-control" placeholder="quantidade">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="margin: 20px">Salvar</button>

                                <button type="button" class="btn btn-warning" href="#">Voltar</button>
                            </div>

                        </div>
                    </form>


                </div>


            </div>
        </div>

        <div class="col-lg-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela de Produtos Doados pelo{{\App\Donor::find($doador->id)->nome}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>


                <div class="box-body" style="">

                    <th>
                        <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                                data-target="#AdicionarProduto"></button>
                    </th>


                    <table id="tabelaDoacao" class="table table-striped table-bordered" style="width:100%">
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



    <!-- Modal -->
    <div class="modal fade" id="AdicionarProduto">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Adicionar doador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('Product.store',$doador->id)}}" method="POST">


                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="marca">marca</label>
                                <input type="text" name="marca" class="form-control" id="marca">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="categoria">categoria</label>
                                <input type="text" name="categoria" class="form-control" id="categoria">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="descricaoProduto">descricaoProduto</label>
                                    <input type="text" name="descricaoProduto" class="form-control"
                                           id="descricaoProduto">
                                </div>


                                <div class="form-group">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Salvar</button>

                                    <button type="button" class="btn btn-warning" href="{{route('donor.index')}}">Voltar
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form><!-- Fim form -->
                </div>
            </div> <!-- Fim modal-body -->
        </div>
    </div> <!-- Fim Modal -->

@stop

@section('js')
    <script>

        $(document).ready(function () {
            $('#tabelaDoacao').DataTable({
                processing: true,
                serverSide: true,
                order: [[5, "asc"]],

                ajax: "{{route('donor.api.getDonorProduct',$doador->id)}}",
                columns: [

                    {data: 'Nome Produto'},
                    {data: 'quantidade'},
                    {data: 'quantidade'},
                    {data: 'quantidade'},


                ],

            });
        });

    </script>
@stop
