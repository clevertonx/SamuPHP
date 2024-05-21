<div class="card p-3 m-1 col-3 d-flex justify-content-center ">
    <div class="card p-4 ">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif


        <h3>{{ $title }}</h3>
        @if ($openForm && $modelId == $modelEmitId)
            <div class="card-header">
                <form wire:submit.prevent="{{ isset($data['id']) ? $type==='edit' ? 'update' : 'destroy' : 'store' }}">
                @include($form)
                    <div class="">
                        <button type="submit" class="btn btn-{{ isset($data['id']) ? $type==='edit' ? 'primary' : 'danger' : 'primary' }}">{{ isset($data['id']) ? $type==='edit' ? 'ATUALIZAR' : 'DELETAR' : 'SALVAR' }}</button>
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">CANCELAR</button>
                    </div>
                </form>
            </div>
        @endif
        <div class="mt-3">
            <livewire:admin.sesau.samu.tipo-fim-table-component key="{{ Str::random(5) }}" title="{{$title}}" model="{{$model}}" modelId="{{ $modelId }}"/>
        </div>

    </div>
</div>
