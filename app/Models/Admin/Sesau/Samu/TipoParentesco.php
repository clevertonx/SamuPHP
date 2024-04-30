<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoParentesco extends Model
{
    use HasFactory;

    protected $table = 'samu.tipo_parentescos';

    protected $fillable = [
        'nome', 'status'
    ];
}
