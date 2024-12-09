@extends('layouts.gpt')

@section('content')
<style>
/* O mesmo estilo usado no createTopic */
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
.select,
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
.select:focus,
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
        <h1 class="title">Editar Tópico</h1>

        <form method="POST" action="{{ route('routeUpdateTopic', $topic->id) }}" class="form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Título -->
            <label for="title" class="label">Título</label>
            <input type="text" id="title" name="title" class="input" value="{{ old('title', $topic->title) }}" required>
            @error('title')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Descrição -->
            <label for="description" class="label">Descrição</label>
            <textarea id="description" name="description" class="input" rows="4" required>{{ old('description', $topic->description) }}</textarea>
            @error('description')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Status -->
            <label for="status" class="label">Status</label>
            <input type="text" id="status" name="status" class="input" value="{{ old('status', $topic->status) }}" required>
            @error('status')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Imagem -->
            <label for="image" class="label">Imagem</label>
            <input type="file" id="image" name="image" class="file">
            @error('image')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Categoria -->
            <label for="category_id" class="label">Categoria</label>
            <select id="category_id" name="category_id" class="select" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <!-- Tags -->
            <label for="tags" class="label">Tags</label>
            <select id="tags" name="tags[]" class="select" multiple>
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">
                    {{ $tag->title }}
                </option>
                @endforeach
            </select>
            @error('tags')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <input type="submit" class="submit">Atualizar Tópico
        </form>
    </div>
</div>
@endsection
