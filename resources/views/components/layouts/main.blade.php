<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Canela</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/style.css');?>">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg nav-estilo">
            <div class="container-fluid">
                <a class="navbar-brand ps-3" href="<?= route('home'); ?>">
                <img src="{{ asset('canela.png') }}" alt="Ir al inicio" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                     <a class="nav-link" href="<?= route('home');?>">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= route('productos');?>">Productos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= route('blog');?>">Blog</a>
                    </li>
                    @auth
                        @if (auth()->user()->rol_fk == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="<?= route('entradas.index');?>">Administrar Blog</a>
                            </li>
                        @endif
                    @endauth
                    <li class="nav-item">
                    <a class="nav-link" href="<?= route('contacto');?>">Contacto</a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ms-auto align-items-lg-center">
                @auth
                     <li class="nav-item">
                        <form action="{{ route('auth.logout') }}" method="POST" class="mt-2">
                             @csrf
                             <span class="nav-usuario me-2">{{ auth()->user()->email }}</span>
                            <button type="submit" class="boton-salir btn btn-primary">Cerrar Sesión</button>
                        </form>
                    </li>
                @else    
                    <li class="nav-item">
                    <a class="nav-link" href="<?= route('auth.login.form');?>">Acceder</a>
                    </li>
                @endauth
                   
                </ul>
                </div>
            </div>
        </nav>

    <main class="container my-3">
        {{-- Feedback pop-up --}}
        @if (session()->has('feedback.message'))
            <div class="alert alert-{{ session('feedback.status') ?? 'success' }}">{{ session('feedback.message') }}</div>
            {{-- Todos son de color 'success', excepto los que se aclaran con 'feedback.status' --}}
        @endif

       {{ $slot }}

    </main>

   <footer class="footer">
    <p>Lara Esteva | DWN4AV | Parcial 2 - Portales y Comercio Electrónico</p>
   </footer>

   </div>
</body>
</html>