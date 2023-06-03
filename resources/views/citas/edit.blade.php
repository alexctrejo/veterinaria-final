<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Editar</title>
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto max-w-md p-6 bg-white rounded-md shadow">
            <h1 class="text-2xl font-bold mb-4">Editar cita de {{ $cita->nombre_mascota }}</h1>
        
            @if(session('success'))
                <div class="bg-green-200 text-green-700 p-4 mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('citas.update', $cita) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-input rounded-md shadow-sm" value="{{ $cita->fecha }}">
                </div>

                <div class="mb-4">
                    <label for="hora" class="block text-gray-700 text-sm font-bold mb-2">Hora:</label>
                    <input type="text" name="hora" id="hora" class="form-input rounded-md shadow-sm" value="{{ $cita->hora }}">
                </div>

                <div class="mb-4">
                    <label for="es_veterinaria_estetica" class="block text-gray-700 text-sm font-bold mb-2">Servicio:</label>
                    <select name="es_veterinaria_estetica" id="es_veterinaria_estetica" class="form-select rounded-md shadow-sm">
                        <option value="1" {{ $cita->es_veterinaria_estetica ? 'selected' : '' }}>Veterinaria</option>
                        <option value="0" {{ !$cita->es_veterinaria_estetica ? 'selected' : '' }}>Estética</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="lugar" class="block text-gray-700 text-sm font-bold mb-2">Lugar:</label>
                    <select name="lugar" id="lugar" class="form-select rounded-md shadow-sm">
                        <option value="Valle Dorado" {{ $cita->lugar == 'Valle Dorado' ? 'selected' : '' }}>Valle Dorado</option>
                        <option value="MacroPlaza" {{ $cita->lugar == 'MacroPlaza' ? 'selected' : '' }}>MacroPlaza</option>
                        <option value="Pórticos" {{ $cita->lugar == 'Pórticos' ? 'selected' : '' }}>Pórticos</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="nombre_mascota" class="block text-gray-700 text-sm font-bold mb-2">Cambiar nombre de la mascota:</label>
                    <input type="text" name="nombre_mascota" id="nombre_mascota" class="form-input rounded-md shadow-sm" value="{{ $cita->nombre_mascota }}">
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Guardar</button>
                <a href="{{ route('citas.resultados') }}" class="bg-gray-500 text-white py-2 px-4 rounded-md ml-2">Ver mis citas</a>
            </form>
        </div>
    </div>
</body>
</html>
