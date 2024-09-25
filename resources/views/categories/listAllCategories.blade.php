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
</style>

<table>
    <tr>
        <td> Titulo </td>
        <td> Descrição </td>
        <td> Criado em </td>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td> {{$category->title}} </td>
        <td> {{$category->description}} </td>
        <td> {{$category->created_at}} </td>
        
        </td>
        <td>
            <form action="{{ route('routeDeleteCategory', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-user-slash"> Deletar categoria </i>
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