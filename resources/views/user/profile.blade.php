@extends('layouts.gpt')

@section('header', 'Listar Usuários por ID')

@section('content')
  @if($user != null)

  <h2> Perfil </h2>
  
    <table>
        <tr>
            <td> Nome </td>
            <td> Email </td>
        </tr>
        <tr>
            <td> {{$user -> name}} </td>
            <td> {{$user -> email}} </td>
            <td> <p class = "editButton" href='updateUser.blade.php'> Edite este usuário </td>
        </tr>
    </table>
    @endif

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

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 20px;
  position: fixed;
  bottom: 0;
  width: 100%;
}
    </style>