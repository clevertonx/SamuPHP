<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Protocolo extends Model
{
    use HasFactory;

    protected $table = 'samu.protocolos';

    protected $fillable = ['tipo_prazo_id', 'data_solicitacao', 'data_retirada'];

    public function tipoPrazos(): HasMany
    {
        return $this->hasMany(TipoPrazo::class);
    }
}
