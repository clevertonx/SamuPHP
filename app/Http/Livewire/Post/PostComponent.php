<?php

namespace App\Http\Livewire\Post;

use App\Models\Post\Post;
use Livewire\Component;

class PostComponent extends Component
{


    public $posts, $nome, $descricao, $data_post, $tipo, $status, $radio, $checkbox;
    public $isOpen = 0;
    public $postId;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.post.post-component');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'data_post' => 'required',
            // Adicione outras regras de validação conforme necessário
        ]);

        Post::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data_post' => $this->data_post,
            'tipo' => $this->tipo,
            'status' => $this->status ? $this->status : false,
            'radio' => $this->radio,
            'checkbox' => $this->checkbox,
        ]);

        session()->flash('message', 'Post criado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->id = $id;
        $this->nome = $post->nome;
        $this->descricao = $post->descricao;
        $this->data_post = $post->data_post;
        $this->tipo = $post->tipo;
        $this->status = $post->status;
        $this->radio = $post->radio;
        $this->checkbox = $post->checkbox;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'data_post' => 'required',
            // Adicione outras regras de validação conforme necessário
        ]);

        $post = Post::find($this->id);
        $post->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'data_post' => $this->data_post,
            'tipo' => $this->tipo,
            'status' => $this->status ? $this->status : false,
            'radio' => $this->radio,
            'checkbox' => $this->checkbox,
        ]);

        session()->flash('message', 'Post atualizado com sucesso.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post deletado com sucesso.');
    }

    public function resetInputFields()
    {
        $this->nome = '';
        $this->descricao = '';
        $this->data_post = '';
        $this->tipo = '';
        $this->status = '';
        $this->radio = '';
        $this->checkbox = '';
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

}
