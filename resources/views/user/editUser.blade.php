@extends('layouts.gpt')

@section('content')
<style>
/* Estilos para a página de edição de usuário */
body {
    background-color: #808080;
    color: rgb(253, 253, 253);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.bbWrapper {
    background-color: rgb(33, 33, 33);
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
}

.form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.label {
    font-size: 18px;
    color: #ffffff;
    font-weight: bold;
}

.input,
.file {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: rgb(45, 45, 45);
    color: white;
    font-size: 16px;
}

.input:focus,
.file:focus {
    outline: none;
    border-color: #3a8bbd;
}

.submit {
    background-color: #3a8bbd;
    color: white;
    font-size: 18px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit:hover {
    background-color: #2a74a1;
}

.error-message {
    color: #dc3545;
    font-size: 14px;
}
</style>

<div class="container">
    <div class="bbWrapper">
        <h1 class="title">Editar Usuário</h1>

        <form method="POST" action="{{ route('routeUpdateUser', $user->id) }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <label for="name" class="label">Nome</label>
            <input type="text" id="name" name="name" class="input" value="{{ old('name', $user->name) }}" required>
            @error('name')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Email -->
            <label for="email" class="label">Email</label>
            <input type="email" id="email" name="email" class="input" value="{{ old('email', $user->email) }}" required>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Senha -->
            <label for="password" class="label">Senha</label>
            <input type="password" id="password" name="password" class="input">
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Foto -->
            <label for="photo" class="label">Foto</label>
            <input type="file" id="photo" name="photo" class="file">
            @error('photo')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <input type="submit" value="Salvar Alterações" class="submit">
        </form>
    </div>
</div>
@endsection
