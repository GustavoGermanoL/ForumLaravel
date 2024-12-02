<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/3ec66055ff.js" crossorigin="anonymous"></script>
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
        position: fixed;
        /* Fixa no topo da página */
        top: 0;
        /* Alinha ao topo */
        width: 100%;
        /* Ocupa toda a largura */
        z-index: 1000;
        /* Garante que o header esteja acima de outros elementos */

    }

    nav {
        background-color: #3c3c3c;
        padding: 10px;
        display: flex;
    }



    .sidebar-main {
        box-sizing: border-box;
        background-color: #3c3c3c;
    }

    .sidebar {
        position: fixed;
        width: 164px;
        height: 90vh;
        display: flex;
        justify-content: space-between;
        border-right: 1px solid #0965bb;

    }

    .sidebar ul {
        text-align: center;

    }

    .home-page {
        margin-top: 50px;
        text-decoration: none;
        color: #38b6ff;
    }

    .exit {
        margin-top: auto;
        color: #38b6ff;
    }

    .sidebar li {
        display: inline-block;
        margin-bottom: 50px;
        margin-left: -50px;

    }

    a {
        text-decoration: none;
        color: #0081fe;
    }

    .header-left {
        font-weight: bold;
        text-align: center;
        flex: 1;
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    .profile {
        position: fixed;
        bottom: 40;
    }

    .login {
        position: fixed;
        bottom: 0;
        margin-right: 20px;
    }

    .exit {
        position: fixed;
        bottom: 0;
        margin-left: -50px;
    }

    .content {
        margin-top: 100px;   
        margin-left: 164px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <header>
        <div class="header-left">
            <h1>Fórum Tech</h1>
        </div>
        <!-- @if(auth()->check())
        <div class="header-right">
            <a class="btn-login" href="{{route('logoutUser')}}">Log Out</a>
        </div>
        @else
        <div class="header-right">
            <a class="btn-login" href="{{route('login')}}">Log in</a>
            <a class="btn-register" href="{{route('register')}}">Register</a>
        </div>
        @endif -->
    </header>

    <div class="sidebar-main">
        <div class="sidebar">
            <nav>
                <ul>
                    <li class="home-page">
                        <a class="fa-solid fa-house" href="{{route('routeIndex')}}"> <b>Pagina Inicial</b> </a>
                    </li>

                    <li class="fa-solid fa-magnifying-glass">Explorar</li>
                    @if(auth() -> check())
                    <li class="allusers">
                        <a class="fa-solid fa-users" href="{{ route('listAllUsers') }}"> Usuários </a>
                    </li>
                    @endif
                    <div class="spacer"></div>

                    @if(auth() -> check())

                    <li class="profile">
                        <a class="fa-solid fa-user" href="{{ route('routeListUser', Auth::user()->id) }}">Perfil</a>
                    </li>
                    <li class="exit">
                        <a class="fa-solid fa-right-from-bracket" href="{{ route('logoutUser') }}">Sair</a>
                    </li>




                    @else
                    <li class="login">
                        <a class="fa-solid fa-user" href="{{ route('login') }}"> Entrar </a>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <main>
        <div class="content">

            @yield('content')

        </div>

    </main>




</body>

</html>