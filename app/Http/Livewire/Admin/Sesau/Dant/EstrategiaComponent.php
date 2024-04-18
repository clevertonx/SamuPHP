<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Estrategia;
use App\Models\Dant\Eixo;

class EstrategiaComponent extends Component
{
    public $estrategia_id, $eixos, $eixo_id;
    public $nome, $descricao, $status;
    public $isOpen=false;
    public $estrategiaId;

    public $listeners = ['emitEstrategiaId'];

    public function emitEstrategiaId($id) {
        $this->estrategiaId = $id;
        $this->render();
    }

    public function mount() {
        $this->resetInputFields();
        $this->eixos = Eixo::all();
    }

    public function resetInputFields() {
        $this->estrategia_id = null;
        $this->eixo_id = null;
        $this->nome = '';
        $this->descricao = '';
        $this->status = true;
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id) {
        $estrategia = Estrategia::findOrFail($id);
        $this->estrategia_id = $id;
        $this->eixo_id = $estrategia->eixo_id;
        $this->nome = $estrategia->nome;
        $this->descricao = $estrategia->descricao;
        $this->status = $estrategia->status;

        $this->openModal();
    }

    public function store() {
        // dd($this);
        $this->validate([
            'eixo_id' => 'required',
            'nome' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ]);

        try {
            Estrategia::updateOrCreate(['id' => $this->estrategia_id], [
                'eixo_id' => $this->eixo_id,
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'status' => $this->status,
            ]);

            session()->flash('message',
                $this->estrategia_id ? 'Estratégia atualizada com sucesso.' :
                'Estratégia cadastrada com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }



        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        Estrategia::find($id)->delete();
        session()->flash('message', 'Estratégia removida com sucesso.');
    }

    public function openMOdal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        // 'eixos' => Eixo::where('eixo_id', $this->estrategiaId)->get()
        return view('livewire.dant.estrategia-component', ['estrategias' => Estrategia::where('eixo_id', $this->estrategiaId)->get()]);
    }
}
