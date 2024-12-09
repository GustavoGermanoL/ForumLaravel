@extends('layouts.gpt')

@section('header', 'Listar as Categorias')

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

.btn {
    display: inline-block;
    padding: 10px 15px;
    font-size: 1rem;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 20px; /* Espaço abaixo do botão */
}

.btn-create {
    background-color: #28a745;
}

.btn-create:hover {
    background-color: #218838;
}

.btn-edit {
    background-color: #3a8bbd;
}

</style>

<!-- Botão para criar uma nova tag -->
<a href="{{ route('routeCreateTag') }}" class="btn btn-create">Criar Nova Tag</a>

<table>
    <tr>
        <td> Título </td>
    </tr>
    @foreach($tags as $tag)
    <tr>
        <td> {{$tag->title}} </td>
        <td>
            <a href="{{ route('routeEditTag', $tag->id) }}" class="btn btn-edit">Editar Tag</a>
        </td>
        <td>
            <form action="{{ route('routeDeleteTag', $tag->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-user-slash"> Deletar Tag </i>
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection

@section('footer')
Feito Por Gustavo Germânico
@endsection
