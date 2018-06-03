@extends('adminlte::page')

@section('title', 'S2Click|Doadores')

@section('content_header')
    <section class="content-header">
        <h1>
            Doadores
            <small>tabela</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Tabela Doador</li>
        </ol>
    </section>
@stop

@section('content')
    <div class="row"><!-- inicio da Row -->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Doadores</h3>
                    <a onclick="addForm()" class="btn btn-default" style="float: right"><i
                                class="fas fa-plus-circle"></i>Adicionar</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tabelaDoadores" class="table table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Endereço</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>Tipo</th>
                                        <th>cadastrado</th>
                                        <th>acao</th>
                                    </tr>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        @include('Donor.form')

    </div> {{--fim da row--}}




@stop

@section('js')


    <script type="text/javascript">

        $(document).ready(function () {

            var table = $('#tabelaDoadores').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                info: true,
                autoWidth: false,

                ajax: "{{route('donor.api.getDonor')}}",
                columns: [
                    {data: 'nome'},
                    {data: 'cpf'},
                    {data: 'endereco'},
                    {data: 'telefone'},
                    {data: 'email'},
                    {data: 'tipo'},
                    {data: 'created_at'},

                    {data: 'action', name: 'action', ordernable: false, searchable: false}
                ],

            });


        });


        function deletDonor(id) {
            var popup = confirm("Deseja mesmo deletar");
            var csrf_token = $('meta[name="csrf-token"]').attr('content');

            if (popup == true) {

                $.ajax({
                    url: "{{url('donor')}}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        $('#tabelaDoadores').DataTable().ajax.reload();
                        console.log(data);
                    },
                    error: function () {
                        alert("ERRO")
                    }

                });


            }


        }


        $(function () {
            $('#modal-form form').validator().on('submit', function (e) {

                if (!e.isDefaultPrevented()) {
                    var id = $('id').val();
                    if (save_method == 'add') url = "{{url('donor')}}";
                    else url = "{{url('donor'.'/')}}" + id;
                    $, ajax({
                        url: url,
                        type: "POST",
                        data: $('#modal-form').serialize(),
                        success: function ($data) {
                            $('#modal-form').modal('hide');
                            $('#tabelaDoadores').DataTable().ajax.reload();

                        },
                        error: function () {
                            alert('Erro');

                        }
                    });
                }
            });

        });

        function addForm() {
            save_method = 'add';
            console.log(save_method);
            $('input[name=_method]').val('POST');
            $('#modal-form').modal('show');
            $('#modal-form form')[0].reset();
            $('.modal-title').text('Adicionar Doador');
        }


        function editForm(id) {

            save_method = 'edit';
            $('input[name=_method]').val('PUT');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{url('donor')}}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    $('#modal-form').modal('show');
                    $('.modal-title').text('Editar Doador');

                    $('#id').val(data.id);
                    $('#nome').val(data.nome);
                    $('#cpf').val(data.cpf);
                    $('#email').val(data.email);
                    $('#endereco').val(data.endereco);
                    $('#telefone').val(data.telefone);
                    $('#tipo').val(data.tipo);

                },
                error: function () {
                    alert("Nothin DATA")
                }
            });

        }

        function teste(id) {
                        var url ="/donor/product/create/" + id;

            $.ajax({
                url:url,
                type: "GET",

            })


        }

    </script>

@stop
