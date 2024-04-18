<div>
    @if($isOpen)
        <!-- Modal para adição/edição de posts -->
        <div class="modal fade show" tabindex="-1" role="dialog" style="display:block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $postId ? 'Editar Post' : 'Adicionar Post' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário -->
                        <form>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" wire:model="nome">
                                @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control" id="descricao" rows="3" wire:model="descricao"></textarea>
                                @error('descricao') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="data_post" class="form-label">Data do Post</label>
                                <input type="date" class="form-control" id="data_post" wire:model="data_post">
                                @error('data_post') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo do Post</label>
                                <select class="form-select" id="tipo" wire:model="tipo">
                                    <option value="">Selecione</option>
                                    <option value="tipo1">Tipo 1</option>
                                    <option value="tipo2">Tipo 2</option>
                                    <option value="tipo3">Tipo 3</option>
                                </select>
                                @error('tipo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" wire:model="status">
                                    <option value="">Selecione</option>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="campo_radio" class="form-label">Campo de Rádio</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="campo_radio" id="campo_radio1" value="opcao1" wire:model="radio">
                                    <label class="form-check-label" for="campo_radio1">Opção 1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="campo_radio" id="campo_radio2" value="opcao2" wire:model="radio">
                                    <label class="form-check-label" for="campo_radio2">Opção 2</label>
                                </div>
                                <!-- Adicione mais opções conforme necessário -->
                                @error('campo_radio') <br><span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="campos_checkbox" class="form-label">Campos de Checkbox</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkbox1" value="opcao1" wire:model="checkbox">
                                    <label class="form-check-label" for="checkbox1">Opção 1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="checkbox2" value="opcao2" wire:model="checkbox">
                                    <label class="form-check-label" for="checkbox2">Opção 2</label>
                                </div>
                                <!-- Adicione mais opções conforme necessário -->
                                @error('campos_checkbox') <br><span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                        <button type="button" class="btn btn-primary" wire:click="{{ $postId ? 'update' : 'store' }}">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
