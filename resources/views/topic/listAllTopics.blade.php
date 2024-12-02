@extends('layouts.gpt')

@section('header', 'Listar Todos os Topicos')

@section('content')

<style>
body {
    background-color: #808080;
    color: #fff;
    font-family: "Segoe UI", sans-serif;
}

.container {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    background-color: #333;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

table th,
table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #3a8bbd;
    color: #fff;
    font-size: 16px;
}

table th {
    background-color: #3a8bbd;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
}

table tr:last-child td {
    border-bottom: none;
}

table tr:hover {
    background-color: #2c2c2c;
}

a {
    text-decoration: none;
    color: #3a8bbd;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

.delete {
    background-color: #d9534f;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.delete:hover {
    background-color: #c9302c;
}

td .fa-solid {
    margin-right: 8px;
    color: #3a8bbd;
}

td .fa-solid:hover {
    color: #1f6fb2;
}

</style>

<div class="container">
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Categoria</th>
                <th>Tags</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
            <tr>
                <td>{{$topic->title}}</td>
                <td>{{$topic->description}}</td>
                <td>{{$topic->status}}</td>
                <td>{{$topic->category->title}}</td>
                <td>
                    @foreach($topic->tags as $tag)
                    {{$tag->title}},
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('routeListTopic', $topic->id) }}">
                        <i class="fa-solid fa-eye"></i> Visualizar
                    </a>
                    <form action="{{ route('routeDeleteTopic', $topic->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">
                            <i class="fa-solid fa-user-slash"></i> Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('footer')

Feito Por Gustavo Germânico

@endsection