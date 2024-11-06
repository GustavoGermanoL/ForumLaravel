@extends('layouts.gpt')

@section('header', 'Listar Todos os Topicos')

@section('content')

<style>
.fa-user-lock {
    color: red;
}

a {

    text-decoration: none;

}

table {
    width: 80%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}



table th,
table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px blue;
}

table th {
    background-color: #333;
    color: white;
}

.delete {
    background-color: #d9534f;
    color: white;
    border: none;
    padding: 8px 10px;
    font-size: 15px;
    border-radius: 3px;
    cursor: pointer;
    display: flex;
    align-items: center;
    margin-top: 15px;
}


.delete:hover {
    background-color: #c9302c;
}
</style>

<table>
    <tr>
        <td> Titulo </td>
        <td> Descrição </td>
        <td> Status </td>
    </tr>
    @foreach($topics as $topic)
    <tr>
        <td> {{$topic->title}} </td>
        <td> {{$topic->description}} </td>
        <td> {{$topic->status}} </td>
        <td> <a class="fa-solid fa-street-view" href="{{ route('routeListTopic', $topic -> id) }}"> Visualizar </a>
        </td>
        <td>

            <form action="{{ route('routeDeleteTopic', $topic->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @if(Auth::check())
                <button type="submit" class="delete">
                    <i class="fa-solid fa-user-slash"> Deletar Tópico </i>
                </button>
                @endif
            </form>
        </td>
    </tr>

    @endforeach
</table>

@endsection

@section('footer')

Feito Por Gustavo Germânico

@endsection