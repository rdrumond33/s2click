@extends('adminlte::page')

@section('title', 'S2Click|Estoque')

@section('content_header')
    <h1>Estoque</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-6">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabela</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="" data-original-title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="" data-original-title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="">
                    <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nome produto</th>
                            <th>marca</th>
                            <th>categoria</th>
                            <th>descricaoProduto</th>
                            <th>quantidade</th>

                            <th>
                                <a href="{{route('Donor.create')}}">
                                    <i type="button" class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>

                        <tfoot>
                        @foreach(\App\Product::all() as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->nome}}</td>
                                <td>{{$user->marca}}</td>
                                <td>{{$user->categoria}}</td>
                                <td>{{$user->descricaoProduto}}</td>
                                <td>{{$user->amount}}</td>

                            </tr>

                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer" style="">
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-footer-->
            </div>
        </div>
    </div>

@stop
