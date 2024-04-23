<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    use HasFactory;

    protected $table = 'samu.ocorrencias';

    protected $fillable = ['numero', 'data', 'hora', 'natureza', 'motivo', 'equipe_atendimento', 'endereco_ocorrencia', 'bairro', 'cidade', 'ocorrencia'];
}
