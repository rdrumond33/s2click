@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <div class="form">

            <form action="{}" method="POST">

                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div><!-- Fim form-group -->

                <div class="form-group">
                    <label>cpfCnpj</label>
                    <input type="text" name="cpfCnpj" class="form-control" placeholder="quantidade">
                </div><!-- Fim form-group -->

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div><!-- Fim form-group -->

                <div class="form-group">
                    <label>endereco</label>
                    <input type="text" name="endereco" class="form-control" placeholder="endereço">
                </div><!-- Fim form-group -->

                <div class="form-group">
                    <label>telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="telefone">
                </div><!-- Fim form-group -->

                <div class="form-group">
                    <label>tipo</label>
                    <input type="text" name="tipo" class="form-control" placeholder="tipo">
                </div><!-- Fim form-group -->


                <div class="form-group">
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Salvar</button>

                        <button type="button" class="btn btn-warning" href="{{route('donor.index')}}">Voltar</button>
                    </div>
                </div><!-- Fim form-group -->


            </form>
        </div>
    </div>
    <div class="col-sm-3"></div>




@stop
