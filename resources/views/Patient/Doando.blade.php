@extends('adminlte::page')

@section('title', 'S2Click|Pacientes')

@section('content_header')
    <h1>Paciente:{{\App\Patient::all()->find($idPacinete)->nome}}</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-sm-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title=""
                                data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title=""
                                data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <form action="{{route('Patient.relacionando',$idPacinete)}}" method="POST">

                        @csrf

                        <div class="form-group">


                            <label for="exampleInputEmail1">Produto</label>
                            <select class="SelectProduto" name="id" style="width: 50%">
                                @foreach(\App\Product::all() as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome}}
                                        Quantidade:{{$produto->amount}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Quantidade</label>
                            <input style="width: 50%" type="number" class="form-control" name="amount" id="amount"
                                   placeholder="quantidade">
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin: 20px">Salvar</button>

                    </form>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
        </div>


        <div class="col-sm-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Title</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">


                    <th>
                        <button type="button" class="fa fa-plus" aria-hidden="true" data-toggle="modal"
                                data-target="#AdicionarProduto"></button>
                    </th>


                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome produto</th>
                            <th>marca</th>
                            <th>categoria</th>
                            <th>descricaoProduto</th>
                            <th>quantidade</th>
                            <th>data</th>
                            <th>data</th>


                        </tr>
                        <tfoot>
                        @foreach(\App\Patient::all()->find($idPacinete)->products as $produto)
                            <tr>


                                <td>{{$produto->id}}</td>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->marca}}</td>
                                <td>{{$produto->categoria}}</td>
                                <td>{{$produto->descricaoProduto}}</td>
                                <td>{{$produto->dados->quantidadeDoada}}</td>
                                <td>{{$produto->dados->created_at}}</td>

                                <td>{{$produto->dados->updated_at}}</td>
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
    </div>

@stop

@section('js')

    <script>
        $(document).ready(function () {
            $('.SelectProduto').select2();
        });
    </script>


@stop