<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Ano;

class AnoComponent extends Component
{
    // public $ano, $key, $status;
    public $plano_id;
    public $status = [];
    // public $isOpen = false;

    public function render()
    {
        $anos = Ano::where('plano_id', $this->plano_id)->get();
        // avaliacoes' => Avaliacao::where('indicador_id', $this->avaliacaoId)->get()
        return view('livewire.dant.ano-component', compact('anos'));
    }

    public function updatedStatus($value, $item){
        dd($value, $item);
    }


}
