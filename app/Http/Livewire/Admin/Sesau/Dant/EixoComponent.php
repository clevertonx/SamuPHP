<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Eixo;
use App\Models\Dant\Plano;

class EixoComponent extends Component
{
    public $eixo_id, $planos, $plano_id;
    public $nome, $descricao, $status;
    public $isOpen = false;
    public $eixoId;

    public $listeners = ['emitEixoId'];

    public function emitEixoId($id) {
        $this->eixoId = $id;
        $this->render();
    }

    public function mount() {
        $this->resetInputFields();
        $this->planos = Plano::all();
    }

    public function resetInputFields() {
        $this->eixo_id = null;
        $this->plano_id = null;
        $this->nome = '';
        $this->descricao = '';
        $this->status = true;
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id) {
        $eixo = Eixo::findOrFail($id);
        $this->eixo_id = $id;
        $this->plano_id = $eixo->plano_id;
        $this->nome = $eixo->nome;
        $this->descricao = $eixo->descricao;
        $this->status = $eixo->status;

        $this->openModal();
    }

    public function store() {
        $this->validate([
            'plano_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);

        try {
            Eixo::updateOrCreate(['id' => $this->eixo_id], [
                'plano_id' => $this->plano_id,
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'status' => $this->status,
            ]);

            session()->flash('message',
                $this->eixo_id ? 'Eixo atualizado com sucesso.' :
                'Eixo cadastrado com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }

        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        Eixo::find($id)->delete();
        session()->flash('message', 'Eixo removido com sucesso.');
    }

    public function openModal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.dant.eixo-component',
        [
            'eixos' => Eixo::where('plano_id', $this->eixoId)->get()
        ]);
    }
}
