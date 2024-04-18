<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $table = 'dant.avaliacoes';
    protected $fillable = [
        'indicador_id', 'ano', 'realizado', 'avaliacao', 'comentario',
        'user_id', 'key'
    ];
    
    public function indicador() {
        return $this->belongsTo(Indicador::class);
    }


}
