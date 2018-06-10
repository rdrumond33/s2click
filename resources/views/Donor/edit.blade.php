@extends('adminlte::page')

@section('title', 'S2click')

@section('content_header')
    <h1>
        S2CLICK
        <small>Version 1.0</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active"></li>
    </ol>
@stop

@section('content')

    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('donor.update',$doador->id)}}" method="POST" class="form-horizontal"
              data-toggle="validator">

            @csrf
            @method("PUT")
            <div class="row">


                <div class="form-group">
                    <label for="nome" class="col-md-3 control-label">Nome</label>
                    <div class="col-md-6">
                        <input type="text" name="nome" class="form-control" id="nome" autofocus required
                               value="{{$doador->nome}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpf" class="col-md-3 control-label">CPF</label>
                    <div class="col-md-6">
                        <input type="text" name="cpf" class="form-control" id="cpf" value="{{$doador->cpf}}">
                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-md-3 control-label">Email</label>
                    <div class="col-md-6">
                        <input type="text" name="email" class="form-control" id="email" required
                               value="{{$doador->email}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="endereco" class="col-md-3 control-label">Endereco</label>
                    <div class="col-md-6">
                        <input type="text" name="endereco" class="form-control" id="endereco"
                               value="{{$doador->endereco}}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefone" class="col-md-3 control-label">Telefone</label>
                    <div class="col-md-6">
                        <input type="tel" name="telefone" class="form-control" id="telefone" required
                               value="{{$doador->telefone}}">
                    </div>
                </div>
                <div class="form-group">

                    <label for="tipo" class="col-md-3 control-label">Tipo</label>
                    <div class="col-md-6">
                        <select class="form-control" name="tipo" id="tipo" value="{{$doador->tipo}}">
                            <option>Mensal</option>
                            <option>Esporadico</option>
                        </select>
                    </div>

            </div>
                    <div class="footer">

                    <label for="tipo" class="col-md-3 control-label"></label>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                </div>
        </form>{{--fim do Formulario--}}

    </div>
    <div class="col-sm-3"></div>
@stop
