<div>
    <table class="table rounded-lg text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anos as $ano)
                <tr>
                    <td>{{ $ano->id }}</td>
                    <td>{{ $ano->plano->nome }}</td>
                    <td>{{ $ano->ano }}</td>
                    <td>{{ $ano->status }}</td>

                    <td>
                        {{-- <div class="row form-check form-switch">
                            <label for="status" class="form-check-label">Status</label>
                            <input type="checkbox" wire:model="status.{{ $ano->id }}" id="status" checked="" class="form-check-input">
                        </div> --}}
                        <livewire:dant.toggle-button-component
                            model="App\Models\Dant\Ano" key="{{$ano->id}}"
                            modelId="{{$ano->id}}" column="status"
                            value="{{$ano->status}}" field="isActive" />
                        {{-- fim status --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
