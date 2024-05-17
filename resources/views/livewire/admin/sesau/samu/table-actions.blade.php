<button class="btn btn-sm btn-primary" wire:click="$emit('postAdded', {{ $model }})">Editar</button>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAtendimentoModal" wire:click="delete({{ $model }})">Excluir</button>

