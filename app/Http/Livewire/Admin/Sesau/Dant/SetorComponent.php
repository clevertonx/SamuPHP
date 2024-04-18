<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Setor;

class SetorComponent extends Component
{
    public $nome, $status, $setor_id;
    public $isOpen = false;

    public function mount() {
        $this->resetInputFields();
    }

    private function resetInputFields() {
        $this->setor_id = null;
        $this->nome = '';
        $this->status = true;
    }

    public function edit($id) {
        $setor = Setor::findOrFail($id);
        $this->setor_id = $id;
        $this->nome = $setor->nome;
        $this->status = $setor->status;

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
            Setor::updateOrCreate(['id' => $this->setor_id], [
                'nome' => $this->nome,
                'status' => $this->status,
            ]);

            session()->flash('message',
                $this->setor_id ? 'Setor atualizado com sucesso.' :
                'Setor cadastrado com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }



        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function openModal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function delete($id) {
        Setor::find($id)->delete();
        session()->flash('Setor removido com sucesso.');
    }

    public function render()
    {
        return view('livewire.dant.setor-component', ['setores' => Setor::all()]);
    }
}
