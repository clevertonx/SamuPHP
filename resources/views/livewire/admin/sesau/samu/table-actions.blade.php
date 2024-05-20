<button class="btn btn-sm btn-primary m-2" wire:click="$emit('postAdded', {{ $model }})">*</button>
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAtendimentoModal" wire:click="delete({{ $model }})">-</button>

