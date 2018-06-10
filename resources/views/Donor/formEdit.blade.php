<!-- Modal add-->
<div class="modal" id="modal-formEdit" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <form method="PATCH" class="form-horizontal" data-toggle="validator">

                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h3 class="modal-title"></h3>

                </div>

                <div class="modal-body">

                  <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Nome</label>
                        <div class="col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" autofocus required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">CPF</label>
                        <div class="col-md-6">
                            <input type="text" name="cpf" class="form-control" id="cpf">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="col-md-3 control-label">Endereco</label>
                        <div class="col-md-6">
                            <input type="text" name="endereco" class="form-control" id="endereco">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="col-md-3 control-label">Telefone</label>
                        <div class="col-md-6">
                            <input type="tel" name="telefone" class="form-control" id="telefone" required>
                        </div>
                    </div>
                    <div class="form-group">

                        <label for="tipo" class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-6">
                            <select class="form-control" name="tipo" id="tipo">
                                <option>Mensal</option>
                                <option>Esporadico</option>
                            </select>
                        </div>
                    </div>

                </div> {{--fim modal body --}}]

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                </div>

            </form>{{--fim do Formulario--}}
        </div>
    </div> <!-- Fim modal-body -->
</div> <!-- Fim Modal -->
