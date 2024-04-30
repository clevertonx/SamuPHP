<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TipoPrazo extends Model
{
    use HasFactory;

    protected $table = 'samu.tipo_prazos';

    protected $fillable = [
        'nome', 'status'
    ];

    public function protocolo(): BelongsTo
    {
        return $this->belongsTo(Protocolo::class);
    }
}
