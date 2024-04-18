<div>
    <!-- Botão para adicionar novo post -->
    <button class="btn btn-primary mb-3" wire:click="create">Adicionar Novo</button>

    <!-- Card com a tabela de posts -->
    <div class="card">
        <div class="card-header">
            Lista de Posts
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Data do Post</th>
                            <th>Tipo do Post</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->nome }}</td>
                            <td>{{ $post->descricao }}</td>
                            <td>{{ $post->data_post }}</td>
                            <td>{{ $post->tipo_post }}</td>
                            <td>{{ $post->status ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <!-- Botão para editar post (abrir modal) -->
                                <button class="btn btn-sm btn-primary" wire:click="edit({{ $post->id }})">Editar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Inclua o modal de adição/edição de posts -->
    @include('posts.form')
</div>
