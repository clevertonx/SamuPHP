<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Atendimento;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;
use Livewire\Component;

class DeclaracaoTableComponent extends TableComponent
{
    public $type, $selectedAtendimentoId = 0;
    public $checkbox = false;

    protected $listeners = ['exibirInformacoesAtendimento'];

    public function query()
    {
        return Atendimento::query()->where('id', $this->selectedAtendimentoId)->with('protocolo', 'solicitante', 'paciente', 'tipo_parentesco', 'tipo_fim');
    }

    public function exibirInformacoesAtendimento($atendimento)
    {
        $this->selectedAtendimentoId = $atendimento['id'];
        $this->query();
    }

    public function delete($data)
    {
        $this->data = $data;
    }

    public function columns()
    {
        if ($this->type == 'solicitante') {
            return [
                Column::make('Solicitante', 'solicitante.nome'),
                Column::make('Endereço', 'solicitante.endereco'),
                Column::make('Bairro', 'solicitante.bairro'),
                Column::make('Cpf', 'solicitante.cpf'),
                Column::make('Telefone', 'solicitante.telefone'),
                Column::make('Rg', 'solicitante.rg'),
                Column::make('Email', 'solicitante.email'),
            ];
        } else if ($this->type == 'paciente') {
            return [
                Column::make('Paciente', 'paciente.nome'),
                Column::make('Rg', 'paciente.rg'),
                Column::make('Data de nascimento', 'paciente.data_nascimento'),
                Column::make('Parentesco', 'tipo_parentesco.nome'),
                Column::make('Para fins de', 'tipo_fim.nome'),
            ];
        } else if ($this->type == 'protocolo') {
            return [
                Column::make('Data de atendimento', 'data_atendimento'),
                Column::make('Horário', 'horario'),
                Column::make('Endereço', 'endereco'),
                Column::make('Fato Acontecido', 'fato_acontecido'),
                Column::make('Transportado Para', 'transportado_para'),
                Column::make('Observações', 'observacoes'),
            ];
        } else {
            return [
                Column::make('Data da solicitação', 'protocolo.data_solicitacao'),
                Column::make('Data Retirada', 'protocolo.data_retirada'),
            ];
        }
    }
}
