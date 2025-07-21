<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>
<body>
    <img src="{{ asset('images/logoDIF.png') }}" alt="tiranosaurio">

    <h2>Acceso al Sistema de Gestión de Menores DIF</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p>Inserte sus credenciales para ingresar</p>

        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required value="{{ old('nombre_usuario') }}">
        <input type="password" name="password" placeholder="Contraseña personal" required>
        <button type="submit">Acceder</button>

        @error('nombre_usuario')
            <div style="color: red;">{{ $message }}</div>
        @enderror
    </form>

    <div style="margin-top: 20px;">
        <a href="{{ route('registro') }}" style="text-decoration: none;">
            <button type="button">Registrarse</button>
        </a>
    </div>
</body>
</html>