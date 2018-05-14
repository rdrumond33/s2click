@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="h2">Tabela de doadores </h2>
        </div>
        <div class="box-body">

            <table id="" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cpf/Cnpj</th>
                    <th>Endereço</th>
                    <th>TElefone</th>
                    <th>E-mail</th>
                    <th>Tipo</th>

                    <th>
                        <a href="{{route('Donor.create')}}">

                            <i type="button" class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                <tfoot>
                @foreach(\App\Donor::all() as $donors)
                    <tr>

                        <td><a class="btn-link " href="#">{{$donors->nome}}</a></td>
                        <td>{{$donors->cpfCnpj}}</td>
                        <td>{{$donors->endereco}}</td>
                        <td>{{$donors->telefone}}</td>
                        <td>{{$donors->email}}</td>
                        <td>{{$donors->tipo}}</td>
                        <td>


                            <a href="{{route('Stock.create',$donors->id)}}"><i class="fa fa-product-hunt" aria-hidden="true"></i>
                            </a>
                            <a href="#" type="button" value="Editar"
                               class="btn btn-warning "><i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>

                            <a href="#" type="button" value="Editar"
                               class="btn btn-success "><i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tfoot>
            </table>
        </div>
    </div>
@stop