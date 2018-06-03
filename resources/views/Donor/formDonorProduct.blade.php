<!-- Modal Editar-->
<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('donor.store')}}" method="POST" class="form-horizontal" data-toggle="validator">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="model" aria-label="Close">
                        <span aria-hidden="true">&time;</span>
                    </button>
                    <h3 class="modal-title"></h3>

                </div>
                <div class="modal-body">


                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" id="nome" value="">
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
                                <input type="tel" name="telefone" class="form-control" id="telefone">
                            </div>


                            <div class="form-group col-md-4">

                                <label for="tipo">Tipo</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option>Mensal</option>
                                    <option>Esporadico</option>
                                </select>
                            </div>

                            <div class="form-group">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Salvar</button>

                                <button type="button" class="btn btn-warning" href="{{route('donor.index')}}">
                                    Voltar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form><!-- Fim form -->
        </div>
    </div> <!-- Fim modal-body -->
</div>
</div> <!-- Fim Modal -->
