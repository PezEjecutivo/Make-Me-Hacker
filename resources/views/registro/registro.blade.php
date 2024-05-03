@extends('login.layouts')

@section('content')

<div>
    <div class="container">
        <h2>Registrarse</h2>
        <form action="{{route("login.registro")}}" method="POST">
            <div class="form-group">
                <label for="username">Nombre de usuario:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required minlength="5">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required minlength="8">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</div>

@endsection