<div class=" p-4 m-4">

    <div class="card p-4 mb-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card p-2 mb-4 bg-light">
            <h5>Solicitante</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row">
                <select wire:model="solicitante" wire:change="carregarDadosSolicitante" style="display:none;">
                    <option value="">Selecione</option>
                    @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                    @endforeach
                </select>

                <div class="form-floating mb-4 col-12">
                    <input class="form-control" list="datalistOptionsSolicitante" id="DataListSolicitante"
                           placeholder="Digite para buscar...">
                    <label for="exampleDataList">Selecione Solicitante:</label>
                </div>

                <datalist id="datalistOptionsSolicitante">
                    @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->nome }}" data-solicitante-id="{{ $pessoa->id }}"
                                data-rg="{{ $pessoa->rg }}" data-endereco-solicitante="{{ $pessoa->endereco }}"
                                data-bairro="{{ $pessoa->bairro }}" data-cpf="{{ $pessoa->cpf }}"
                                data-telefone="{{ $pessoa->telefone }}" data-email="{{ $pessoa->email }}"></option>
                    @endforeach
                </datalist>

            <div class="form-floating mb-4 col-12">
                <input type="text" wire:model.prevent="data.nome_solicitante" class="form-control"
                       placeholder="Nome do eixo:">
                <label for="nome">Nome:</label>
            </div>
            <div class="form-floating mb-4 col-12">
                <input type="text" wire:model.prevent="data.endereco_solicitante" class="form-control"
                       placeholder="endereço:">
                <label for="endereco">Endereço:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.bairro" class="form-control"
                       placeholder="Código (CID10)">
                <label for="bairro">Bairro:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.data_cpf" class="form-control" placeholder="CPF:">
                <label for="cpf">CPF:</label>
            </div>

            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.telefone" class="form-control"
                       placeholder="Telefone:">
                <label for="telefone">Telefone:</label>
            </div>
            <div class="form-floating mb-4 col-6">
                <input type="text" wire:model.prevent="data.rg_solicitante" class="form-control"
                       placeholder="rg:">
                <label for="rg">RG:</label>
            </div>
            <div class="form-floating mb-4 col-12">
                <input type="email" wire:model.prevent="data.email" class="form-control"
                       placeholder="Código (IBGE)">
                <label for="email">Email:</label>
            </div>
            </div>
        </form>
    </div>

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Paciente</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row ">
                <select wire:model="paciente" wire:change="carregarDadosPaciente" style="display:none;">
                    <option value="">Selecione</option>
                    @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->id }}">{{ $pessoa->nome }}</option>
                    @endforeach
                </select>

                <div class="form-floating mb-4 col-12">
                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                           placeholder="Digite para buscar...">
                    <label for="exampleDataList">Selecione Paciente:</label>
                </div>

                <datalist id="datalistOptions">
                    @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->nome }}" data-paciente-id="{{ $pessoa->id }}"
                                data-rg="{{ $pessoa->rg }}" data-data-nascimento="{{ $pessoa->data_nascimento }}"
                                data-grau-parentesco="{{ $pessoa->grau_parentesco }}"></option>
                    @endforeach
                </datalist>


                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.nome_paciente" class="form-control"
                           placeholder="Nome do paciente:">
                    <label for="nome">Nome:</label>
                </div>

                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.rg_paciente" class="form-control"
                           placeholder="rg:">
                    <label for="rg">RG:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="date" wire:model.prevent="data.data_nascimento" class="form-control">
                    <label for="data_nascimento">Data de nascimento:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <select wire:model.prevent="data.tipo_parentesco_id" class="form-select">
                        <option value="">Selecione</option>
                        @foreach($parentescos as $parentesco)
                            <option value="{{$parentesco->id}}">{{$parentesco->nome}}</option>
                        @endforeach
                    </select>
                    <label for="parentesco">Grau de Parentesco:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <select wire:model.prevent="data.tipo_fim_id" class="form-select">
                        <option value="">Selecione</option>
                        @foreach($fins as $tipofim)
                            <option value="{{$tipofim->id}}">{{$tipofim->nome}}</option>
                        @endforeach
                    </select>
                    <label for="parentesco">Para fins de:</label>
                </div>
                <div>
                    @if($tipoSelecionado)
                        Tipo selecionado: {{ $tipoSelecionado }}
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Atendimento</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row">

                <div class="form-floating mb-4 col-6">
                    <input type="date" wire:model.prevent="data.data_atendimento" class="form-control">
                    <label for="data_atendimento">Data de atendimento:</label>
                </div>

                <div class="form-floating mb-4 col-6">
                    <input type="time" wire:model.prevent="data.horario" class="form-control"
                           placeholder="horário:">
                    <label for="horario">Horário:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.endereco" class="form-control"
                           placeholder="endereco_atendimento">
                    <label for="endereco_atendimento">Endereço:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.fato_acontecido" class="form-control"
                           placeholder="Fato acontecido:">
                    <label for="fato_acontecido">Fato acontecido:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.transportado_para" class="form-control"
                           placeholder="Transportado para:">
                    <label for="transportado_para">Transportado para:</label>
                </div>
                <div class="form-floating mb-4 col-12">

                    <textarea class="form-control" wire:model.prevent="data.observacoes" placeholder="Observações"
                              rows="5"></textarea>
                    <label for="observacoes">Observações:</label>

                </div>

            </div>
        </form>
    </div>

    <livewire:admin.sesau.samu.protocolo-component/>
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <button class="btn btn-primary mb-4" wire:click.defer="cadastrar">Adicionar Ficha</button>
        </div>
    </div>
</div>

<script>

    document.addEventListener('livewire:load', function () {
        const input = document.getElementById('exampleDataList');
        const select = document.querySelector('[wire\\:model="paciente"]');

        input.addEventListener('input', function (event) {
            const selectedOption = event.target.value;
            const dataListOptions = document.getElementById('datalistOptions').querySelectorAll('option');

            dataListOptions.forEach(option => {
                if (option.value === selectedOption) {
                    select.value = option.getAttribute('data-paciente-id');
                    select.dispatchEvent(new Event('input'));
                    select.dispatchEvent(new Event('change'));
                }
            });
        });
    });

    document.addEventListener('livewire:load', function () {
        const input = document.getElementById('DataListSolicitante');
        const selectSolicitante = document.querySelector('[wire\\:model="solicitante"]');

        input.addEventListener('input', function (event) {
            const selectedOption = event.target.value;
            const dataListOptions = document.getElementById('datalistOptionsSolicitante').querySelectorAll('option');

            dataListOptions.forEach(option => {
                if (option.value === selectedOption) {
                    selectSolicitante.value = option.getAttribute('data-solicitante-id');
                    selectSolicitante.dispatchEvent(new Event('input'));
                    selectSolicitante.dispatchEvent(new Event('change'));
                }
            });
        });
    });

</script>










