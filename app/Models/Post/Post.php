<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'data_post', 'tipo', 'status', 'radio', 'checkbox'];

}
