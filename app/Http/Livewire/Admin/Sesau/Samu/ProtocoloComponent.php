<?php

namespace App\Http\Livewire\Admin\Sesau\Samu;

use App\Models\Admin\Sesau\Samu\Protocolo;
use App\Models\Admin\Sesau\Samu\TipoPrazo;
use Livewire\Component;

class ProtocoloComponent extends Component
{
    public $data = [];

    protected $listeners = ['adicionarProtocolo'];

    public function rules(): array
    {
        return [
            'data.nome' => 'required',
            'data.tipo_prazo_id' => 'required',
            'data.solicitacao' => 'required',
            'data.data_solicitacao' => 'required',
            'data.servidor' => 'required',
            'data.data_retirada' => 'required',
        ];
    }

    public function criar()
    {
        $this->validate(); // Usa as regras definidas no método rules()

        try {
            Protocolo::create($this->data);
            session()->flash('success', 'Protocolo cadastrado com sucesso!');
            $this->resetInputs();
        } catch (\Throwable $th) {
            session()->flash('error', 'Ocorreu um erro ao cadastrar o protocolo.');
        }
    }

    public function resetInputs()
    {
        $this->data = [];
    }

    public function adicionarProtocolo($atendimentoId)
    {
        $this->data['atendimento_id'] = $atendimentoId;
        $this->criar();
    }

    public function render()
    {
        return view('livewire.admin.sesau.samu.protocolo-component', ['prazos' => TipoPrazo::all()]);
    }
}
