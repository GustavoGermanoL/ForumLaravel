<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     

.sidebar {
  border-top: 4px solid #0833a2;
  position: absolute;
  top: 95px; /* adjust this value to match the height of your header */
  left: 0;
  width: 150px; /* adjust this value to change the width of the sidebar */
  height: 100vh;
  background-color: #f0f0f0;
  padding: 20px;
  border-right: 1px solid #ccc;
  color: '#A9A9A9';
  border-right: 2px solid #0833a2;
}

.sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  margin-bottom: 10px;
}

.sidebar a {
  text-decoration: none;
  color: #337ab7;
}

.sidebar a:hover {
  color: #23527c;
}

  body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

header {
  background-color: #333;
  color: #fff;
  padding: 8px;
  text-align: center;
  border-bottom: 2px solid #0833a2;
}


.content {
  margin-left: 220px; /* Ajusta a margem esquerda para começar após a largura do menu */
  padding: 20px; /* Adiciona um espaçamento interno para o conteúdo */
  box-sizing: border-box; /* Garante que o padding não aumente a largura total */
  
}
/* footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
} */
    </style>
</head>
<body>
    
<header> <h1>@yield('header')</h1> </header>
    <nav class = "sidebar">
    <ul>
      <li><a href="#">Página Inicial</a></li>
      <li><a href="#">Explorar</a></li>
      <li><a href="#">Notificações</a></li>
      <li><a href="#">Minhas conversas</a></li>
      <li><a href="#">Configurações</a></li>
    </ul>
  </nav>
        

    <div class = "content">
        @yield('content')
    </div>

    <!-- <footer> Feito por Gustavo Germânico </footer> -->
</body> 
</html>