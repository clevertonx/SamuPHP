<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'samu.pessoas';

    protected $fillable = ['nome', 'endereco', 'bairro', 'cpf', 'telefone', 'rg', 'email', 'data_nascimento', 'user_id', 'status'];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }
}
