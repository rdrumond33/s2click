@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
<h1>Doador:</h1>
@stop

@section('content')
    <div class="box-body" style="">
        <table id="" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>id</th>
                <th>Nome Usuario</th>
                <th>Email</th>

                <th>
                    <a href="#">
                        <i type="button" class="fa fa-plus"></i>
                    </a>
                </th>
            </tr>
            <tfoot>
                <tr>
                    <td>teste</td>
                    <td>teste</td>
                    <td>#</td>

                </tr>
            </tfoot>
        </table>
    </div>

@stop