<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\TipoFim;
use App\Models\Admin\Sesau\Samu\TipoParentesco;
use Livewire\Component;

class TipoComponent extends Component
{
    public $title, $model, $form, $tipoId, $modelId, $modelEmitId;
    public $nome, $status, $tipocomponent_id;
    public $isOpen = false;
    public $data = [];
    public $openForm = false;
    protected $listeners = ['openFormTable'];

    public function mount($title, $model)
    {
        $this->title = $title;
        $this->model = $model;
    }

    private function resetInputFields()
    {
        $this->data = [];
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {

        $this->validate([
            'data.nome' => 'required',
        ]);

        try {
            $this->model::Create($this->data);
            $this->resetInputFields();

        } catch (\Throwable $th) {
            session()->flash('message',
                'Não foi possível cadastrar/atualizar informação.');
        }
    }


    public function openFormTable( $modelId )
    {
        $this->modelEmitId = $modelId;
        $this->openForm = !$this->openForm;

    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->openForm = !$this->openForm;
    }


    public function render()
    {

        $tiposParentesco = TipoParentesco::all();
        $tiposFim = TipoFim::all();

        return view('livewire.admin.sesau.samu.tipo-component', ['tiposParentesco' => $tiposParentesco], ['tiposFim' => $tiposFim]);
    }
}
