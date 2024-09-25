@extends('layouts.gpt')

@section('header', 'Editar Categoria')

@section('content')
<style>
  #edit-category-form {
  max-width: 400px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"], input[type="description"], input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
</style>

<form id="edit-category-form" method = "POST" action = "{{ route('routeUpdateCategory', $category->id) }}">
  @method('put')
  @csrf
  <label for="title">Title: </label>
  <input type="text" id="title" name="title" value="{{$category->title}}"><br><br>

  <label for="description">Descriçao: </label>
  <input type="text" id="description" name="description" value="{{$category -> description}}"><br><br>


  <input type="submit" value="Save Changes">
</form>

@endsection

@section('footer')

Feito Por Gustavo Germânico

@endsection


