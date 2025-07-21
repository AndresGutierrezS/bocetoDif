<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            background-color: var(--gris-claro);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background-color: var(--azul-oscuro);
            color: var(--blanco);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo img {
            height: 60px;
        }

        .logo-text h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .logo-text p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .logout-btn {
            background-color: transparent;
            color: var(--blanco);
            border: 1px solid var(--blanco);
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background-color: var(--blanco);
            color: var(--azul-oscuro);
        }

        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: start;
            padding: 60px 40px;
        }

        .form-container {
            background-color: var(--blanco);
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 30px;
            width: 100%;
            max-width: 900px;
        }

        .form-header h2 {
            color: var(--azul-oscuro);
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        .form-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="logo">
            <img src="{{ asset('images/logoDIF.png') }}" alt="Logo DIF">
            <div class="logo-text">
                <h1>DIF Guadalajara</h1>
                <p>Sistema de Gestión de Menores</p>
            </div>
        </div>
        <a href="{{ route('login') }}">
            <button class="logout-btn">Volver al login</button>
        </a>
    </div>

    <div class="main-content">
        <div class="form-container">
            <div class="form-header">
                <h2>Registrar nuevo usuario</h2>
            </div>

            @if ($errors->any())
                <div class="alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('registro.post') }}">
                @csrf

                <div class="form-group">
                    <label for="nombre_usuario" class="required">Nombre de usuario</label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre de usuario" required>
                </div>

                <div class="form-group">
                    <label for="password" class="required">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="required">Confirmar contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>