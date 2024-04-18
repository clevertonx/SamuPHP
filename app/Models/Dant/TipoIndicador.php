<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIndicador extends Model
{
    use HasFactory;

    protected $table = 'dant.tipo_indicadores';
    protected $fillable = [
        'nome', 'status'
    ];


}
