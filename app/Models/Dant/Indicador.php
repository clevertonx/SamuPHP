<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    use HasFactory;

    protected $table = 'dant.indicadores';
    protected $fillable = [
        'estrategia_id', 'tipo_indicador_id', 'indicador', 'descricao',
        'meta', 'metodologia', 'fonte', 'peridiocidade', 'user_id', 'setor_id'
    ];
    
    public function estrategia() {
        return $this->belongsTo(Estrategia::class);
    }

    public function tipo_indicador() {
        return $this->belongsTo(TipoIndicador::class);
    }

    public function setor() {
        return $this->belongsTo(Setor::class);
    }

    public function avaliacao() {
        return $this->belongsTo(Avaliacao::class);
    }

}
