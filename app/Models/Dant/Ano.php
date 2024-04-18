<?php

namespace App\Models\Dant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ano extends Model
{
    use HasFactory;
    protected $table = 'dant.anos';

    protected $fillable = ['plano_id', 'ano', 'key', 'status'];

    public function plano(){
        return  $this->belongsTo(Plano::class);
    }
}
