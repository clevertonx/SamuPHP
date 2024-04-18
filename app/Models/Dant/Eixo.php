<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eixo extends Model
{
    use HasFactory;

    protected $table = 'dant.eixos';
    protected $fillable = [
        'plano_id', 'nome', 'descricao', 'status'
    ];

    public function plano() {
        return $this->belongsTo(Plano::class);
    }

    public function estrategias() {
        return $this->hasMany(Estrategia::class);
    }
}
