
<div class="modal fade" id="declaracaoModal" tabindex="-1" aria-labelledby="pessoaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pessoaModalLabel">Adicionar Declaração</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Incluindo o pessoa-component -->
                @include('livewire.admin.sesau.samu.declaracao')
            </div>
        </div>
    </div>
</div>
