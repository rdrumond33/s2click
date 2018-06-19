<!-- Modal add-->
<div class="modal" id="modal-formReserva" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {{--@if ($errors->any())--}}
            {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
            {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}

            <form action="{{route('Reseve.store')}}" method="POST" class="form-horizontal" data-toggle="validator">

                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h3 class="modal-title"></h3>

                </div>

                <div class="modal-body">


                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">Codigo do paciente</label>
                        <div class="col-md-6">
                            <input type="text" name="idPaciente" class="form-control" id="idPaciente"
                                   value="{{old('idPaciente')}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Nome Responsavel</label>
                        <div class="col-md-6">
                            <input type="text" name="Responsavel" class="form-control" id="Responsavel" autofocus
                                   required value="{{old('Responsavel')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">Data da reserva</label>
                        <div class="col-md-6">
                            <input type="date" name="dataReserva" class="form-control" id="dataReserva"
                                   value="{{old('dataReserva')}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">Hora da reserva</label>
                        <div class="col-md-6">
                            <input type="time" name="horaReserva" class="form-control" id="horaReserva"
                                   value="{{old('dataReserva')}}">
                            <span class="help-block with-errors"></span>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Produto</label>
                        <div class="col-md-6">
                            <select class="SelecionarProduto" name="idProduto" style="width: 100%">
                                @foreach(\App\Product::all() as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome.' '.$produto->marca}}
                                        &nbsp;<strong>Qdt:&nbsp;{{$produto->amount}}</strong></option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">quantidade</label>
                        <div class="col-md-6">
                            <input type="number" name="quantidade" class="form-control" id="quantidade"
                                   value="{{old('dataReserva')}}">
                            <span class="help-block with-errors"></span>
                        </div>


                    </div>


                </div> {{--fim modal body --}}

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                </div>

            </form>{{--fim do Formulario--}}
        </div>
    </div> <!-- Fim modal-body -->
</div> <!-- Fim Modal -->
