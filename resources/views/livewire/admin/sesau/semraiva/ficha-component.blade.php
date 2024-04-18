<div class="card p-4 m-4">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

        <div class="card p-4 mb-4">
            <div>
                <div class="row">
                    <div class="col-lg-2 mb-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <i class="fas fa-mobile-alt icon"></i>
                                <h5 class="card-title">App</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="https://semraiva.flutterflow.app/" target="_blank" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 mb-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <i class="fas fa-globe icon"></i>
                                <h5 class="card-title">Site</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="http://semraiva.by.dev.br/" target="_blank" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 mb-4">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <i class="fas fa-file-alt icon"></i>
                                <h5 class="card-title">Form</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="#" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 mb-4">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <i class="fas fa-cogs icon"></i>
                                <h5 class="card-title">Getor</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="#" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <i class="fas fa-map-marker-alt icon"></i>
                                <h5 class="card-title">Unidade</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="#" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <i class="fas fa-map-marker-alt icon"></i>
                                <h5 class="card-title">Distrito</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a href="#" class="btn btn-custom">Saiba Mais</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <div>
                <h2 class="my-4">Tabela de Atendimento</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome Paciente</th>
                            <th scope="col">Data Atendimento</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Tipo Animal</th>
                            <th scope="col">Tipo Tratamento</th>
                            <th scope="col">Status</th>
                            <th scope="col">Setor</th>
                            <th scope="col">CCZ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Bolinha</td>
                            <td>2024-04-13</td>
                            <td>3</td>
                            <td>Fêmea</td>
                            <td>Gato</td>
                            <td>Consulta</td>
                            <td><button type="button" class="btn btn-success">Aberto</button></td>
                            <td>Distrito</td>
                            <td><button type="button" class="btn btn-info">Em andamento</button></td>
                        </tr>
                        <tr>
                            <td>Rex</td>
                            <td>2024-04-12</td>
                            <td>2</td>
                            <td>Macho</td>
                            <td>Cachorro</td>
                            <td>Cirurgia</td>
                            <td><button type="button" class="btn btn-info">Em andamento</button></td>
                            <td>Gestor</td>
                            <td><button type="button" class="btn btn-success">Aberto</button></td>
                        </tr>
                        <tr>
                            <td>Miau</td>
                            <td>2024-04-11</td>
                            <td>1</td>
                            <td>Fêmea</td>
                            <td>Gato</td>
                            <td>Vacinação</td>
                            <td><button type="button" class="btn btn-danger">Concluído</button></td>
                            <td>Unidade</td>
                            <td><button type="button" class="btn btn-info">Em andamento</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <div class="row">
        <div class="col-auto">
            <button class="btn btn-primary mb-4" wire:click="create">Adicionar Ficha</button>
        </div>
    </div>

    {{-- @if ($isOpen) --}}

        <div class="card p-4 mb-4">
            <div class="card p-2 mb-4 bg-light">
                <h5>Dados Gerais</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">

                    <div class="form-floating mb-4 col-12">
                        <input type="text" wire:model.prevent="data.tipo_notificacao" class="form-control" placeholder="Nome do eixo:">
                        <label for="nome">1 - Tipo de Notificação</label>
                    </div>

                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model.prevent="data.agravo" class="form-control" placeholder="2 - Agravo/doença:">
                        <label for="nome">2 - Agravo/doença</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model.prevent="data.cid" class="form-control" placeholder="Código (CID10)">
                        <label for="nome">2 - Código (CID10)</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model.prevent="data.data_notificacao" class="form-control">
                        <label for="nome">2 - Data da Notificação</label>
                    </div>

                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model.prevent="data.uf" class="form-control" placeholder="4 - UF:">
                        <label for="nome">4 - UF</label>
                    </div>
                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model.prevent="data.municipio" class="form-control" placeholder="Município de Notificação">
                        <label for="nome">5 - Município de Notificação</label>
                    </div>
                  <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model.prevent="data.ibge" class="form-control" placeholder="Código (IBGE)">
                        <label for="nome">5 - Código (IBGE)</label>
                    </div>


                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model.prevent="data.unidade" class="form-control" placeholder="2 - Agravo/doença:">
                        <label for="nome">6 - Unidade de Saúde (ou outra fonte notificadora)</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model.prevent="data.codigo" class="form-control" placeholder="Código (CID10)">
                        <label for="nome">6 - Código</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model.prevent="data.data_atendimento" class="form-control">
                        <label for="nome">7 - Data da Atendimento</label>
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
                <h5>Notificação Individual</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">

                    <div class="form-floating mb-4 col-10">
                        <input type="text" wire:model.prevent="data.nome_paciente" class="form-control" placeholder="8 - Nome do Paciente:">
                        <label for="nome">8 - Nome do Paciente</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model.prevent="data.data_nascimento" class="form-control">
                        <label for="nome">9 - Data de Nascimento</label>
                    </div>

                    <div class="form-floating mb-4 col-3">
                        <select wire:model.prevent="data.idade" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Hora</option>
                            <option value="2">Dia</option>
                            <option value="3">Mês</option>
                            <option value="4">Ano</option>
                        </select>
                        <label for="select">10 - (ou) Idade</label>
                    </div>
                    <div class="form-floating mb-4 col-1">
                        <input type="text" wire:model.prevent="data.idade" class="form-control" placeholder="ou) Idade">
                        <label for="nome">10 - Idade</label>
                    </div>
                    <div class="form-floating mb-4 col-1" hidden>
                        <input type="text" wire:model.prevent="data.sexo" class="form-control" placeholder="11 - Sexo">
                        <label for="nome">11 - Sexo</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model.prevent="data.sexo" class="form-select">
                            <option value="">Selecione um gênero</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="I">Ignorado</option>
                        </select>
                        <label for="sexo">11 - Sexo</label>
                    </div>

                    <div class="form-floating mb-4 col-1" hidden>
                        <input type="text" wire:model.prevent="data.gestante" class="form-control" placeholder="12 - Gestante">
                        <label for="nome">12 - Gestante</label>
                    </div>

                    <div class="form-floating mb-4 col-3">
                        <select wire:model.prevent="data.gestante" class="form-select">
                            <option value="">Selecione uma opção</option>
                            <option value="1">1º Trimestre</option>
                            <option value="2">2º Trimestre</option>
                            <option value="3">3º Trimestre</option>
                            <option value="4">Idade gestacional/Ignorada</option>
                            <option value="5">Não</option>
                            <option value="6">Não se aplica</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="select">12 - Gestante</label>
                    </div>

                    <div class="form-floating mb-4 col-1" hidden>
                        <input type="text" wire:model.prevent="data.raca" class="form-control" placeholder="13 - Raça/Cor">
                        <label for="nome">13 - Raça/Cor</label>
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <select wire:model.prevent="data.raca" class="form-select">
                            <option value="">Selecione uma opção</option>
                            <option value="1">Branca</option>
                            <option value="2">Preta</option>
                            <option value="3">Amarela</option>
                            <option value="4">Parda</option>
                            <option value="5">Indígena</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="select">13 - Raça/Cor</label>
                    </div>

                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model.prevent="data.escolaridade" class="form-control" placeholder="14 - Escolaridade">
                        <label for="nome">14 - Escolaridade</label>
                    </div>

                    <div class="form-floating mb-4 col-10">
                        <select wire:model.prevent="data.escolaridade" class="form-select">
                            <option value="">Selecione uma opção</option>
                            <option value="0">Analfabeto</option>
                            <option value="1">1ª a 4ª série incompleta do EF (antigo primário ou 1º grau)</option>
                            <option value="2">4ª série completa do EF (antigo primário ou 1º grau)</option>
                            <option value="3">5ª à 8ª série incompleta do EF (antigo ginásio ou 1º grau)</option>
                            <option value="4">Ensino fundamental completo (antigo ginásio ou 1º grau)</option>
                            <option value="5">Ensino médio incompleto (antigo colegial ou 2º grau)</option>
                            <option value="6">Ensino médio completo (antigo colegial ou 2º grau)</option>
                            <option value="7">Educação superior incompleta</option>
                            <option value="8">Educação superior completa</option>
                            <option value="9">Ignorado</option>
                            <option value="10">Não se aplica</option>
                        </select>
                        <label for="select">14 - Escolaridade</label>
                    </div>


                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model.prevent="data.cartao_sus" class="form-control" placeholder="15 - Número do Cartão SUS">
                        <label for="nome">15 - Número do Cartão SUS</label>
                    </div>
                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model.prevent="data.mae" class="form-control" placeholder="16 - Nome da mãe">
                        <label for="nome">16 - Nome da mãe</label>
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
                <h5>Dados de Residência</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.uf" class="form-control" placeholder="17 - UF">
                        <label for="uf">17 - UF</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.municipio_residencia" class="form-control" placeholder="18 - Município de Residência">
                        <label for="municipio_residencia">18 - Município de Residência</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.codigo_ibge" class="form-control" placeholder="18.1 - Código (IBGE)">
                        <label for="codigo_ibge">18.1 - Código (IBGE)</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.distrito" class="form-control" placeholder="19 - Distrito">
                        <label for="distrito">19 - Distrito</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.bairro" class="form-control" placeholder="20 - Bairro">
                        <label for="bairro">20 - Bairro</label>
                    </div>
                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model="data.logradouro" class="form-control" placeholder="21 - Logradouro">
                        <label for="logradouro">21 - Logradouro</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.numero" class="form-control" placeholder="22 - Número">
                        <label for="numero">22 - Número</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-6">
                        <input type="text" wire:model="data.complemento" class="form-control" placeholder="23 - Complemento">
                        <label for="complemento">23 - Complemento (apto., casa, ...)</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.complemento" class="form-control" placeholder="24 - Geo campo 1">
                        <label for="complemento">24 - Geo campo 1</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.complemento" class="form-control" placeholder="25 - Geo campo 2">
                        <label for="complemento">25 - Geo campo 2</label>
                    </div>
                    <div class="form-floating mb-4 col-6">
                        <input type="text" wire:model="data.complemento" class="form-control" placeholder=">26 - Ponto de Referência">
                        <label for="complemento">26 - Ponto de Referência</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.cep" class="form-control" placeholder="27 - CEP">
                        <label for="cep">27 - CEP</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.telefone" class="form-control" placeholder="28 - (DDD) Telefone">
                        <label for="telefone">28 - (DDD) Telefone</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.zona" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Urbana</option>
                            <option value="2">Rural</option>
                            <option value="3">Periurbana</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="zona">29 - Zona</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.pais" class="form-control" placeholder="30 - País">
                        <label for="pais">30 - País</label>
                    </div>
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
            </form>
        </div>
        <div class="card p-4 mb-4">
            <div class="card p-2 mb-4 bg-light">
                <h5>Antecedentes Epidemiológicos </h5>
            </div>
            <form>
                <div class="row">
                    <div class="form-floating mb-4 col-12">
                        <input type="text" wire:model="data.ocupacao" class="form-control" placeholder="31 - Ocupação">
                        <label for="ocupacao">31 - Ocupação</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="select" class="form-control" placeholder="32 - Tipo de Exposição ao Vírus Rábico">
                        <label for="tipo_exposicao_rabica">32 - Tipo de Exposição ao Vírus Rábico</label>
                    </div>
                    {{-- data.contato_indireto --}}
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="select" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="contato_indireto">32.1 - Contato Indireto</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.arranhadura" class="form-select" {{ $select == "2" || $select == "9"  ? '' : 'disabled' }} >
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="arranhadura">32.2 - Arranhadura</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.lambedura" class="form-select" {{ $select == "2" || $select == "9"  ? '' : 'disabled' }}>
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="lambedura">32.3 - Lambedura</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.mordedura" class="form-select" {{ $select == "2" || $select == "9"  ? '' : 'disabled' }}>
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="mordedura">32.4 - Mordedura</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.outro" class="form-select" {{ $select == "2" || $select == "9"  ? '' : 'disabled' }}>
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="outro">32.5 - Outro</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2" hidden>
                        <input type="text" wire:model="data.localizacao" class="form-control" placeholder="33 - Localização">
                        <label for="localizacao">33 - Localização</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.mucosa" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="mucosa">33.1 - Mucosa</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.cabeca_pescoco" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="cabeca_pescoco">33.2 - Cabeça/Pescoço</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.maos_pe" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="maos_pe">33.3 - Mãos/Pé</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.tronco" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="tronco">33.4 - Tronco</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.membros_superiores" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="membros_superiores">33.5 - Membros Superiores</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.membros_inferiores" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="3">Desconhecida</option>
                        </select>
                        <label for="membros_inferiores">33.6 - Membros Inferiores</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.ferimento" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Único</option>
                            <option value="2">Múltiplo</option>
                            <option value="3">Sem ferimento</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="ferimento">34 - Ferimento</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.tipo_ferimento" class="form-control" placeholder="35 - Tipo de Ferimento">
                        <label for="tipo_ferimento">35 - Tipo de Ferimento</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.profundo" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="profundo">35.1 - Profundo</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.superficial" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="superficial">35.2 - Superficial</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.dilacerante" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="dilacerante">35.3 - Dilacerante</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.data_exposicao" class="form-control" placeholder="36 - Data da Exposição">
                        <label for="data_exposicao">36 - Data da Exposição</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.antecedentes_tratamento_rabico" class="form-control" placeholder="37 - Tem Antecedentes de Tratamento Anti-Rábico ?">
                        <label for="antecedentes_tratamento_rabico">37 - Tem Antecedentes de Tratamento Anti-Rábico ?</label>
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <select wire:model="data.pre_exposicao" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="pre_exposicao">37.1 - Pré-Exposição</label>
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <select wire:model="data.pos_exposicao" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="pos_exposicao">37.2 - Pós-Exposição</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-6">
                        <select wire:model="data.conclusao_tratamento" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Até 90 dias</option>
                            <option value="2">Após 90 dias</option>
                        </select>
                        <label for="conclusao_tratamento">38 - Se Houve, quando foi concluído?</label>
                    </div>
                    <div class="form-floating mb-4 col-6">
                        <input type="text" wire:model="data.num_doses_aplicadas" class="form-control" placeholder="39 - Nº de Doses Aplicadas">
                        <label for="num_doses_aplicadas">39 - Nº de Doses Aplicadas</label>
                    </div>
                    {{-- data.especie_animal_agressor --}}
                    <div class="form-floating mb-4 col-8">
                        <select wire:model="outra" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Canina</option>
                            <option value="2">Felina</option>
                            <option value="3">Quiróptera (Morcego)</option>
                            <option value="4">Primata (Macaco)</option>
                            <option value="5">Raposa</option>
                            <option value="6">Herbívoro doméstico (especificar)</option>
                            <option value="7">Outra</option>
                        </select>
                        <label for="especie_animal_agressor">40 - Espécie do Animal Agressor</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.outra_especie" {{ $outra == "7"  ? '' : 'disabled readonly' }} class="form-control" placeholder="40.1 - Outra">
                        <label for="outra_especie">40.1 - Outra</label>
                    </div>
                    <!-- Adicione os outros campos aqui conforme a tabela -->
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-6">
                        <select wire:model="data.condicao_animal" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sadio</option>
                            <option value="2">Suspeito</option>
                            <option value="3">Raivoso</option>
                            <option value="4">Morto/Desaparecido</option>
                        </select>
                        <label for="condicao_animal">41 - Condição do Animal para Fins de Conduta do Tratamento</label>
                    </div>
                    <div class="form-floating mb-4 col-6">
                        <select wire:model="data.passivel_observacao" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                        <label for="passivel_observacao">42 - Animal Passível de Observação ? (Somente para Cão ou Gato)</label>
                    </div>

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
            </form>
        </div>

        <div class="card p-4 mb-4">
            <div class="card p-2 mb-4 bg-light">
                <h5>Tratamento Atual</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">

                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <select wire:model="data.tratamento_indicado" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Pré Exposição</option>
                            <option value="2">Dispensa de Tratamento</option>
                            <option value="3">Observação do animal (se cão ou gato)</option>
                            <option value="4">Observação + Vacina</option>
                            <option value="5">Vacina</option>
                            <option value="6">Soro + Vacina</option>
                            <option value="7">Esquema de Reexposição</option>
                        </select>
                        <label for="tratamento_indicado">43 - Tratamento Indicado</label>
                    </div>
                    {{-- data.vacina --}}
                    <div class="form-floating mb-4 col-3">
                        <select wire:model="outro" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Instituto Butantan</option>
                            <option value="2">Instituto Vital Brasil</option>
                            <option value="3">Aventis Pasteur</option>
                            <option value="4">Outro</option>
                        </select>
                        <label for="vacina">44 - Vacina</label>
                    </div>
                    <div class="form-floating mb-4 col-3">
                        <input type="text" wire:model="data.outro_vacina" {{ $outro == "4"  ? '' : 'disabled readonly' }} class="form-control" placeholder="44.1 - Outro">
                        <label for="outro_vacina">44.1 - Outro</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="text" wire:model="data.num_lote" class="form-control" placeholder="45 - Número do Lote">
                        <label for="num_lote">45 - Número do Lote</label>
                    </div>
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.data_vencimento" class="form-control" placeholder="46 - Data do Vencimento">
                        <label for="data_vencimento">46 - Data do Vencimento</label>
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.datas_aplicacao_vacina" class="form-control" placeholder="47 - Datas das Aplicações da Vacina (dia e mês)">
                        <label for="datas_aplicacao_vacina">47 - Datas das Aplicações da Vacina (dia e mês)</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.dose_data_1a" class="form-control" placeholder="47.1 - Data da 1a dose">
                        <label for="dose_data_1a">47.1 - Data da 1a dose</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.dose_data_2a" class="form-control" placeholder="47.2 - Data da 2a dose">
                        <label for="dose_data_2a">47.2 - Data da 2a dose</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.dose_data_3a" class="form-control" placeholder="47.3 - Data da 3a dose">
                        <label for="dose_data_2a">47.3 - Data da 3a dose</label>
                    </div>
                    <div class="form-floating mb-4 col-2">
                        <input type="date" wire:model="data.dose_data_3a" class="form-control" placeholder="47.4 - Data da 4a dose">
                        <label for="dose_data_2a">47.4 - Data da 4a dose</label>
                    </div>

                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.condicao_final_animal" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Negativo para Raiva (Clínica)</option>
                            <option value="2">Negativo para Raiva (Laboratório)</option>
                            <option value="3">Positivo para Raiva (Clínica)</option>
                            <option value="4">Positivo para Raiva (Laboratório)</option>
                            <option value="5">Morto/ Sacrificado/ Sem Diagnóstico</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="condicao_final_animal">48 - Condição Final do Animal (após período de observação)</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.interrupcao_tratamento" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                        <label for="interrupcao_tratamento">49 - Houve Interrupção do Tratamento</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.motivo_interrupcao" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Indicação da Unidade de Saúde</option>
                            <option value="2">Abandono</option>
                            <option value="3">Transferência</option>
                        </select>
                        <label for="motivo_interrupcao">50 - Qual o Motivo da Interrupção</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.procura_unidade_saude" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                        <label for="procura_unidade_saude">51 - Se houve Abandono do Tratamento, a Unidade de Saúde Procurou o Paciente</label>
                    </div>
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.evento_adverso_vacina" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="evento_adverso_vacina">52 - Evento Adverso à Vacina</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.indicacao_soro_rabico" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="indicacao_soro_rabico">53 - Indicação do Soro Anti-Rábico</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.peso_paciente" class="form-control" placeholder="54 - Peso do Paciente">
                        <label for="peso_paciente">54 - Peso do Paciente</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.qtd_soro_aplicada_ml" class="form-control" placeholder="55 - Quantidade de Soro Aplicada ml">
                        <label for="qtd_soro_aplicada_ml">55 - Quantidade de Soro Aplicada ml</label>
                    </div>
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.qtd_soro_aplicada" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Heterólogo</option>
                            <option value="2">Homólogo</option>
                        </select>
                        <label for="qtd_soro_aplicada">55.1 - Quantidade de Soro Aplicada</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.infiltracao_soro_local" class="form-control" placeholder="56 - Infriltração de Soro no(s) Local(is) do(s) Ferimento(s)">
                        <label for="infiltracao_soro_local">56 - Infriltração de Soro no(s) Local(is) do(s) Ferimento(s)</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.infiltracao_soro_total" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                        <label for="infiltracao_soro_total">56.1 - Total</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.infiltracao_soro_parcial" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                        <label for="infiltracao_soro_parcial">56.2 - Parcial</label>
                    </div>
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-8">
                        <select wire:model="data.laboratorio_soro_rabico" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Instituto Butantan</option>
                            <option value="2">Instituto Vital Brasil</option>
                            <option value="3">Aventis Pasteur</option>
                            <option value="4">Outro</option>
                        </select>
                        <label for="laboratorio_soro_rabico">57 - Laboratório Produtor do Soro Anti-Rábico</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.outro_laboratorio_soro_rabico" {{ $outro == "4"  ? '' : 'disabled readonly' }} class="form-control" placeholder="57.1 - Outro">
                        <label for="outro_laboratorio_soro_rabico">57.1 - Outro</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model="data.num_partida" class="form-control" placeholder="58 - Número da Partida">
                        <label for="num_partida">58 - Número da Partida</label>
                    </div>
                    <div class="form-floating mb-4 col-4">
                        <select wire:model="data.evento_adverso_soro_rabico" class="form-select">
                            <option value="">Selecione</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            <option value="9">Ignorado</option>
                        </select>
                        <label for="evento_adverso_soro_rabico">59 - Evento Adverso ao Soro Anti-Rábico</label>
                    </div>
                    <!-- Continuação do formulário -->
                    <div class="form-floating mb-4 col-4">
                        <input type="date" wire:model="data.data_encerramento_caso" class="form-control" placeholder="60 - Data do Encerramento do Caso">
                        <label for="data_encerramento_caso">60 - Data do Encerramento do Caso</label>
                    </div>

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
            </form>
        </div>

        <div class="card p-4 mb-4">
            <div class="card p-2 mb-4 bg-light">
                <h5>Observações</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col">
                        <textarea wire:model.prevent="data.observacao" id="" cols="30" rows="5" placeholder="Observações:" class="form-control"></textarea>
                        <label for="observacao">Observações</label>
                        @error('observacao')<span class="error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row form-check form-switch">
                    <div class="mb-4">
                        <label for="status" class="form-check-label">Status</label>
                        <input type="checkbox" wire:model="data.status" id="status"
                            class="form-check-input">
                        @error('status')<span class="error">{{ $mssage }}</span>@enderror
                    </div>
                </div> {{-- fim status --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
                <div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary">Cancelar</button>
                </div>
        </div>
        <div class="card p-4 mb-4">
            <div class="card p-2 mb-4 bg-light">
                <h5>Investigador</h5>
            </div>
            <form wire:submit.prevent="store">
                <div class="row">

                    <div class="form-floating mb-4 col-8">
                        <input type="text" wire:model.prevent="data.municipio_unidade_saude" class="form-control" placeholder="62 - Município/Unidade de Saúde">
                        <label for="municipio_unidade_saude">62 - Município/Unidade de Saúde</label>
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model.prevent="data.cod_unidade_saude" class="form-control" placeholder="63 - Cód. da Unid. de Saúde">
                        <label for="cod_unidade_saude">63 - Cód. da Unid. de Saúde</label>
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model.prevent="data.nome_investigador" class="form-control" placeholder="64 - Nome">
                        <label for="nome_investigador">64 - Nome</label>
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model.prevent="data.funcao_investigador" class="form-control" placeholder="65 - Função">
                        <label for="funcao_investigador">65 - Função</label>
                    </div>

                    <div class="form-floating mb-4 col-4">
                        <input type="text" wire:model.prevent="data.assinatura_investigador" class="form-control" placeholder="66 - Assinatura">
                        <label for="assinatura_investigador">66 - Assinatura</label>
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



</div>
