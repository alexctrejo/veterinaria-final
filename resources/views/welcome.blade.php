<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Woof</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <nav class="container mx-auto py-4 px-8 flex items-center justify-between">
            <img class="h-10 w-15" src="{{ asset('images/vetlogo.png')}}" alt="">
            @if (Route::has('login'))
                <div class="ml-10 flex items-baseline space-x-4 bg-lime-600">
                    @auth
                        <a href="{{ route('citas.create') }}" class="btn btn-primary">Crear Cita</a>
                        <a href="{{ route('citas.resultados') }}" class="btn btn-primary">Ver mis citas</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-black hover:text-slate-700 px-3 py-2 rounded-md text-sm font-medium">Cerrar sesión</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-black hover:text-slate-700 px-3 py-2 rounded-md text-sm font-medium">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-black hover:text-slate-700 px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
            <a href="#" class="text-xl font-semibold">Veterinaria Woof</a>
        </nav>
    </header>

    <main class="container mx-auto py-8">
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Bienvenido @auth<span class="text-green-500 text-4xl">{{ auth()->user()->name }}</span>@endauth</h1>
        
        <!-- Resto del contenido de la página -->
        <div class="container flex justify-center  bg-cyan-100">
            <img class="h-60 w-70 m-3" src="{{ asset('images/carrousel1.jpg')}}" alt="">
            <img class="h-60 w-70 m-3" src="{{ asset('images/carrousel2.jpg')}}" alt="">
            <img class="h-60 w-70 m-3" src="{{ asset('images/carrousel3.jpg')}}" alt="">
        </div>

    </main>


    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto text-center">
            <p>© 2023 Veterinaria. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>
