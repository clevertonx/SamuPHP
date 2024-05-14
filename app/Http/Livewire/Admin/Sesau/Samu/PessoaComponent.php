<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Pessoa;

use Livewire\Component;

class PessoaComponent extends Component
{

    public $data=[];

    public function store()
    {

        $this->validate([
            'data.nome' => 'required',
            'data.endereco' => 'required',
            'data.bairro' => 'required',
            'data.cpf' => 'required',
            'data.telefone' => 'required|numeric',
            'data.rg' => 'required',
            'data.email' => 'required|email',
            'data.data_nascimento' => 'required',
        ]);
        try{
            Pessoa::create($this->data);
            session()->flash('success', 'Pessoa Cadastrada com sucesso!');

            $this->resetInputs();
        }catch(\Exception $e){
            dd($e);
            session()->flash('error','Algo deu errado, tente novamente!!');
            $this->cancel();
        }


    }


    public function resetInputs()
    {
        $this->data = [];

    }

    public function render()
    {
        return view('livewire.admin.sesau.samu.pessoa-component');
    }


}
