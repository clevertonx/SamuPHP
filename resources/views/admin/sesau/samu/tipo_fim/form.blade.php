
    <div class="row">
        <div class="form-floating my-4 col-12">
            <input type="text" wire:model="data.nome" class="form-control"
                   placeholder="tipo do indicador:">
            <label for="nome">Nome:</label>
        </div> {{-- fim tipo indicador --}}
    </div>

    <div class="row form-check form-switch">
        <div class="mb-4">
            <label for="status" class="form-check-label">Status</label>
            <input type="checkbox" wire:model="data.status" id="status"
                   class="form-check-input">
        </div>
    </div>
    {{-- fim status --}}




