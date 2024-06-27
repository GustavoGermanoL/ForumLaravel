<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/3ec66055ff.js" crossorigin="anonymous"></script>
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
  width: 50vh;
}

.form .input-span {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .5rem;
}

form input[type="email"],
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
form input[type="password"]:focus {
  outline: 2px solid var(--clr);
}

.label {
  align-self: flex-start;
  /* color: var(--clr); */
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
  /* color: var(--clr); */
    color: #2196f3;
}

.password-toggle-icon {
  position: relative;
  z-index: 2;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}

.password-toggle-icon i {
  font-size: 18px;
  line-height: 1;
  color: #333;
  transition: color 0.3s ease-in-out;
  margin-bottom: 20px;
}

.password-toggle-icon i:hover {
  color: #000;
}

    </style>
</head>
<body>
    <div>
        
        <form action = "{{ route('login') }}" method = "post" class= "form">
            @csrf
            <h2>Login</h2>
            <span class="input-span">
            <label for="email" class="label">Email</label>
            <input type="email" name="email" id = "email" placeholder = "Email" value = "{{ old('email') }}" required></span>
            @error('email') <span> {{ $message }} </span> @enderror
            <span class="input-span">
            <label for="password" class="label">Password</label>
            <input type="password" name='password' id = "password" placeholder="Password" required>
             </span>
            
            
            @error('password') <span> {{ $message }} </span> @enderror
            <input class="submit" type="submit" value = "Logar">
            <span class = "span">Não tem uma conta? <a href="{{ route('register') }}"> Registre-se aqui! </a></span>
        </form>
    </div>
</body>
</html>

