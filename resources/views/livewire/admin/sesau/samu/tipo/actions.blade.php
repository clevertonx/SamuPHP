<button  class="btn btn-sm btn-primary m-2" wire:click="$emit('editDeleteTipo', {{ $model }}, 'edit', '{{ $modelId }}')"><i class="fa-solid fa-square-pen fa-lg"></i></button>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAtendimentoModal" wire:click="$emit('editDeleteTipo', {{ $model }}, 'delete', '{{ $modelId }}')"><i class="fa-solid fa-trash-can"></i></button>

