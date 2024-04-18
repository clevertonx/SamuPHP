<div class="p-4">
    <div class="row">
        <div class="col-6">@livewire('dant.tipo-indicador-component')</div>
        <div class="col-6">@livewire('dant.setor-component')</div>
    </div>

    @livewire('dant.plano-component')

    @if ($openEixoId)
        @livewire('dant.eixo-component')

        @if ($openEstrategiaId)
            @livewire('dant.estrategia-component')
                
                @if ($openIndicadorId)
                    @livewire('dant.indicador-component')

                        @if ($openAvaliacaoId)
                            @livewire('dant.avaliacao-component')
                        @endif
                @endif
        @endif
    @endif
        
</div>
