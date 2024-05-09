<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Atendimento;
use Livewire\Component;

class TabelaAtendimentoComponent extends Component
{

    public $atendimento_id, $nome_solicitante, $nome_paciente, $data_atendimento, $data_solicitacao;

    /**
     * @var string
     */
    public $atendimento_delete_id;
    /**
     * @var string
     */
    protected $listeners = ['atualizarTabela'];

    public function atualizarTabela()
    {
        $this->render();
    }

    public function viewAtendimentoInfo($id)
    {
        $atendimento = Atendimento::findOrFail($id);


        $this->view_atendimento_id = $atendimento->id;
        $this->view_solicitante_nome = $atendimento->solicitante->nome;
        $this->view_paciente_nome = $atendimento->paciente->nome;
        $this->view_data_atendimento = $atendimento->data_atendimento;

        $protocolo = $atendimento->protocolo;

        $this->view_data_solicitacao = $protocolo ? $protocolo->data_solicitacao : null;

        $this->dispatchBrowserEvent('show-view-estudante-modal');
    }

    public function closeViewEstudanteModal()
    {
        $this->reset([
            'view_atendimento_id',
            'view_solicitante_nome',
            'view_paciente_nome',
            'view_data_atendimento',
            'view_data_solicitacao'
        ]);
    }





    public function resetInputs()
    {
        $this->atendimento_id = '';
        $this->solicitante_nome = '';
        $this->paciente_nome = '';
        $this->data_atendimento = '';
        $this->data_solicitacao = '';
    }

//    public function edit($id)
//    {
//        $estudante = Estudantes::where('id', $id)->first();
//
//        $this->estudante_edit_id = $estudante->id;
//        $this->estudante_id = $estudante->estudante_id;
//        $this->nome = $estudante->nome;
//        $this->email = $estudante->email;
//        $this->telefone = $estudante->telefone;
//
//
//        $this->dispatchBrowserEvent('show-edit-estudante-modal');
//    }
//
//    public function editEstudantedata()
//    {
//        $this->validate([
//            'nome' => 'required',
//            'email' => 'required|email',
//            'telefone' => 'required|numeric',
//        ]);
//
//        $estudante = Estudantes::where('id', $this->estudante_edit_id)->first();
//
//        $estudante->estudante_id = $this->estudante_id;
//        $estudante->nome = $this->nome;
//        $estudante->email = $this->email;
//        $estudante->telefone = $this->telefone;
//
//        $estudante->update();
//
//        session()->flash('message', 'Estudante Alterado com sucesso!');
//
//        $this->dispatchBrowserEvent('close-modal');
//    }
    public function deleteAtendimento($atendimentoId)
    {
        $atendimento = Atendimento::find($atendimentoId);

        if($atendimento) {
            $atendimento->delete();

            if($atendimento->protocolo) {
                $atendimento->protocolo->delete();
            }

            session()->flash('message', 'Atendimento excluído com sucesso!');
        } else {
            session()->flash('message', 'Falha ao excluir o atendimento. Atendimento não encontrado.');
        }
        $this->render();
        $this->emit('closeModal');
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'atendimento_id' => 'required|unique:atendimentos',
            'solicitante_nome' => 'required',
            'paciente_nome' => 'required',
            'data_atendimento' => 'required',
            'data_solicitacao' => 'required'
        ]);

        $this->render();
    }

    public function confirmDeleteAtendimento($atendimentoId)
    {
        $this->atendimento_delete_id = $atendimentoId;
        $this->dispatchBrowserEvent('confirmDeleteAtendimento', $atendimentoId);
    }


    public function cancel()
    {
        $this->atendimento_delete_id = '';
    }


    public function render()
    {

        return view('livewire.admin.sesau.samu.tabela-atendimento-component', ['atendimentos' => Atendimento::with('protocolo', 'solicitante', 'paciente')->get()])
            ->layout('livewire.layouts.base');
    }
}
