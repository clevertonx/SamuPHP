<?php

namespace App\Http\Livewire\Admin\Sesau\Dant;

use Livewire\Component;
use App\Models\Dant\Indicador;
use App\Models\Dant\Estrategia;
use App\Models\Dant\Plano;
use App\Models\Dant\TipoIndicador;
use App\Models\Dant\Setor;
use App\Models\Dant\Avaliacao;

class IndicadorComponent extends Component
{
    public $indicador_id;
    public $estrategias, $estrategia_id, $tipo_indicadores, $tipo_indicador_id;
    public $user_id=1, $setores, $setor_id;
    public $indicador, $descricao, $metodologia;
    public $fonte, $periodicidade, $status;
    public $isOpen=false;
    public $indicadorId;

    public $listeners = ['emitIndicadorId'];

    public function emitIndicadorId($id) {
        $this->indicadorId = $id;
        $this->render();
    }

    public function mount() {
        $this->resetInputFields();
        $this->estrategias = Estrategia::all();
        $this->tipo_indicadores = TipoIndicador::all();
        $this->setores = Setor::all();
    }

    public function resetInputFields() {
        $this->indicador_id = null;
        $this->estrategia_id = null;
        $this->tipo_indicador_id = null;
        $this->user_id = 1;
        $this->setor_id = null;
        $this->indicador = '';
        $this->descricao = '';
        $this->metodologia = '';
        $this->fonte = '';
        $this->periodicidade = '';
        $this->status = true;
    }

    public function create() {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id) {
        $indicador = Indicador::findOrFail($id);
        $this->indicador_id = $id;
        $this->estrategia_id = $indicador->estrategia_id;
        $this->tipo_indicador_id = $indicador->tipo_indicador_id;
        $this->user_id = 1;
        $this->setor_id = $indicador->setor_id;
        $this->indicador = $indicador->indicador;
        $this->descricao = $indicador->descricao;
        $this->metodologia = $indicador->metodologia;
        $this->fonte = $indicador->fonte;
        $this->periodicidade = $indicador->periodicidade;
        $this->status = $indicador->status;

        $this->openModal();
    }

    public function store() {
        $this->validate([
            'estrategia_id' => 'required',
            'tipo_indicador_id' => 'required',
            'user_id' => 'required',
            'setor_id' => 'required',
            'indicador' => 'required',
            'descricao' => 'required',
            'metodologia' => 'required',
            'fonte' => 'required',
            'periodicidade' => 'required',
            'status' => 'required',
        ]);

        try {
            $indicador = Indicador::updateOrCreate(['id' => $this->indicador_id], [
                'estrategia_id' => $this->estrategia_id,
                'tipo_indicador_id' => $this->tipo_indicador_id,
                'user_id' => $this->user_id,
                'setor_id' => $this->setor_id,
                'indicador' => $this->indicador,
                'descricao' => $this->descricao,
                'metodologia' => $this->metodologia,
                'fonte' => $this->fonte,
                'periodicidade' => $this->periodicidade,
                'status' => $this->status,
            ]);

            $plano = Plano::where('id', '=', $indicador->estrategia->eixo->plano->id )->first();

            if($this->indicador_id == null && $plano->id) {
                for ($i=$plano->ano_inicial; $i <= $plano->ano_final; $i++) {
                    Avaliacao::create([
                        'indicador_id' => $this->indicador_id,
                        'ano' => $i,
                        'key' => $this->indicador_id . '_'. strval($i),
                        'realizado' => 0,
                        'comentario' => null,
                        'user_id' => 1,
                        'status' => true
                    ]);
                }
            }

            session()->flash('message',
                $this->indicador_id ? 'Indicador atualizado com sucesso.' :
                'Indicador cadastrado com sucesso.');
        } catch (\Throwable $th) {
            session()->flash('message',
            'Não foi possível cadastrar/atualizar informação.');
        }



        $this->closeModal();
        $this->resetInputFields();
        $this->render();
    }

    public function delete($id) {
        Indicador::find($id)->delete();
        session()->flash('message', 'Indicador removido com sucesso.');
    }

    public function openMOdal() {
        $this->isOpen = true;
    }

    public function closeModal() {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.dant.indicador-component', [
            'indicadores' => Indicador::where('estrategia_id', $this->indicadorId)->get()]);
    }
}
