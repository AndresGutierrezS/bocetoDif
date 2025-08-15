<header id="main-navbar">
    <div class="container header-content">
        <div class="logo">
            <a href="{{route('inicio')}}"><img src="{{ asset('images/logoDIF.png') }}" alt="LOGO DIF"></a>
                <div class="logo-text">
                    <h1>Sistema Segumiento de Gestión de Menores</h1>
                    <p>DIF Guadalajara</p>
                </div>
            </div>
       <div class="user-info">
    <img src="{{ asset('images/user.png') }}" alt="Administrador">
    <div class="user-details">
        <p>{{ Auth::user()->nombre_usuario ?? 'Administrador' }}</p>
        <p>Último acceso: {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Cerrar sesión</button>
    </form>
</div>
    </div>
</header>

<script> //CÓDIGO JS PARA QUE EL NAVBAR SE OCULTE AL HACER SCROLL 
    let lastScrollTop = 0;
    const navbar = document.getElementById("main-navbar");

    window.addEventListener("scroll", function () {
        let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // Scroll hacia abajo ocultar navbar
            navbar.style.top = "-100px";
        } else {
            // Scroll hacia arriba mostrar navbar
            navbar.style.top = "0";
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    });
</script>

<style>
    :root {
        --azul-oscuro: #1a365d;
        --azul-medio: #2c5282;
        --gris-claro: #f5f5f5;
        --gris-medio: #e2e8f0;
        --gris-oscuro: #718096;
        --blanco: #ffffff;
        --rojo: #e53e3e;
    }
    
    header {
        background-color: var(--azul-oscuro);
        color: var(--blanco);
        padding: 15px 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
        transition: top 0.3s ease;

    }
    
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .logo {
        display: flex;
        align-items: center;
    }
    
    .logo img {
        height: 50px;
        margin-right: 15px;
    }
    
    .logo-text h1 {
        font-size: 1.5rem;
        margin: 0;
        font-weight: 600;
    }
    
    .logo-text p {
        font-size: 0.9rem;
        margin: 0;
        opacity: 0.9;
    }
    
    .user-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            background-color: var(--gris-medio);
        }

    
    .user-details p {
        margin: 0;
        font-size: 0.9rem;
    }
    
    .user-details p:first-child {
        font-weight: 600;
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
        margin-left: 10px;
    }
    
    .logout-btn:hover {
        background-color: var(--blanco);
        color: var(--azul-oscuro);
    }


</style>