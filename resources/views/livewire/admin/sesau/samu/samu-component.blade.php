<div class=" p-4 m-4">
    <div class="row">
        <div class="col-lg-2 mb-4">
            <div class="card bg-info text-black">
                <div class="card-body">
                    <i class="fa-solid fa-pen-to-square icon"></i>
                    <h5 class="card-title">Tipos</h5>
                    <p class="card-text">Adição de tipo fins, parentesco e prazo</p>
                    <a href="/samu/adicionar" class="btn btn-dark">Adicionar Tipos</a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 mb-4">
            <div class="card bg-success text-black">
                <div class="card-body">
                    <i class="fa-solid fa-person icon"></i>
                    <h5 class="card-title">Pessoas</h5>
                    <p class="card-text">Adição de pessoas(solicitante/paciente)</p>
                    <a href="/samu/pessoa" class="btn btn-dark">Adicionar Pessoas</a>
                </div>
            </div>
        </div>
    </div>






{{--    <livewire:admin.sesau.samu.pessoa-component/>--}}
    <livewire:admin.sesau.samu.atendimento-component/>
    {{--    <livewire:admin.sesau.samu.tabela-atendimento-component />--}}
    <livewire:admin.sesau.samu.atendimento-table-component/>



</div>



