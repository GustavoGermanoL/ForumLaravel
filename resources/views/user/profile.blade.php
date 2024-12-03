  @extends('layouts.gpt')

  @section('content')
  @if($user != null)

  <style>
body {
    background-color: #808080;
    color: rgb(253, 253, 253);
    font-family: "Segoe UI", Arial, sans-serif;
}

.profile-container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #3b3b3b;
    border: 1px solid #3a8bbd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.profile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #fff;
    margin-right: 20px;
    border: 3px solid #3a8bbd;
    overflow: hidden;
    /* Impede que a imagem saia dos limites do círculo */
}

.profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* Garante que a imagem ocupe toda a área do círculo sem distorção */
}

.profile-details h2 {
    margin: 0;
    font-size: 1.8rem;
    color: #fff;
}

.profile-details p {
    margin: 5px 0;
    font-size: 1rem;
    color: #d3d3d3;
}

.profile-actions {
    display: flex;
    gap: 10px;
}

.btn {
    display: inline-block;
    padding: 10px 15px;
    font-size: 1rem;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-edit {
    background-color: #3a8bbd;
}

.btn-edit:hover {
    background-color: #2c6d99;
}

.btn-delete {
    background-color: #d9534f;
}

.btn-delete:hover {
    background-color: #c12e2a;
}

.profile-sections {
    margin-top: 20px;
}

.section {
    background-color: #2d2d2d;
    margin-bottom: 15px;
    padding: 15px;
    border: 1px solid #3a8bbd;
    border-radius: 5px;
}

.section h3 {
    margin: 0 0 10px;
    font-size: 1.4rem;
    color: #fff;
}

.card {
    background-color: #3b3b3b;
    padding: 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #3a8bbd;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.card h4 {
    margin: 0;
    font-size: 1.2rem;
    color: #fff;
}

.card p {
    margin: 5px 0 10px;
    font-size: 1rem;
    color: #d3d3d3;
}

.card-actions {
    text-align: right;
}

.card-actions .btn {
    padding: 5px 10px;
    font-size: 0.9rem;
}
  </style>

  <div class="profile-container">
      <!-- Cabeçalho do perfil -->
      <div class="profile-header">
          <div class="profile-avatar">
              <img src="{{ asset('storage/' .$user->photo)}}" alt="Foto">
          </div>
          <div class="profile-details">
              <h2>{{ $user->name }}</h2>
              <p>Email: {{ $user->email }}</p>
          </div>
          <!-- Ações do usuário -->
          <div class="profile-actions">
              <a href="{{ route('routeEditUser', $user->id) }}" class="btn btn-edit">Editar Usuário</a>
              <form action="{{ route('routeDeleteUser', $user->id) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-delete">Deletar Usuário</button>
              </form>
          </div>
      </div>

      <!-- Seções -->
      <div class="profile-sections">
          <!-- Tópicos do usuário -->
          <div class="section">
              <h3>Seus Tópicos</h3>
              @forelse($topics as $topic)
              <div class="card">
                  <h4>{{ $topic->title }}</h4>
                  <p>Criado {{ $topic->created_at->diffForHumans() }}</p>
                  <div class="card-actions">
                      <a href="{{ route('routeListTopic', $topic->id) }}" class="btn btn-edit">Visualizar</a>
                  </div>
              </div>
              @empty
              <p>Nenhum tópico criado ainda.</p>
              @endforelse
          </div>

          <!-- Comentários do usuário -->
          <div class="section">
              <h3>Seus Comentários</h3>
              @forelse($comments as $comment)
              <div class="card">
                  <h4>Comentário em: {{ $comment->topic->title }}</h4>
                  <p>"{{ $comment->content }}"</p>
                  <p>Postado {{ $comment->created_at->diffForHumans() }}</p>
                  <div class="card-actions">
                      <a href="{{ route('routeListTopic', $comment->topic->id) }}" class="btn btn-edit">Visualizar
                          Tópico</a>
                  </div>
              </div>
              @empty
              <p>Nenhum comentário feito ainda.</p>
              @endforelse
          </div>
      </div>
  </div>

  @endif
  @endsection