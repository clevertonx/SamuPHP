<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoParentesco extends Model
{
    use HasFactory;

    protected $table = 'samu.tipo_parentescos';

    protected $fillable = [
        'nome', 'status'
    ];

    public function atendimento(): BelongsTo
    {
        return $this->belongsTo(Atendimento::class);
    }
}
