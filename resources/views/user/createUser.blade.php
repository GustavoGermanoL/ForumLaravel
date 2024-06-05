

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="page">
        <form method="post" action =  "{{ route('register') }}"  class="formRegister" >
          @csrf
            <h1>Register</h1>
            <p>Enter your details to create an account.</p>
            <label for="name">Nome</label>
            <input type="text" name = "name" placeholder="Enter your name" value = "{{ old('name') }}"/>
            @error('name') <span> {{ $message }} </span> @enderror
            <label for="email">E-mail</label>
            <input type="email" name = "email" placeholder="Enter your email" value = "{{ old('email') }}"  />
            @error('email') <span> {{ $message }} </span> @enderror
            <label for="password">Password</label>
            <input type="password" id="password" name = "password" placeholder="Enter your password" />
            @error('password') <span> {{ $message }} </span> @enderror
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name = "password_confirmation" placeholder="Confirm your password" />
            <input type="submit" value="Register" class="btn" />
        </form>
    </div>
</body>
</html>


<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900');

.page {
    width: 80%;
    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.formRegister {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

label {
    margin-bottom: 10px;
}

input[type="text"], input[type="email"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #3e8e41;
}
</style>