@extends('registro.layouts')

@section('content')


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish&display=swap"
            rel="stylesheet"
        >
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <div class="background"></div>
        <div style="display: flex; flex-direction: column;" class="centering">
        <form class="my-form" action="{{ route('registro.store') }}" method="POST">
        @CSRF
            <div class="text-field">
                <label for="name">Nombre de usuario:</label>
                <input
                    aria-label="Name"
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Nombre de usuario"
                    required
                >

            </div>
                <div class="text-field">
                    <label for="email">Correo electronico:</label>
                    <input
                        aria-label="Email"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="correo@gmail.com"
                        required
                    >
                    <img src="{{ asset('images/login/email.svg') }}" alt="Avatar">
                </div>
                <div class="text-field">
                    <label for="password">Contraseña:</label>
                    <input
                        id="password"
                        type="password"
                        aria-label="Password"
                        name="password"
                        placeholder="Contraseña"
                        title="Al menos 6 caracteres, una letra y un numero"
                        pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$"
                        required
                    >
                    <img src="{{ asset('images/login/password.svg') }}" alt="Avatar">
                </div>
                <button type="submit" class="my-form__button">Registrarse</button>
            </form>
        </div>
    </body>
</html>

@endsection