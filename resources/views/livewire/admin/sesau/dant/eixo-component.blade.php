<div class="card p-4 my-4">
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="row">
        <div class="col-auto">
            <button class="btn btn-primary mb-4" wire:click="create">Adicionar eixo</button>
        </div>
    </div>

    @if ($isOpen)
        <div class="card p-4 mb-4">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="form-floating mb-4 col-6">
                        <select wire:model="plano_id" class="form-select">
                            <option value="">Selecione um dos planos</option>
                            @foreach ($planos as $plano)
                                <option value="{{ $plano->id }}">{{ $plano->nome }}</option>
                            @endforeach
                        </select>
                        <label for="plano_id">Plano:</label>
                    </div> {{-- fim plano --}}

                    <div class="form-floating mb-4 col-6">
                        <input type="text" wire:model="nome" class="form-control"
                            placeholder="Nome do eixo:">
                        <label for="nome">Nome do eixo:</label>
                    </div> {{-- fim nome eixo --}}
                </div>

                <div class="row">
                    <div class="col">
                        <textarea wire:model="descricao" id="" cols="30" rows="5" placeholder="Descrição:" class="form-control"></textarea>
                        <label for="descricao">Descrição:</label>
                        @error('descricao') <span class="error">{{ $message }}</span> @enderror
                    </div> {{-- fim descrição --}}
                </div>

                <div class="row form-check form-switch">
                    <div class="mb-4">
                        <label for="status" class="form-check-label">Status</label>
                        <input type="checkbox" wire:model="status" id="status"
                            class="form-check-input">
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div> {{-- fim status --}}
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

                <div class="">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                </div>
            </form>
        </div>
    @endif

    <table class="table rounded-lg text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Plano</th>
                <th>Eixo</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eixos as $eixo)
                <tr>
                    <td>{{ $eixo->id }}</td>
                    <td>{{ $eixo->plano->nome }}</td>
                    <td>{{ $eixo->nome }}</td>
                    <td>{{ Str::limit($eixo->descricao, 20, '...') }}</td>
                    <td>
                        <button class="btn" wire:click="$emit('openEstrategia', {{ $eixo->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                              </svg>
                        </button>
                        <button class="btn" wire:click="edit({{ $eixo->id}})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                        </button>  
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#eixoModal{{ $eixo->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg></button>
                    
                    <div wire:ignore.self class="modal fade" id="eixoModal{{ $eixo->id }}" tabindex="-1" aria-labelledby="eixoModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="fs-5">Deseja realmente excluir {{ $eixo->nome }}?</h5>
                                </div>
                                <div class="modal-footer d-flex justify-content-around">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger" wire:click.prevent="delete({{ $eixo->id}})">Remover</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Não há eixos</td></tr>
            @endforelse
        </tbody>
    </table>
</div>