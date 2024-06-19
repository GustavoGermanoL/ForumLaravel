@extends('layouts.gpt')

@section('header', 'Listar Todos os Usuários')

@section('content')
  
    <table>
        <tr>
            <td> Nome </td>
            <td> Email </td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td> <a class = "editButton" href="{{ route('routeEditUser', $user->id) }}"> Edite este usuário </td>
            <td> 
            <form action="{{ route('routeDeleteUser', $user->id) }}" method = "POST">
                @csrf
                @method('DELETE') 
              <input type="submit" value="Apague este usuário">
            </form>
            </td>
        </tr>
        
        @endforeach
    </table>

@endsection

@section('footer')

 Feito Por Gustavo Germânico

@endsection

<style>
    table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ddd;
}

table tr:nth-child(even) {
  background-color: #f2f2f2;
}

table th, table td {
  padding: 8px;
  text-align: left;
}

table th {
  background-color: #333;
  color: white;
}


    </style>