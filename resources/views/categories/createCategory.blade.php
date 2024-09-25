<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Criar Categoria </title>
</head>
<style>
.span {
  text-decoration: none;
  color: var(--bg-dark);
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
body {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    height: 100vh;
    /* background-color : #d3d3d3; */
}
.form .input-span {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .5rem;
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
    
</style>
<body>
    <form method = "POST" action = "{{ route('routeCreateCategory') }}">
        @csrf
        <h1> Criar categoria </h1>
         <!-- Titulo -->
        <span class="input-span">
        <input type = "text" name = "title" placeholder = "Insira o titulo" value = "{{ old('title') }}"></span>
        <!-- Descrição -->
        <span class="input-span">
        <input type = "text" name = "description" placeholder = "Insira a Descrição" value = "{{ old('description') }}"></span>
       
        <input type="submit" value="Crie" class="submit" />
</body>
</html>