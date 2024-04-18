<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estrategia extends Model
{
    use HasFactory;

    protected $table = 'dant.estrategias';
    protected $fillable = [
        'eixo_id', 'nome', 'descricao', 'status'
    ];

    public function plano() {
        return $this->belongsTo(Plano::class);
    }

    public function indicadores() {
        return $this->hasMany(Indicador::class);
    }

    public function eixo() {
        return $this->belongsTo(Eixo::class);
    }
}
