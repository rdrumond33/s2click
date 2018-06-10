<!-- Modal add-->
<div class="modal" id="modal-formAddProduto" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
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


            <form action="{{route('product.storeAdd',$doador->id)}}" method="POST" class="form-horizontal">

                @csrf

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h3 class="modal-title"></h3>

                </div>


                <div class="modal-body">

                    <input type="hidden" id="id" name="id">

                    <div class="form-group">
                        <label for="nome" class="col-md-3 control-label">Nome produto</label>
                        <div class="col-md-6">
                            <input type="text" name="nome" class="form-control" id="nome" autofocus required
                                   value="{{old('nome')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cpf" class="col-md-3 control-label">marca</label>
                        <div class="col-md-6">
                            <input type="text" name="marca" class="form-control" id="marca" required
                                   value="{{old('marca')}}">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Categoria</label>
                        <div class="col-md-6">
                            <input type="text" name="categoria" class="form-control" id="categoria">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="endereco" class="col-md-3 control-label">DescricaoProduto</label>
                        <div class="col-md-6">
                            <input type="text" name="descricaoProduto" class="form-control" id="descricaoProduto">
                        </div>
                    </div>


                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-save">Salvar</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
                    </div>

            </form>{{--fim do Formulario--}}
        </div>
    </div> <!-- Fim modal-body -->
</div> <!-- Fim Modal -->
