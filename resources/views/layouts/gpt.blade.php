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
  background-color: #3c3c3c;
  padding: 10px;
  display: flex;
  justify-content: space-between;
  
  align-items: center;
  border-bottom: 2px solid #0965bb;
}

nav {
    background-color: #3c3c3c;
    padding: 10px;
    display: flex;
}

.left-sidebar-main {
  box-sizing: border-box;
  background-color: #3c3c3c;
}

.left-sidebar-sticky {
  position: fixed;
  width: 164px;
  height: 90vh;
  display: flex;
  justify-content: space-between;
  border-right: 1px solid #0965bb;
   
}

.left-sidebar-sticky ul {
  text-align: center;
  
}
.home-page{
  margin-top: 70px;
}
.left-sidebar-sticky li {
  display: inline-block;
  margin-bottom: 50px;
   
}
.header-left {
  font-size: 15px;
  font-weight: bold;
}

.header-right {
  display: flex;
  align-items: center;
}

.btn-login {
  background-color: #F0F4F5; 
  color: #479BD8;
  border: 1px outset buttonborder;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 10px; 
  margin-left: 10px;
  text-decoration: none;

}
.btn-register {
  background-color: #479BD8; 
  color: #F0F4F5;
  border: 1px outset buttonborder;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 10px; 
  margin-left: 10px;
  text-decoration: none;

}

.btn-login:hover,.btn-register:hover {
  background-color: #87cefa; 
}

.content {
  margin-left: 220px; /* adjust the margin to fit your content */
  padding: 20px; /* add some padding to create space between content and sidebar */
  box-sizing: border-box;
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
    
<header>
<div class="header-left">
    <h1> Fórum </h1>
</div>

<div class="header-right">
  <a class="btn-login" href="{{route('login')}}">Log in</a>
  <a class="btn-register" href="{{route('register')}}"> Register</a>
</div>

</header>
 
<div class= "left-sidebar-main">
  <div class = "left-sidebar-sticky"> 
  <nav>
    <ul>
      <li class="home-page" > <a href="{{route('routeIndex')}}"> Home Page </a></li>
      <li> Meus tópicos </li>
      <li> Explorar </li>
    </ul>
</nav>
  </div>


</div>
    <!-- <nav class = "topnav">
    <ul>
      <li><a href="#">Página Inicial</a></li>
      <li><a href="#">Explorar</a></li>
      <li><a href="#">Notificações</a></li>
      <li><a href="#">Minhas conversas</a></li>
      <li><a href="#">Configurações</a></li>
     <li><a href="{{ route('logoutUser') }}"> Deslogar </a>
    </ul>
  </nav> -->
        
  
<main>
    <div class = "content">
        @yield('content')
    </div>
</main>
    <!-- <footer> Feito por Gustavo Germânico </footer> -->
</body> 
</html>