@extends('layouts.gpt')

@section('header', 'Bem Vindo')

@section('content')
<style>
    .container {
        font-family: Arial, sans-serif;
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container h2 {
        text-align: center;
        margin: 20px 0;
    }

    .topics-container {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        align-content: space-around;
        justify-content: space-around;
    }

    .topic {
        width: 500px;
        height: 300px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
    }

    .topic h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }


    
</style>

<div class="container">
    @if(auth()->check())
    <h2> Seja bem-vindo {{ auth()->user()->name }} </h2>
    @else
    <h2> Seja bem-vindo Visitante</h2>
    @endif
<p class = "topic-create" > Crie um Tópico  <a class="fa-solid fa-plus" href = "{{route('routeCreateTopic')}}" ></a> </p>
    <h3> Tópicos em alta </h3> 

    <div class="topics-container">
        <div class="topic">
            <h3>Tópico 1</h3>
        </div>
        <div class="topic">
            <h3>Tópico 2</h3>
        </div>
        <div class="topic">
            <h3>Tópico 3</h3>
        </div>
        <div class="topic">
            <h3>Tópico 4</h3>
        </div>
    </div>
</div>
@endsection
