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


        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Paciente &nbsp {{$paciente->nome}}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('Patient.update',$paciente->id)}}" method="POST" class="form-horizontal">

                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="nome" class="col-md-3 control-label">Nome</label>
                    <div class="col-md-6">
                        <input type="text" name="nome" class="form-control" id="nome"
                               value="{{$paciente->nome or ''}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="cpfPaciente" class="col-md-3 control-label">Cpf Paciente</label>
                    <div class="col-md-6">
                        <input type="text" name="cpfPaciente" class="form-control" id="cpfPaciente"
                               value="{{$paciente->cpfPaciente or ''}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome" class="col-md-3 control-label">Responsavel</label>
                    <div class="col-md-6">

                        <input type="text" name="responsavel" class="form-control" id="responsavel" required
                               value="{{$paciente->responsavel or ''}}">

                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Cpfresponsavel" class="col-md-3 control-label">Cpg Responsevel</label>
                    <div class="col-md-6">
                        <input type="text" name="Cpfresponsavel" class="form-control" id="Cpfresponsavel"
                               required value="{{$paciente->Cpfresponsavel or ''}}">

                        <span class="help-block with-errors"></span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">Nececidade especial</label>
                    <div class="col-md-6">

                        <select class="selected" name="especial" style="width: 100%"
                                value="{{$paciente->especial}}">
                            <option value="sim">Sim</option>
                            <option value="nao">Nao</option>
                        </select>


                        <span class="help-block with-errors"></span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="nome" class="col-md-3 control-label">Qual necessidade</label>
                    <div class="col-md-6">
                        <input type="text" name="necessidade" class="form-control"
                               id="necessidade" value="{{$paciente->necessidade}}">

                        <span class="help-block with-errors"></span>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="cpf" class="col-md-3 control-label">Receita</label>
                    <div class="col-md-6">
                        <input type="text" name="receita" class="form-control" id="receita"
                               value="{{$paciente->receita}}">
                        <span class="help-block with-errors"></span>
                    </div>
                </div>


                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal"><a href="{{route('home')}}"
                                                                                          class="link">Voltar</a>
                    </button>
                </div>


            </form>
        </div>
    </div>

    <div class="col-sm-3"></div>




@stop
