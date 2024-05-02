<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Protocolo;
use Livewire\Component;

class ProtocoloComponent extends Component
{

    public $data = [];

    public function store()
    {

        $this->validate([
            'data.data_solicitacao' => 'required',
            'data.data_retirada' => 'required',
        ]);

        try {
            Protocolo::Create($this->data);


        } catch (\Throwable $th) {
            session()->flash('message',
                'Não foi possível cadastrar/atualizar informação.');
        }


    }

    public function render()
    {

        return view('livewire.admin.sesau.samu.protocolo-component');
    }
}
