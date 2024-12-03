@extends('layouts.gpt')

@section('header', 'Bem-Vindo')

@section('content')
<style>
    .container {
    font-family: Arial, sans-serif;
    margin: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.container h2 {
    text-align: center;
    margin: 20px 0;
}

.topics-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.topic {
    width: 300px;
    background-color: rgb(45, 45, 45);
    border: 1px solid #3a8bbd;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    color: white;
    text-align: center;
    transition: transform 0.2s, background-color 0.2s;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    height: 380px; /* Define uma altura para garantir consistência nos cards */
}

.topic:hover {
    transform: scale(1.05);
    background-color: rgb(33, 33, 33);
}

.topic h3 {
    font-size: 20px;
    color: #fff;
    margin: 10px 0;
}

.topic p {
    font-size: 14px;
    color: #ccc;
    margin: 10px 0;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3; /* Limita a 3 linhas */
    -webkit-box-orient: vertical;
}

.topic img {
    width: 100%;
    height: auto;
    object-fit: contain; /* Ajusta a imagem para cobrir a área sem distorcer */
    border-radius: 5px;
    margin-top: 0px;
}

.topic a {
    text-decoration: none;
    color: #3a8bbd;
    font-weight: bold;
    margin-top: 10px;
    transition: color 0.2s;
}

.topic a:hover {
    color: #fff;
}

.topic-create {
    margin: 20px 0;
    font-size: 16px;
    color: #333;
    text-align: center;
}

.topic-create a {
    margin-left: 10px;
    text-decoration: none;
    color: #007bff;
}

.topic-create a:hover {
    color: #0056b3;
}

/* Responsividade para telas menores */
@media (max-width: 768px) {
    .topics-container {
        flex-direction: column; /* Exibe os tópicos em coluna */
        align-items: center;
    }

    .topic {
        width: 100%; /* Faz os cards ocuparem toda a largura disponível */
        max-width: 350px; /* Define uma largura máxima */
        margin-bottom: 20px;
    }

    .topic img {
        height: 120px; /* Ajusta o tamanho da imagem em telas menores */
    }
}

</style>

<div class="container">
    @if(auth()->check())
    <h2>Seja bem-vindo, {{ auth()->user()->name }}</h2>
    @else
    <h2>Seja bem-vindo, Visitante</h2>
    @endif

    <p class="topic-create">
        Crie um Tópico 
        <a class="fa-solid fa-plus" href="{{ route('routeCreateTopic') }}"></a>
    </p>

    <h3>Tópicos em alta</h3>

    <div class="topics-container">
        @foreach($topics as $topic)
        <div class="topic">
            <h3>{{ $topic->title }}</h3>
            <p>{{ $topic->description }}</p> <!-- Adicionando a descrição -->
            <img src="{{ $topic->post && $topic->post->image ? asset('storage/' . $topic->post->image) : asset('storage/no-image.png') }}" alt="Imagem do Tópico">

            <a href="{{ route('routeListTopic', $topic->id) }}">Ver Detalhes</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
