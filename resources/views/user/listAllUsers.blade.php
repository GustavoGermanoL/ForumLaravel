@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

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
        <td> Nome </td>
        <td> Email </td>
    </tr>
    @foreach($users as $user)
    <tr>
        <td> {{$user->name}} </td>
        <td> {{$user->email}} </td>
        <td> <a class="fa-solid fa-street-view" href="{{ route('routeListUser', Auth::user()->id) }}"> Visualizar </a>
        </td>
        <td> <a class="fa-solid fa-user-lock" href=""> Suspender </a> </td>
        <td>
            <form action="{{ route('routeDeleteUser', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-user-slash"> Banir </i>
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