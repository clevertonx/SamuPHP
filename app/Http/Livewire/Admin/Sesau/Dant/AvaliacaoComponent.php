<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Avaliacao;
use App\Models\Dant\Indicador;


class AvaliacaoComponent extends Component
{
    public $avaliacao_id;
    public $indicadores, $indicador_id;
    public $ano, $realizado, $avaliacao, $comentario;
    public $user_id=1, $status;
    public $isOpen=false;
    public $avaliacaoId;

    public $listeners = ['emitAvaliacaoId'];

    public function emitAvaliacaoId($id) {
        $this->avaliacaoId = $id;
        $this->render();
    }

    public function mount() {
        $this->resetInputFields();
        // $this->avaliacoes = Avaliacao::all();
        $this->indicadores = Indicador::all();
    }

    public function resetInputFields() {
        $this->avaliacao_id = null;
        $this->indicador_id = null;
        $this->user_id = 1;
        $this->ano = '';
        $this->realizado = '';
        $this->avaliacao = '';
        $this->comentario = '';
        $this->status = true;
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id) {
        $avaliacao = Avaliacao::findOrFail($id);
        $this->avaliacao_id = $id;
        $this->indicador_id = $avaliacao->indicador_id;
        $this->user_id = 1;
        $this->ano = $avaliacao->ano;
        $this->realizado = $avaliacao->realizado;
        $this->avaliacao = $avaliacao->avaliacao;
        $this->comentario = $avaliacao->comentario;
        $this->status = $avaliacao->status;

        $this->openModal();
    }

    public function store() {
        $this->validate([
            'indicador_id' => 'required',
            'user_id' => 'required',
            'ano' => 'required',
            'avaliacao' => 'required',
            'realizado' => 'required',
            'comentario' => 'required',
            'status' => 'required',
        ]);

        try {
            Avaliacao::updateOrCreate(['id' => $this->avaliacao_id], [
                'avaliacao_id' => $this->avaliacao_id,
                'indicador_id' => $this->indicador_id,
                'user_id' => $this->user_id,
                'ano' => $this->ano,
                'avaliacao' => $this->avaliacao,
                'realizado' => $this->realizado,
                'comentario' => $this->comentario,
                'status' => $this->status,
            ]);

            session()->flash('message',
            $this->avaliacao_id ? 'Avaliação atualizada com sucesso.' :
            'Avaliação cadastrada com sucesso.');

        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }

        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        Avaliacao::find($id)->delete();
        session()->flash('message', 'Avaliação removida com sucesso.');
    }

    public function openMOdal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.dant.avaliacao-component', [
            'avaliacoes' => Avaliacao::where('indicador_id', $this->avaliacaoId)->get()
        ]);
    }
}
