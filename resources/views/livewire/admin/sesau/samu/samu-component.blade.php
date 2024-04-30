<div class=" p-4 m-4">
    <livewire:admin.sesau.samu.pessoa-component />


    {{-- @if ($isOpen) --}}

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Solicitante</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row">

                <div class="form-floating mb-4 col-12">
                    <select wire:model="solicitante" wire:change="carregarDadosSolicitante" class="form-select">
                        <option value="">Selecione</option>
                        @foreach($pessoas as $pessoa)
                        <option value="{{ $pessoa->id }}"> {{ $pessoa->nome }}</option>
                        @endforeach
                    </select>
                    <label for="select">Selecione Solicitante:</label>
                </div>
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
                    <input type="text" wire:model.prevent="data.bairro" class="form-control" placeholder="Código (CID10)">
                    <label for="bairro">Bairro:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.data_cpf" class="form-control" placeholder="CPF:">
                    <label for="cpf">CPF:</label>
                </div>

                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.telefone" class="form-control" placeholder="Telefone:">
                    <label for="telefone">Telefone:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.rg_solicitante" class="form-control"
                           placeholder="rg:">
                    <label for="rg">RG:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="email" wire:model.prevent="data.email" class="form-control" placeholder="Código (IBGE)">
                    <label for="email">Email:</label>
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

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Paciente</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row">

                <div class="form-floating mb-4 col-12">
                    <select wire:model="paciente" wire:change="carregarDadosPaciente" class="form-select">
                        <option value="">Selecione</option>
                        @foreach($pessoas as $pessoa)
                            <option value="{{ $pessoa->id }}"> {{ $pessoa->nome }}</option>
                        @endforeach
                    </select>
                    <label for="select">Selecione Paciente:</label>
                </div>

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
                    <input type="date" wire:model.prevent="data.data_nascimento" class="form-control" placeholder="Código (CID10)">
                    <label for="data_nascimento">Data de nascimento:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.grau_parentesco" class="form-control" placeholder="Grau de parentesco">
                    <label for="grau_de_parenteco">Grau de parentesco:</label>
                </div>

                <div class="form-floating mb-4 col-12">
                    <select wire:model.prevent="data.para_fins_de" class="form-select">
                        <option value="">Selecione</option>
                        <option value="1">DPVAT</option>
                        <option value="2">INSS</option>
                        <option value="3">Judicial</option>
                        <option value="4">Outros</option>
                    </select>
                    <label for="select">Para fins de:</label>
                </div>
                <div>
                    @if($tipoSelecionado)
                        Tipo selecionado: {{ $tipoSelecionado }}
                    @endif
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

    <div class="card p-4 mb-4">
        <div class="card p-2 mb-4 bg-light">
            <h5>Atendimento</h5>
        </div>
        <form wire:submit.prevent="store">
            <div class="row">

                <div class="form-floating mb-4 col-12">
                    <input type="date" wire:model.prevent="data.data_atendimento" class="form-control" placeholder="Código (CID10)">
                    <label for="data_atendimento">Data de atendimento:</label>
                </div>

                <div class="form-floating mb-4 col-12">
                    <input type="time" wire:model.prevent="data.horario" class="form-control"
                           placeholder="horário:">
                    <label for="horario">Horário:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.endereco" class="form-control" placeholder="endereco_atendimento">
                    <label for="endereco_atendimento">Endereço:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.fato_acontecido" class="form-control" placeholder="Fato acontecido:">
                    <label for="fato_acontecido">Fato acontecido:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.transportado_para" class="form-control" placeholder="Transportado para:">
                    <label for="transportado_para">Transportado para:</label>
                </div>
                <div class="form-floating mb-4 col-12">
                    <input type="text" wire:model.prevent="data.observacoes" class="form-control" placeholder="Observações">
                    <label for="observacoes">Observações:</label>
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
                    <input type="text" wire:model.prevent="data.prazo" class="form-control"
                           placeholder="Prazo:">
                    <label for="prazo">Prazo:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.solicitacao" class="form-control" placeholder="Código (CID10)">
                    <label for="solicitacao">Solicitação:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="date" wire:model.prevent="data.data_solicitacao" class="form-control" placeholder="Código (CID10)">
                    <label for="data_solicitacao">Data da solicitação:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="text" wire:model.prevent="data.servidor" class="form-control" placeholder="Servidor">
                    <label for="servidor">Servidor:</label>
                </div>
                <div class="form-floating mb-4 col-6">
                    <input type="date" wire:model.prevent="data.data_retirada" class="form-control" placeholder="Data de retirada:">
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
    <div class="row d-flex justify-content-center">
        <div class="col-auto">
            <button class="btn btn-primary mb-4" wire:click.defer="cadastrar">Adicionar Ficha</button>
        </div>
    </div>
</div>



