@extends('layouts.gpt')

@section('content')
@if($topic != null)

<style>
body {
    background-color: #808080;
    color: rgb(253, 253, 253);
}

.container {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
}

div .message-cell.message-cell--user {
    font-family: "Segoe UI", "Helvetica Neue", Helvetica, Roboto, sans-serif;
    font-size: 15px;
    color: rgb(253, 253, 253);
    text-align: left;
    background-color: rgb(27, 27, 27);
    border: 1px solid rgb(46, 45, 45);
    padding: 10px;
    width: 140px;
    box-sizing: border-box;
    border-radius: 3px;
    margin-right: 20px;
    /* Colocando a parte do usuário à esquerda */
}

.bbWrapper {
    flex: 1;
    background-color: rgb(33, 33, 33);
    border-radius: 5px;
    border: 1px solid #3a8bbd;
    padding: 15px;
    width: 100%;
    max-width: 800px;
    /* Limita o tamanho do conteúdo do tópico */
    margin: 0 auto;
    /* Centraliza o conteúdo do tópico */
}

.bbWrapper,
.bbImage,
.message-content {
    font-family: "Segoe UI", sans-serif;
    font-size: 15px;
    line-height: 21px;
    color: white;
    background-color: transparent;
    margin: 0;
    padding: 0;
    word-wrap: break-word;
}

.bbImage {
    width: 100%;
    height: auto; 
    max-width: 100%; 
    object-fit: contain; 
    margin: 0 auto; 
    display: block; 
}

.bbImage img {
    width: 100%; 
    height: auto; 
    object-fit: contain; 
}



.message-content {
    padding: 10px;
    background-color: rgb(45, 45, 45);
    border: none;
    border-radius: 5px;
}

.message-tags {
    padding: 10px;
    background-color: rgb(45, 45, 45);
    border-radius: 5px;
    border: none;
    margin-top: 10px;
}

.message-tags p {
    color: rgb(255, 255, 255);
}

.message-tags p a {
    color: #3a8bbd;
    text-decoration: none;
}

.message-tags p a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .message-cell.message-cell--user {
        width: 100%;
        margin-right: 0;
    }

    .bbWrapper {
        padding: 10px;
    }
}


.comment-section {
    margin-top: 20px;
    padding: 10px;
    border-top: 2px solid #ddd;
}

.comment-section h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #333;
}


.comment-form {
    margin-bottom: 20px;
}

.comment-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    min-height: 100px;
}

.comment-form button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.comment-form button:hover {
    background-color: #0056b3;
}


.comment {
    background-color: rgb(45, 45, 45);
    padding: 15px;
    margin-bottom: 15px;
    border: 1px solid #3a8bbd;
    border-radius: 5px;
    color: white;
}

.comment p {
    font-size: 1rem;
    color: #fff;
    margin-bottom: 10px;
}


.comment-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.comment-actions form {
    display: inline;
}

.comment-actions button {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.9rem;
    transition: background-color 0.3s;
}

.comment-actions button:hover {
    background-color: #218838;
}

.comment-actions .delete-button {
    background-color: #dc3545;
}

.comment-actions .delete-button:hover {
    background-color: #c82333;
}

.success-message {
    background-color: #28a745;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.error-message {
    background-color: #dc3545;
    color: white;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}.actions form {
    display: inline-block;
    margin-left: 10px;
}

.btn-edit, .btn-delete {
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-edit {
    background-color: #3a8bbd;
    color: white;
}

.btn-edit:hover {
    background-color: #e0a800;
}

.btn-delete {
    background-color: #dc3545;
    color: white;
}

.btn-delete:hover {
    background-color: #c82333;
}

.comment-form button,
.comment-actions button {
    padding: 10px 20px;
    font-size: 1rem;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.comment-form button:hover,
.comment-actions button:hover {
    background-color: #0056b3;
}
</style>

<div class="container">
    <div style="display: flex; justify-content: flex-start; align-items: flex-start;">
       
        <div class="message-cell message-cell--user">
            <p>Usuário: <strong>{{ $topic->post->user->name }}</strong></p>
            <p>Posts do Usuário: <strong>{{ $userPostsCount }}</strong></p>
        </div>

        <div class="bbWrapper">
            <h1 class="title"> {{$topic -> title}} </h1>

            <div class="message-content">
                <div class="bbImage">
                    <img src="{{ asset('storage/' . $topic->post->image) }}" alt="Imagem do Tópico">
                </div>

                <br>
                <div class="text">
                    <p> {{$topic-> description}} </p>
                </div>
                <div class="message-tags">
                    <p>Tag:
                        @foreach ($topic->tags as $tag)
                        {{ $tag-> title }}
                        @endforeach
                    </p>
                    <P>Categoria: {{$topic -> category -> title }}</P>
                </div>

                @if(auth()->check() && auth()->user()->id === $topic->post->user_id)
            <div class="actions">
                <!-- Formulário para editar o tópico -->
                <form action="{{ route('routeEditTopic', ['cid' => $topic->id]) }}" method="GET">
                    @csrf
                    <button type="submit" class="btn-edit">Editar Tópico</button>
                </form>

                <!-- Formulário para excluir o tópico -->
                <form action="{{ route('routeDeleteTopic', ['cid' => $topic->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Excluir Tópico</button>
                </form>
            </div>
            @endif

            </div>

            
            
        </div>
    </div>

    <div class="comment-section">
        <h3>Comentários</h3>

        <!-- Criar comentário -->
        <form action="{{ route('routeCreateComment', ['tid' => $topic->id]) }}" method="POST" class="comment-form">
            @csrf
            <textarea name="content" required placeholder="Escreva seu comentário..."></textarea>
            <button type="submit">Comentar</button>
        </form>

        <!-- Exibição dos comentários -->
        @foreach ($topic->comments as $comment)
        <div class="comment">
            <p>{{ $comment->content }}</p>

            <div class="comment-actions">
                <!-- Editar comentário -->
                @if(auth()->check() && auth()->user()->id === $comment->user_id)
                <form action="{{ route('routeEditComment', ['cid' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <textarea name="content" required>{{ $comment->content }}</textarea>
                    <button type="submit">Editar</button>
                </form>
                @endif

                <!-- Excluir comentário -->
                @if(auth()->check() && auth()->user()->id === $comment->user_id)
                <form action="{{ route('routeDeleteComment', ['cid' => $comment->id, 'tid' => $topic->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este comentário?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">Excluir</button>
                </form>
                @endif
            </div>

        </div>
        @endforeach
    </div>
</div>

@endif
@endsection