<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Model;
use App\Models\Admin\Sesau\Samu\TipoFim;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class TipoTableComponent extends TableComponent
{
    public $title;
    public $model, $modelId;

    public $per_page = 10;
    protected $paginationTheme = 'bootstrap';
    public $header_view = 'livewire.admin.sesau.samu.tipo.header';

    public function query()
    {
        return $this->model::query();
    }

    public function columns()
    {
        if(method_exists($this->model, 'columns')){
            return app($this->model)::columns();
        } else {
            return [
                Column::make('ID')->searchable()->sortable(),
                Column::make('Created At')->searchable()->sortable(),
                Column::make('Updated At')->searchable()->sortable(),
            ];
        }
    }

}
