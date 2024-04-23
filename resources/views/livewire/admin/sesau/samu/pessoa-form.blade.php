<div class="card p-4 m-4">


    {{-- @if ($isOpen) --}}

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Pessoa</h5>
        </div>
        @include('livewire.admin.sesau.samu.message')
            <div class="row">

                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.nome" class="form-control"
                           placeholder="Nome:">
                    <label for="nome_pessoa">Nome:</label>
                </div>

                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.endereco" class="form-control"
                           placeholder="endereço:">
                    <label for="endereco">Endereço:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.bairro" class="form-control"
                           placeholder="Código (CID10)">
                    <label for="bairro">Bairro:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.cpf" class="form-control" placeholder="CPF:">
                    <label for="cpf">CPF:</label>
                </div>

                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.telefone" class="form-control" placeholder="Telefone:">
                    <label for="telefone">Telefone:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.rg" class="form-control"
                           placeholder="rg:">
                    <label for="rg">RG:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="email" wire:model.prevent="data.email" class="form-control"
                           placeholder="Email:">
                    <label for="email">Email:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="date" wire:model.prevent="data.data_nascimento" class="form-control"
                           placeholder="Data de nascimento:">
                    <label for="data_nascimento">Data de Nascimento:</label>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <button class="btn btn-primary mb-4" wire:click.defer="store">Adicionar Ficha</button>
                    </div>
                </div>


            </div>

    </div>
</div>
