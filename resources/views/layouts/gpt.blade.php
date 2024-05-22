<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

nav {
  background-color: #9acd32; /* Verde claro */
  width: 200px;
  height: 100vh; /* Altura total da viewport */
  position: fixed;
  top: 0;
  left: 0;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: block;
}

nav ul li a {
  display: block;
  padding: 15px 20px;
  text-decoration: none;
  color: #333;
}

nav ul li a:hover {
  background-color: #c0d9af; /* Verde mais escuro ao passar o mouse */
}
.content {
  margin-left: 220px; /* Ajusta a margem esquerda para começar após a largura do menu */
  padding: 20px; /* Adiciona um espaçamento interno para o conteúdo */
  box-sizing: border-box; /* Garante que o padding não aumente a largura total */
}
    </style>
</head>
<body>
    
<header> <h1>@yield('header')</h1> </header>
    <nav>
    <ul>
      <li><a href="#">Página Inicial</a></li>
      <li><a href="#">Sobre</a></li>
      <li><a href="#">Serviços</a></li>
      <li><a href="#">Contato</a></li>
    </ul>
  </nav>
        

    <div class = "content">
        @yield('content')
    </div>

    <footer> @yield('footer') </footer>
</body> 
</html>