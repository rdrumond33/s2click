@extends('adminlte::page')

@section('title', 'S2Click|Pacientes')

@section('content_header')
    <h1>Paciente</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="box">
                <div class="box-body">
                    <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                            data-target="#AdicionarDoador"></button>
                    <div class="box-header with-border">
                        <h3 class="box-title">Title</h3>

                        <div class="box-tools pull-right">


                        </div>
                    </div>
                    <div class="box-body">
                        <table id="tabelaPaciente" class="table " style="width:100%">
                            <thead>
                            <tr>
                                <th>nome</th>
                                <th>responsavel</th>
                                <th>especiais</th>
                                <th>necessidade</th>
                                <th>receita</th>
                                <th>Cadastrado</th>
                                <th>Ultima Atualizaçao</th>


                            </tr>
                            <tfoot>
                            @foreach($pacientes as $paciente)
                                <tr>
                                    <th><a href="{{route('Patient.doando',$paciente->id)}}">{{$paciente->nome}}</a></th>
                                    <th>{{$paciente->responsavel}}</th>
                                    <th>{{$paciente->especiais}}</th>
                                    <th>{{$paciente->necessidade}}</th>
                                    <th>{{$paciente->receita}}</th>
                                    <th>{{$paciente->created_at}}</th>
                                    <th>{{$paciente->updated_at}}</th>
                                </tr>
                                @endforeach

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        Footer
                    </div>
                    <!-- /.box-footer-->
                </div>
            </div>
            <div class="col-sm-3"></div>
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

                    <form action="{{route('Patient.store')}}" method="POST">


                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>


                            <div class="form-group col-md-4">
                                <label for="Responsavel">Responsavel</label>
                                <input type="text" name="Responsavel" class="form-control" id="Responsavel">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email">Nececidade especial</label>

                                <select class="selected" name="especial" style="width: 100%">
                                    <option value="sim">Sim</option>
                                    <option value="nao">Nao</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="endereco">necessidade</label>
                                    <input type="text" name="necessidade" class="form-control"
                                           id="necessidade">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="telefone">receita</label>
                                    <input type="text" name="receita" class="form-control" id="receita">
                                </div>

                                <div class="form-group">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-primary">Salvar</button>

                                    <button type="button" class="btn btn-warning"
                                            href="{{route('donor.index')}}">
                                        Voltar
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
            $('.js-example-basic-single').select2({

                placeholder: 'Selecione o Produto'
            });
        })

    </script>

@stop
