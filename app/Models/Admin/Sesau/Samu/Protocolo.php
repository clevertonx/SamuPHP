<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    use HasFactory;

    protected $table = 'samu.protocolos';

    protected $fillable = ['data_solicitacao', 'data_retirada'];
}
