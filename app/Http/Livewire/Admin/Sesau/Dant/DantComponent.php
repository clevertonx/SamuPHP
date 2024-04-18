<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;

class DantComponent extends Component
{
    public $openEixoId = false;
    public $openEstrategiaId = false;
    public $openIndicadorId = false;
    public $openAvaliacaoId = false;

    public $listeners = ['openEixo', 'openEstrategia' ,'openIndicador' ,'openAvaliacao'];

    public function openEixo($id) {
        // dd('aqui');
        $this->emit('emitEixoId', $id);
        $this->openEixoId = true;
        $this->openEstrategiaId = false;
        $this->openIndicadorId = false;
        $this->openAvaliacaoId = false;
    }

    public function openEstrategia($id) {
        // dd('aqui');
        $this->emit('emitEstrategiaId', $id);
        $this->openEstrategiaId = true;
    }

    public function openIndicador($id) {
        // dd('aqui');
        $this->emit('emitIndicadorId', $id);
        $this->openIndicadorId = true;
    }

    public function openAvaliacao($id) {
        // dd('aqui');
        $this->emit('emitAvaliacaoId', $id);
        $this->openAvaliacaoId = true;
    }

    public function render()
    {
        return view('livewire.dant.dant-component');
    }
}
