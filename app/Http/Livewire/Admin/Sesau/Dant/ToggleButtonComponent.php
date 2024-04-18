<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Illuminate\Database\Eloquent\Model;

use Livewire\Component;

class ToggleButtonComponent extends Component
{
    public $model;
    public $field;
    public $isActive;
    public $modelId, $column;
    public $value;

    public function mount()
    {
        $this->isActive = (bool) $this->value;
    }

    public function updating($field, $value)
    {
        $data = app($this->model)::where('id', $this->modelId)->update([$this->column => $value]);
        $this->isActive = !$value;
    }

    public function render()
    {
        return view('livewire.dant.toggle-button-component');
    }




}
