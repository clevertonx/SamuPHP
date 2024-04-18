<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\TipoIndicador;

class TipoIndicadorComponent extends Component
{
    public $nome, $status, $tipoIndicador_id;
    public $isOpen = false;

    public function mount() {
        $this->resetInputFields();
    }

    private function resetInputFields() {
        $this->tipoIndicador_id = null;
        $this->nome = '';
        $this->status = true;
    }

    public function edit($id) {
        $tipoIndicador = TipoIndicador::findOrFail($id);
        $this->tipoIndicador_id = $id;
        $this->nome = $tipoIndicador->nome;
        $this->status = $tipoIndicador->status;

        $this->openModal();
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store() {
        $this->validate([
            'nome' => 'required',
            'status' => 'required',
        ]);

        try {
            TipoIndicador::updateOrCreate(['id' => $this->tipoIndicador_id], [
                'nome' => $this->nome,
                'status' => $this->status,
            ]);

            session()->flash('message',
                $this->tipoIndicador_id ? 'Tipo de indicador atualizado com sucesso.' :
                'Tipo de indicador cadastrado com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }



        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        TipoIndicador::find($id)->delete();
        session()->flash('Tipo de indicador removido com sucesso.');
    }

    public function openModal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.dant.tipo-indicador-component', ['tipoIndicadores' => TipoIndicador::all()]);
    }
}
