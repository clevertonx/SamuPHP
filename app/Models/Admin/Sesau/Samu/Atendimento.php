<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Atendimento extends Model
{
    use HasFactory;

    protected $table = 'samu.atendimentos';

    protected $fillable = ['solicitante_id', 'paciente_id','tipo_parentesco_id', 'tipo_fim_id', 'data_atendimento', 'horario', 'endereco', 'fato_acontecido', 'transportado_para', 'observacoes', 'user_id', 'status'];

    protected $guarded = [];

    public function protocolo(): HasOne
    {
        return $this->hasOne(Protocolo::class);
    }

    public function tipo_parentesco(): BelongsTo
    {
        return $this->belongsTo(TipoParentesco::class);
    }

    public function tipo_fim(): BelongsTo
    {
        return $this->belongsTo(TipoFim::class);
    }

    public function solicitante(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'solicitante_id');
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Pessoa::class, 'paciente_id');
    }

}
