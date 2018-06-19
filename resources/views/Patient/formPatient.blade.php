<!-- Modal add-->
<div class="modal" id="modal-formPatient" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form action="{{route('patient.store')}}" method="POST" class="form-horizontal" data-toggle="validator">

                @csrf
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h3 class="modal-title">Adicionar Paciente</h3>

                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" required value="{{old('nome')}}">

                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpfPaciente" class="col-md-3 control-label">Cpf Paciente</label>
                        <div class="col-md-6">
                            <input type="text" name="cpfPaciente" class="form-control" id="cpfPaciente" required value="{{old('cpfPaciente')}}">

                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Responsavel</label>
                        <div class="col-md-6">

                            <input type="text" name="responsavel" class="form-control" id="responsavel"  value="{{old('responsavel')}}">

                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Cpfresponsavel" class="col-md-3 control-label">Cpg Responsevel</label>
                        <div class="col-md-6">
                            <input type="text" name="Cpfresponsavel" class="form-control" id="Cpfresponsavel"  value="{{old('Cpfresponsavel')}}">

                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Nececidade especial</label>
                        <div class="col-md-6">

                            <select class="selected" name="especial" style="width: 100%">
                                <option value="sim">Sim</option>
                                <option value="nao">Nao</option>
                            </select>


                            <span class="help-block with-errors"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Qual necessidade</label>
                        <div class="col-md-6">
                            <input type="text" name="necessidade" class="form-control"
                                   id="necessidade" value="{{old('necessidade')}}">

                            <span class="help-block with-errors"></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">Receita</label>
                        <div class="col-md-6">
                            <input type="text" name="receita" class="form-control" id="receita" value="{{old('receita')}}">
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

