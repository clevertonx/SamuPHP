<div class="card p-4 mb-4">
    <div class="card p-2 mb-4 bg-light">
        <h5>Protocolo</h5>
    </div>
    <form wire:submit.prevent="store">
        <div class="row">

            <div class="form-floating mb-4 col-10">
                <input type="text" wire:model.prevent="data.nome" class="form-control" placeholder="Código (CID10)">
                <label for="nome">Nome:</label>
            </div>
            <div class="form-floating mb-4 col-2">
                <select wire:model.prevent="data.tipo_prazo_id" class="form-select">
                    <option value="">Selecione</option>
                    @foreach($prazos as $prazo)
                        <option value="{{$prazo->id}}">{{$prazo->nome}}</option>
                    @endforeach
                </select>
                <label for="prazo">Prazo:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.solicitacao" class="form-control"
                       placeholder="Código (CID10)">
                <label for="solicitacao">Solicitação:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="date" wire:model.prevent="data.data_solicitacao" class="form-control"
                       placeholder="Código (CID10)">
                <label for="data_solicitacao">Data da solicitação:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.servidor" class="form-control" placeholder="Servidor">
                <label for="servidor">Servidor:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="date" wire:model.prevent="data.data_retirada" class="form-control"
                       placeholder="Data de retirada:">
                <label for="data_retirada">Data de retirada:</label>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </form>
</div>
