@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <h1>Doadores</h1>
@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h2 class="h2">Tabela de doadores </h2>
        </div>
        <div class="box-body">
            <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                                data-target="#AdicionarDoador"></button>

            <table id="tabelaDoadores" class="display"  style="width:100%">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th></th>

                </tr>
                <tfoot></tfoot>
            </table>
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
                                <input type="text" name="cpf" class="form-control" id="cpfCnpj">
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
                        </div>
                    </form><!-- Fim form -->
                </div>
            </div> <!-- Fim modal-body -->
        </div>
    </div> <!-- Fim Modal -->
@stop

@section('js')

    <script type="text/javascript">

       $(document).ready(function () {
            var table = $('#tabelaDoadores').DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                ajax: "{{route('api.Donor')}}",
                columns: [
                    {data: 'nome', name: 'nome'},
                    {data: 'cpf', name: 'cpf'},
                    {data: 'endereco', name: 'endereco'},
                    {data: 'telefone', name: 'telefone'},
                    {data: 'email', name: 'email'},
                    {data: 'tipo', name: 'tipo'},
                    {data: 'action', name: 'action', ordernable: false, searchable: false}
                ],
           
            });
     });




    </script>

@stop
