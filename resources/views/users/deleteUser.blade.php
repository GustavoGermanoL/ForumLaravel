@extends('layouts.gpt')

@section('header', 'Delete um Usuário')

@section('content')
<table>
    <tr>
        <td> Nome </td>
        <td> Email </td>
    </tr>
    <tr>
        <td> Dados </td>
        <td> Dados </td>
    </tr>
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
