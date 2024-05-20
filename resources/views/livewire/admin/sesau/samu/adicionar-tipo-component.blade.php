<div class=" p-4 m-4">
    <div class="row d-flex justify-content-center">
        <livewire:admin.sesau.samu.tipo-component  key="{{ Str::random(5) }}" title="Tipo Fins" model="App\Models\Admin\Sesau\Samu\TipoFim" modelId="TipoFim"
                                                  form="admin.sesau.samu.tipo_fim.form" />
        <livewire:admin.sesau.samu.tipo-component  key="{{ Str::random(5) }}" title="Tipo Parentesco"
                                                  model="App\Models\Admin\Sesau\Samu\TipoParentesco" modelId="TipoParentesco"
                                                  form="admin.sesau.samu.tipo_parentesco.form" />
        <livewire:admin.sesau.samu.tipo-component  key="{{ Str::random(5) }}" title="Tipo Prazo" model="App\Models\Admin\Sesau\Samu\TipoPrazo" modelId="TipoPrazo"
                                                  form="admin.sesau.samu.tipo_prazo.form" />
    </div>
    <div class="row d-flex justify-content-center">

    </div>
</div>
