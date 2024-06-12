@extends('layouts.gpt')

@section('header', 'Editar Usuário')

@section('content')
**HTML**
```html
//CRIAR UMA ROTA PARA MANDAR OS DADOS DO USER PRO UPDATE
<form id="edit-user-form" method = "post" action = "{{ route('routeUpdateUser') }}">
  @method('put'); 
  <label for="username">Nome: {{$user -> name}}</label>
  <input type="text" id="username" name="name" value=""><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" value=""><br><br>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" value=""><br><br>

  <input type="submit" value="Save Changes">
</form>
@endsection

@section('footer')

Feito Por Gustavo Germânico

@endsection

<style>
  #edit-user-form {
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

input[type="text"], input[type="email"], input[type="password"] {
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
