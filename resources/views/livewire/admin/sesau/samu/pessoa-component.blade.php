<div>

    <livewire:admin.sesau.samu.tipo-component key="{{ Str::random(5) }}" title="Pessoa"
                                              model="App\Models\Admin\Sesau\Samu\Pessoa" modelId="Pessoa"
                                              form="admin.sesau.samu.pessoa.form" class="12" />

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
