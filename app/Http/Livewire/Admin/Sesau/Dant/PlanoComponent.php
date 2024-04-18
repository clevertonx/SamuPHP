<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Plano;
use App\Models\Dant\Ano;

class PlanoComponent extends Component
{
    public $nome, $ano_inicial, $ano_final;
    public $status, $consolidar, $plano_id, $plano_create_id;
    public $isOpen = false;

    public function mount() {
        $this->resetInputFields();
    }

    private function resetInputFields() {
        $this->plano_id = null;
        $this->nome = '';
        $this->ano_inicial = '';
        $this->ano_final = '';
        $this->status = true;
        $this->consolidar = true;
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id) {
        $plano = Plano::findOrFail($id);
        $this->plano_id = $id;
        $this->nome = $plano->nome;
        $this->ano_inicial = $plano->ano_inicial;
        $this->ano_final = $plano->ano_final;
        $this->status = $plano->status;
        $this->consolidar = $plano->consolidar;

        $this->openModal();
    }

    public function store() {
        $this->validate([
            'nome' => 'required',
            'ano_inicial' => 'required|numeric|min:2023',
            'ano_final' => 'required|gte:ano_inicial',
            'status' => 'required',
            'consolidar' => 'required',
        ]);

        try {
            $plano = Plano::updateOrCreate(['id' => $this->plano_id], [
                'nome' => $this->nome,
                'ano_inicial' => $this->ano_inicial,
                'ano_final' => $this->ano_final,
                'status' => $this->status,
                'consolidar' => $this->consolidar,
            ]);

            $this->plano_create_id = $plano->id;

            if($this->plano_id == null && $this->plano_create_id) {

                for ($i=$this->ano_inicial; $i <= $this->ano_final; $i++) {
                    Ano::create([
                        'plano_id' => $this->plano_create_id,
                        'ano' => $i,
                        'key' => $this->plano_create_id . '_'. strval($i),
                        'status' => true
                    ]);
                }
            }

            session()->flash('message',
                $this->plano_id ? 'Plano atualizado com sucesso.' :
                'Plano cadastrado com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }

        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        Plano::find($id)->delete();
        session()->flash('Plano removido com sucesso.');
    }

    public function openModal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.dant.plano-component', ['planos' => Plano::all()]);
    }
}
