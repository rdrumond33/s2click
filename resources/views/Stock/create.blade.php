@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Adicionar produto</h1>
@stop

@section('content')
    <div class="col-sm-3"></div>
    <div class="col-sm-6">

        <div class="form"></div>
        <form action="{{route('Donor.store')}}" method="POST">

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
                <input type="text" name="amount" class="form-control" placeholder="tipo">
            </div><!-- Fim form-group -->


            <div class="form-group">
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Salvar</button>

                    <button type="button" class="btn btn-warning" href="{{route('Donor.home')}}">Voltar</button>
                </div>
            </div><!-- Fim form-group -->


        </form>
    </div>
    <div class="col-sm-3"></div>
@stop
