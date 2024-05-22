<?php

namespace App\Models\Admin\Sesau\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kdion4891\LaravelLivewireTables\Column;


class TipoFim extends Model
{
    use HasFactory;

    protected $table = 'samu.tipo_fins';

    protected $fillable = [
        'nome', 'status'
    ];

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
