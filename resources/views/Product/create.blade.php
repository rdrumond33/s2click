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
                    <h3 class="box-title">cadastro produto</h3>

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

                    <div class="form"></div>
                    <form action="{{route('Product.store',$doador->id)}}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label>Nomo do Produto</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                        </div><!-- Fim form-group -->


                        <div class="form-group">
                            <label>marca</label>
                            <input type="text" name="marca" class="form-control" placeholder="endereço">
                        </div><!-- Fim form-group -->

                        <div class="form-group">
                            <label>categoria</label>
                            <input type="text" name="categoria" class="form-control" placeholder="telefone">
                        </div><!-- Fim form-group -->

                        <div class="form-group">
                            <label>descricaoProduto</label>
                            <input type="text" name="descricaoProduto" class="form-control" placeholder="tipo">
                        </div><!-- Fim form-group -->

                        <div class="form-group">
                            <label>amount</label>
                            <input type="text" name="amount" class="form-control" placeholder="amount">
                        </div><!-- Fim form-group -->


                        <div class="form-group">
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Salvar</button>

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
                    <h3 class="box-title">tabela</h3>

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

                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome produto</th>
                            <th>marca</th>
                            <th>categoria</th>
                            <th>descricaoProduto</th>
                            <th>quantidade</th>

                            <th>
                                <a href="{{route('Donor.create')}}">
                                    <i type="button" class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                        <tfoot>
                        @foreach(\App\Donor::find($doador->id)->products as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->marca}}</td>
                                <td>{{$user->categoria}}</td>
                                <td>{{$user->descricaoProduto}}</td>
                                <td>{{$user->amount}}</td>

                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
