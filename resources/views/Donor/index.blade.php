@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Doadores</h1>
@stop

@section('content')

    <div class="row">
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
                            <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                                    data-target="#AdicionarDoador"></button>

                        </th>
                    </tr>
                    <tfoot>
                    @foreach(\App\Donor::all() as $donor)
                        <tr>

                            <td><a class="btn-link" href="{{route('Product.create',$donor->id)}}">{{$donor->nome}}</a>
                            </td>
                            <td>{{$donor->endereco}}</td>
                            <td>{{$donor->telefone}}</td>
                            <td>{{$donor->email}}</td>
                            <td>{{$donor->tipo}}</td>
                            <td>


                                <a href="{{route('Product.create',$donor->id)}}"><i class="fa fa-product-hunt"
                                                                                    aria-hidden="true"></i>
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
    </div>


    <!-- Modal -->
    <div class="modal fade" id="AdicionarDoador">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Adicionar doador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('Donor.store')}}" method="POST">


                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cpfCnpj">Cpf/Cnpj</label>
                                <input type="text" name="cpfCnpj" class="form-control" id="cpfCnpj">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="endereco">endereco</label>
                                    <input type="text" name="endereco" class="form-control" id="endereco">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" name="telefone" class="form-control" id="telefone">
                                </div>


                                <div class="form-group col-md-4">

                                    <label for="tipo">Tipo</label>
                                    <select class="form-control" name="tipo" id="tipo">
                                        <option>Mensal</option>
                                        <option>devexenquanto</option>
                                     </select>
                                </div>

                                <div class="form-group">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Salvar</button>

                                    <button type="button" class="btn btn-warning" href="{{route('Donor.index')}}">Voltar
                                    </button>
                                </div>
                            </div>

                    </form><!-- Fim form -->
                </div>
            </div> <!-- Fim modal-body -->
        </div>
    </div> <!-- Fim Modal -->
@stop
