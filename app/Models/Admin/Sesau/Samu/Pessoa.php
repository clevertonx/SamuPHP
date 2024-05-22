<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'samu.pessoas';

    protected $fillable = ['nome', 'endereco', 'bairro', 'cpf', 'telefone', 'rg', 'email', 'data_nascimento', 'user_id', 'status'];

    public $rules = [
        'data.nome' => 'required|min:1|max:255',
    ];

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = strtoupper($value);
    }

    public static function columns()
    {
        return [
            Column::make('id')->searchable()->sortable(),
            Column::make('nome')->searchable()->sortable(),
            Column::make('Ação')->view('livewire.admin.sesau.samu.tipo.actions'),];
    }
}
