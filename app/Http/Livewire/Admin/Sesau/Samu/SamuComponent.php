<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use Livewire\Component;

class SamuComponent extends Component
{
    public function adicionarTipos()
    {
        return redirect()->route('adicionar_tipos_livewire');
    }
    public function render()
    {
        return view('livewire.admin.sesau.samu.samu-component');
    }


}
