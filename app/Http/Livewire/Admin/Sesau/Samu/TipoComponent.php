<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\TipoFim;
use App\Models\Admin\Sesau\Samu\TipoParentesco;
use Livewire\Component;

class TipoComponent extends Component
{
    public $title, $model, $form, $tipoId, $modelId, $modelEmitId, $type, $class;
    public $nome, $status, $tipocomponent_id;
    public $isOpen = false;
    public $data = [];

    public $openForm = false;
    protected $listeners = ['openFormTable', 'editDeleteTipo'];

    public function mount($title, $model, $modelId, $form, $class)
    {
        $this->title = $title;
        $this->model = $model;
        $this->modelId = $modelId;
        $this->form = $form;
        $this->class = $class;
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

    public function update()
    {
        $this->validate(app($this->model)->rules);

        try {
            $model = $this->model::findOrFail($this->data['id']);
            $model->update($this->data);
            session()->flash('message', 'Informação atualizada com sucesso!');
            $this->resetInputFields();
        } catch (\Throwable $th) {
            session()->flash('message', 'Não foi possível atualizar a informação.');
        }
    }

    public function store()
    {
        $this->validate(app($this->model)->rules);

        try {
            if (isset($this->data['id'])) {
                $model = $this->model::findOrFail($this->data['id']);
                $model->update($this->data);
                session()->flash('message', 'Informação atualizada com sucesso!');
            } else {
                $model = $this->model::create($this->data);
                session()->flash('message', 'Informação cadastrada com sucesso!');
            }

            $this->resetInputFields();

        } catch (\Throwable $th) {
            session()->flash('message', 'Não foi possível cadastrar/atualizar informação.');
        }
    }




    public function openFormTable($modelId)
    {
        $this->type = null;
        $this->data = [];
        $this->modelEmitId = $modelId;
        $this->openForm = !$this->openForm;

    }

    public function editDeleteTipo($model, $type, $modelId)
    {
        $this->modelEmitId = $modelId;
        $this->openForm = !$this->openForm;
        $this->data = $model;
        $this->type = $type;


    }

    public function destroy()
    {

        try {
            $item = $this->model::find($this->data['id']);

            if ($item) {
                $item->delete();
                $this->resetInputFields();

                session()->flash('message', 'Atendimento excluído com sucesso!');
            } else {
                session()->flash('message', 'Falha ao excluir o atendimento. Atendimento não encontrado.');
            }


        } catch (\Throwable $th) {
            session()->flash('message',
                'Não foi possível cadastrar/atualizar informação.');
        }


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
