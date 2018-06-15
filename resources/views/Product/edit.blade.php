@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-sm-3"></div>

    <div class="col-sm-6">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Produto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('product.update',$product->id)}}" method="POST" class="form-horizontal">

                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h3 class="modal-title"></h3>

                </div>


                <div class="modal-body">

                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Nome produto</label>
                        <div class="col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" value="{{$product->nome}}"
                                   autofocus >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">marca</label>
                        <div class="col-md-6">
                            <input type="text" name="marca" class="form-control" id="marca"
                                   value="{{$product->marca}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Categoria</label>
                        <div class="col-md-6">
                            <input type="text" name="categoria" class="form-control" id="categoria"
                                   value="{{$product->categoria}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="col-md-3 control-label">DescricaoProduto</label>
                        <div class="col-md-6">
                            <input type="text" name="descricaoProduto" class="form-control" id="descricaoProduto"
                                   value="{{$product->descricaoProduto}}">
                        </div>
                    </div>


                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal"><a href="{{route('home')}}" class="link">Voltar</a></button>
                    </div>
                </div>

            </form>{{--fim do Formulario--}}

        </div>
    </div>

    <div class="col-sm-3"></div>



@stop
