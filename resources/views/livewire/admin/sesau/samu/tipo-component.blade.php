<div class="card p-3 m-1 col-3 d-flex justify-content-center ">
    <div class="card p-4 ">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row">
            <div class="col-auto">
                <button class="btn btn-primary mb-4" wire:click="create">Adicionar {{$title}}</button>
            </div>
        </div>


        <div class="card-header">
            @include($form)
        </div>

    </div>
</div>
