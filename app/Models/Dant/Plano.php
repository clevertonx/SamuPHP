<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'dant.planos';
    protected $fillable = [
        'nome', 'ano_inicial', 'ano_final', 'status', 'consolidar'
    ];

    public function eixos() {
        return $this->hasMany(Eixo::class);
    }

    public function estrategias() {
        return $this->hasMany(Estrategia::class);
    }
}
