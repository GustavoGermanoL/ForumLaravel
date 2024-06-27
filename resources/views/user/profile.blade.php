@extends('layouts.gpt')

@section('content')
@if($user != null)

<style>
  .actions a {
  text-decoration: none;
  color: black;
  font-size: 13px;
  padding: 8px;
  margin-top: 13px;
}

  .delete {
        background-color: #d9534f; 
        color: white; 
        border: none; 
        padding: 8px 10px; 
        font-size: 10px; 
        border-radius: 3px; 
        cursor: pointer; 
        display: flex; 
        align-items: center; 
        margin-top: 15px;
    }


    .delete:hover {
        background-color: #c9302c; 
    }


  .description {
    font-size: 1.2rem;
    font-family: serif;
  }
  .container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
  }

  .header {
    position: relative;
    background-color: #f5f8fa;
    border: 1px solid #e1e8ed;
    border-radius: 8px;
    overflow: hidden;
  }

  .banner {
    height: 200px;
    background-color: #3c3c3c;
  }

  .profile-info {
    display: flex;
    align-items: center;
    padding: 20px;
  }

  .avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 20px;
    border: 3px solid #fff;
  }

  .details {
    flex: 1;
  }

  .name {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
    color: #333;
  }

  .email {
    margin: 5px 0 0;
    font-size: 16px;
    color: #657786;
  }

  .actions {
    display: flex;
    justify-content: flex-end;
    margin: 20px 0;
  }

  
</style>

  <div class="container">
    <div class="header">
      <div class="banner"></div>
      <div class="profile-info">
        
        <div class="details">
          <h2 class="name">{{ $user->name }}</h2>
          <p class="email">{{ $user->email }}</p>
          <p class = "description"> Olá sou o {{ $user -> name }} e tenho um grande interesse por tecnologia , espero conhecer semelhantes para discutirmos sobre o cenario atual tecnologico.</p>
        </div>
      </div>
    </div>
    <div class="actions">
      <a class = "fa-solid fa-user-pen" href="{{ route('routeEditUser', $user->id) }}"> Editar Perfil </a>
    <form action="{{ route('routeDeleteUser', $user->id) }}" method = "POST">
                @csrf
                @method('DELETE') 
              <button type="submit" class="delete">
                  <i class="fa-solid fa-user-minus"> Excluir Perfil </i>
              </button>
            </form>
    </div>
  </div>

@endif
@endsection
