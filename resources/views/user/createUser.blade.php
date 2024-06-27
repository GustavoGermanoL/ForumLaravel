

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="main.css">
</head>
<style>

body {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    height: 100vh;
    /* background-color : #d3d3d3; */
}
 form {
  --bg-light: #efefef;
  --bg-dark: #707070;
  --clr: #58BC82;
  --clr-alpha: #9c9c9c60;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  width: 70vh;
}

.form .input-span {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}

form input[type="email"],
form input[type="text"],
form input[type="password"] {
  border-radius: 0.5rem;
  padding: 1rem 0.75rem;
  width: 100%;
  border: none;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background-color: var(--clr-alpha);
  outline: 2px solid var(--bg-dark);
}

form input[type="email"]:focus,
form input[type="text"]:focus,
form input[type="password"]:focus {
  outline: 2px solid var(--clr);
}

.label {
  align-self: flex-start;
  color: #2196f3;
  font-weight: 600;
}

form .submit {
  padding: 1rem 0.75rem;
  width: 100%;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  border-radius: 3rem;
  background-color: var(--bg-dark);
  color: var(--bg-light);
  border: none;
  cursor: pointer;
  transition: all 300ms;
  font-weight: 600;
  font-size: .9rem;
}

form .submit:hover {
  background-color: var(--clr);
  color: var(--bg-dark);
}

.span {
  text-decoration: none;
  color: var(--bg-dark);
}

.span a {
  color: #2196f3;
}    
</style>
<body>
    
        <form method="post" action =  "{{ route('register') }}"  class="form" >
          @csrf
            <h1>Registro</h1>
            <p>Insira seus dados para se registrar</p>
            <span class="input-span">
            <label class ="label" >Nome</label>
            <input type="text" name = "name" placeholder="Insira seu nome" value = "{{ old('name') }}"/></span>
            @error('name') <span> {{ $message }} </span> @enderror

            <span class = "input-span">
            <label class ="label">E-mail</label>
            <input type="email" name = "email" placeholder="Insira seu email" value = "{{ old('email') }}"  /> </span>
            @error('email') <span> {{ $message }} </span> @enderror

            <span class = "input-span">
            <label class ="label">Password</label>
            <input type="password" id="password" name = "password" placeholder="Coloque sua senha" /></span>
            @error('password') <span> {{ $message }} </span> @enderror

            <span class = "input-span">
            <label class="label">Confirm Password</label>
            <input type="password" id="password_confirmation" name = "password_confirmation" placeholder="Confirme sua senha" /></span>
            <input type="submit" value="Registre-se" class="submit" />
            <span class = "span">Já tem uma conta? <a href="{{ route('login') }}"> Faça o login aqui! </a></span>
        
    </div>
</body>
</html>


