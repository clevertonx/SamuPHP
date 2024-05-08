<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Atendimento;
use App\Models\Admin\Sesau\Samu\Pessoa;
use App\Models\Admin\Sesau\Samu\Protocolo;
use App\Models\Admin\Sesau\Samu\TipoFim;
use App\Models\Admin\Sesau\Samu\TipoParentesco;
use App\Models\Admin\Sesau\Samu\TipoPrazo;
use Livewire\Component;

class AtendimentoComponent extends Component
{

    public $solicitante;
    public $paciente;
    public $data = [];
    public $tipoSelecionado;



    public function render()
    {
        $pessoas = Pessoa::where('nome', 'like', '%' )->get();
        return view('livewire.admin.sesau.samu.atendimento-component', [
            'pessoas' => $pessoas,
            'parentescos' => TipoParentesco::all(),
            'fins' => TipoFim::all(),
        ]);
    }

    public function selecionarTipo($tipo)
    {
        $this->tipoSelecionado = $tipo;
    }

    public function cadastrar()
    {
        $this->validate([
            'data.data_atendimento' => 'required',
            'data.horario' => 'required',
            'data.endereco' => 'required',
            'data.fato_acontecido' => 'required',
            'data.transportado_para' => 'required|numeric',
            'data.observacoes' => 'required',
        ]);

        try {
            $atendimento = Atendimento::create($this->data);
            $atendimentoId = $atendimento->id;

            session()->flash('success', 'Atendimento Cadastrado com sucesso!');
            $this->emit('adicionarProtocolo', $atendimentoId);
            $this->resetInputs();
        } catch (\Exception $e) {
            dd($e);
            session()->flash('error', 'Ocorreu um erro ao cadastrar o atendimento.');
            $this->cancel();
        }
    }

    public function resetInputs()
    {
        $this->data = [];

    }

    public function carregarDadosSolicitante()
    {
        if (!empty($this->solicitante)) {
            $pessoa = Pessoa::find($this->solicitante);
            if ($pessoa) {
                $this->data['solicitante_id'] = $this->solicitante;
                $this->data['nome_solicitante'] = $pessoa->nome;
                $this->data['endereco_solicitante'] = $pessoa->endereco;
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
                $this->data['paciente_id'] = $this->paciente;
                $this->data['nome_paciente'] = $pessoa->nome;
                $this->data['rg_paciente'] = $pessoa->rg;
                $this->data['data_nascimento'] = $pessoa->data_nascimento;
                $this->data['grau_parentesco'] = $pessoa->grau_parentesco;
            }
        }
    }


}
