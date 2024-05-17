<div wire:ignore.self class="modal fade" id="deleteAtendimentoModal" tabindex="-1"
     aria-labelledby="xmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Atendimento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4 pb-4">
                <h6>Deseja excluir esse atendimento {{ isset($data['id']) ? $data['id'] : 0 }}?</h6>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                        aria-label="close">Cancelar
                </button>
                <button class="btn btn-sm btn-danger" data-bs-dismiss="modal"
                        wire:click="destroy({{ isset($data['id']) ? $data['id'] : 0 }})">Sim, excluir!
                </button>
            </div>
        </div>
    </div>
</div>

