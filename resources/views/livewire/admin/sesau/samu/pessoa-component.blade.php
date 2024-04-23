<div>
    <div class="card p-4 m-4 align-items-center">
        <div class="col-auto">
            <button class="btn btn-sm btn-primary" style="float: right;" data-bs-toggle="modal"
                    data-bs-target="#pessoaModal">Adicionar Pessoa
            </button>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="pessoaModal" tabindex="-1" aria-labelledby="xmodalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pessoaModalLabel">Adicionar Pessoa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Incluindo o pessoa-component -->

                    @include('livewire.admin.sesau.samu.pessoa-form')

                </div>
            </div>
        </div>
    </div>
</div>
