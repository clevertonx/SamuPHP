<?php

namespace App\Http\Livewire\Admin\Sesau\Semraiva;

use Livewire\Component;

class FichaComponent extends Component
{

    public $plano_id;
    public $status = [];
    public $data = [];
    public $select, $outra, $outro;

    public function mount()
    {
        $this->data['tipo_notificacao'] = "ATENDIMENTO ANTI-RÁBICO HUMANO";
        $this->data['agravo'] = "ATENDIMENTO ANTI-RÁBICO HUMANO";
        $this->data['cid'] = "W64";
        $this->data['data_notificacao'] = now()->format('Y-m-d');
        $this->data['uf'] = "MS";
        $this->data['municipio'] = "CAMPO GRANDE";
        $this->data['ibge'] = "5002704";
        $this->data['unidade'] = "CRS DR GUINTER HANS NOVA BAHIA";
        $this->data['codigo'] = "0010073";
        $this->data['data_atendimento'] = now()->format('Y-m-d');

        $this->data['municipio_unidade_saude'] = "CAMPO GRANDE";
        $this->data['cod_unidade_saude'] = "0010073";
        $this->data['nome_investigador'] = "INVESTIGADOR FULANO DE TAL";
    }
    public function render()
    {
        return view('livewire.admin.sesau.semraiva.ficha-component');
    }

    public function updatedSelect($value)
    {
        //dd($value);
        $this->select = $value;
    }



}
