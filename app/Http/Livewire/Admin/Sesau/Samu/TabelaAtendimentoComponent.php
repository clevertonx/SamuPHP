<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Atendimento;
use Livewire\Component;

class TabelaAtendimentoComponent extends Component
{

    public $atendimentos;
    public $atendimento_id, $nome_solicitante, $nome_paciente, $data_atendimento, $data_solicitacao;

    public $view_atendimento_id, $view_solicitante_nome, $view_paciente_nome, $view_data_atendimento, $view_data_solicitacao;

    public function mount()
    {
        $this->atendimentos = Atendimento::with('protocolo', 'solicitante', 'paciente')->get();
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

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'atendimento_id' => 'required|unique:atendimentos',
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required|numeric']);
    }



    public function resetInputs()
    {
        $this->estudante_id = '';
        $this->nome = '';
        $this->email = '';
        $this->telefone = '';
        $this->estudante_edit_id = '';
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
//
//    public function deleteConfirmation($id)
//    {
//
//
//        $this->estudante_delete_id = $id;
//
//        $this->dispatchBrowserEvent('show-delete-estudante-modal');
//
//    }
//
//    public function deleteEstudante()
//    {
//        $estudante = Estudantes::where('id', $this->estudante_delete_id)->first();
//        $estudante->delete();
//
//        session()->flash('message', 'Estudante Excluído com sucesso!');
//
//        $this->dispatchBrowserEvent('close-modal');
//
//        $this->estudante_delete_id = '';
//    }

//    public function viewEstudanteInfo($id)
//    {
//        $estudante = Estudantes::where('id', $id)->first();
//
//        $this->view_estudante_id = $estudante->id;
//        $this->view_estudante_nome = $estudante->nome;
//        $this->view_estudante_email = $estudante->email;
//        $this->view_estudante_telefone = $estudante->telefone;
//
//        $this->dispatchBrowserEvent('show-view-estudante-modal');
//    }

//    function closeViewEstudanteModal()
//    {
//        $this->view_etudante_id = '';
//        $this->view_estudante_nome = '';
//        $this->view_estudante_email = '';
//        $this->view_estudante_telefone = '';
//    }
//
//    public function cancel()
//    {
//        $this->estudante_delete_id = '';
//    }


    public function render()
    {
        $atendimentos = Atendimento::all();

        return view('livewire.admin.sesau.samu.tabela-atendimento-component', ['atendimentos' => $atendimentos])
            ->layout('livewire.layouts.base');
    }
}
