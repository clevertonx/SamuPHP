<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h5 style="float: left;"><strong>Todos atendimentos</strong></h5>
                    </div>

                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Solicitante</th>
                                <th>Paciente</th>
                                <th>Data Atendimento</th>
                                <th>Data Solicitação</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if( $atendimentos->count() > 0 )
                                @foreach( $atendimentos as $atendimento )
                                    <tr>
                                        <td>{{ $atendimento->id }}</td>
                                        <td>{{ $atendimento->paciente->nome }}</td>
                                        <td>{{ $atendimento->solicitante->nome }}</td>
                                        <td>{{ $atendimento->data_atendimento }}</td>
                                        <td>
                                            @if($atendimento->protocolo)
                                                {{ $atendimento->protocolo->data_solicitacao }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-sm btn-primary"
                                                    wire:click="edit({{ $atendimento->id }})">Editar
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteAtendimentoModal">Excluir
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;"><small>Nenhum atendimento
                                            encontrado</small></td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <div wire:ignore.self class="modal fade" id="editEstudanteModal" tabindex="-1" aria-labelledby="exampleModalLabel"--}}
    {{--         aria-hidden="true">--}}
    {{--        <div class="modal-dialog" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Estudante</h1>--}}
    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
    {{--                </div>--}}
    {{--                <div class="modal-body">--}}
    {{--                    <form wire:submit.prevent="editEstudantedata">--}}
    {{--                        <div class="form-group row">--}}
    {{--                            <label for="estudante_id" class="col-3">Atendimento ID</label>--}}
    {{--                            <div class="col-9">--}}
    {{--                                <input type="number" id="estudante_id" class="form-control" wire:model="estudante_id">--}}
    {{--                                @error('estudante_id')--}}
    {{--                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="nome" class="col-3">Nome</label>--}}
    {{--                            <div class="col-9">--}}
    {{--                                <input type="text" id="nome" class="form-control" wire:model="nome">--}}
    {{--                                @error('nome')--}}
    {{--                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="email" class="col-3">Email</label>--}}
    {{--                            <div class="col-9">--}}
    {{--                                <input type="email" id="email" class="form-control" wire:model="email">--}}
    {{--                                @error('email')--}}
    {{--                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="telefone" class="col-3">Telefone</label>--}}
    {{--                            <div class="col-9">--}}
    {{--                                <input type="number" id="telefone" class="form-control" wire:model="telefone">--}}
    {{--                                @error('telefone')--}}
    {{--                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="form-group row">--}}
    {{--                            <label for="" class="col-3"></label>--}}
    {{--                            <div class="col-9">--}}
    {{--                                <button type="submit" class="btn btn-sm btn-primary">Editar Estudante</button>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div wire:ignore.self class="modal fade" id="deleteAtendimentoModal" tabindex="-1"
         aria-labelledby="xmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Atendimento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Deseja excluir esse atendimento?</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-bs-dismiss="modal"
                            aria-label="close">Cancelar
                    </button>
                    <button class="btn btn-sm btn-danger" data-bs-dismiss="modal" wire:click="deleteAtendimento({{ $atendimento->id }})">Sim, excluir!</button>
                </div>
            </div>
        </div>
    </div>

</div>




