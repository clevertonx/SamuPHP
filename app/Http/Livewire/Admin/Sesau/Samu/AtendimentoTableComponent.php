<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Model;
use App\Models\Admin\Sesau\Samu\Atendimento;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class AtendimentoTableComponent extends TableComponent
{
    public $per_page = 10;
    protected $paginationTheme = 'bootstrap';
    public $header_view = 'livewire.admin.sesau.samu.table-header';
    public $data = [];
    public function query()
    {
        return Atendimento::query()->with('protocolo', 'solicitante', 'paciente');
    }

    public function delete($data)
    {
        $this->data = $data;
    }
    public function columns()
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Solicitante','solicitante.nome')->searchable()->sortable(),
            Column::make('Paciente','paciente.nome')->searchable()->sortable(),
            Column::make('Data Atendimento','data_atendimento')->searchable()->sortable(),
            Column::make('Data Solicitação','protocolo.data_solicitacao'),
            Column::make('Samu')->view('livewire.admin.sesau.samu.table-samu'),
            Column::make('Ação')->view('livewire.admin.sesau.samu.table-actions'),
        ];
    }

    public function destroy($id)
    {
        $atendimento = Atendimento::find($id);

        if($atendimento) {
            $atendimento->delete();

            if($atendimento->protocolo) {
                $atendimento->protocolo->delete();
            }

            session()->flash('message', 'Atendimento excluído com sucesso!');
        } else {
            session()->flash('message', 'Falha ao excluir o atendimento. Atendimento não encontrado.');
        }
        $this->query();

    }

    public function cancel()
    {
        $this->data = [];
    }
}
