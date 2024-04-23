<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Pessoa;
use Livewire\Component;

class SamuComponent extends Component
{

 public $solicitante;
 public $paciente;
 public $data = [];
    public function render()
    {
        return view('livewire.admin.sesau.samu.samu-component', ['pessoas'=>Pessoa::all()]);
    }

    public function carregarDadosSolicitante()
    {
        if (!empty($this->solicitante)) {
            $pessoa = Pessoa::find($this->solicitante);
            if ($pessoa) {
                $this->data['nome_solicitante'] = $pessoa->nome;
                $this->data['endereco'] = $pessoa->endereco;
                $this->data['bairro'] = $pessoa->bairro;
                $this->data['data_cpf'] = $pessoa->cpf;
                $this->data['telefone'] = $pessoa->telefone;
                $this->data['rg_solicitante'] = $pessoa->rg;
                $this->data['email'] = $pessoa->email;
            }
        }
    }

    public function carregarDadosPaciente()
    {
        if (!empty($this->paciente)) {
            $pessoa = Pessoa::find($this->paciente);
            if ($pessoa) {
                $this->data['nome_paciente'] = $pessoa->nome;
                $this->data['rg_paciente'] = $pessoa->rg;
                $this->data['data_nascimento'] = $pessoa->data_nascimento;
                $this->data['grau_parentesco'] = $pessoa->grau_parentesco;
            }
        }
    }


}
