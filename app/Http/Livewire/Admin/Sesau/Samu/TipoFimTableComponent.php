<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Model;
use App\Models\Admin\Sesau\Samu\TipoFim;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class TipoFimTableComponent extends TableComponent
{
    public $title;
    public $model, $modelId;


    public $per_page = 10;
    protected $paginationTheme = 'bootstrap';
    public $header_view = 'livewire.admin.sesau.samu.tipo.header';
    public $data = [];

    public function query()
    {
        return $this->model::query();
    }

    public function delete($data)
    {
        $this->data = $data;
    }

    public function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Nome', 'nome')->searchable()->sortable(),
            Column::make('Ação')->view('livewire.admin.sesau.samu.tipo.actions'),
        ];
    }



    public function cancel()
    {
        $this->data = [];
    }

}
