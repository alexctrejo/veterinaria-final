<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    
    <title>Crear cita</title>
</head>
<body>
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="w-1/2 max-w-lg p-6 bg-white rounded-md shadow-md">
            <h1 class="text-2xl font-bold mb-4">Crear Cita</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded-md">{{ session('success') }}</div>
            @endif

            <form action="{{ route('citas.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-input rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="hora" class="block text-gray-700 text-sm font-bold mb-2">Hora:</label>
                    <input type="time" name="hora" id="hora" class="form-input rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label for="es_veterinaria_estetica" class="block text-gray-700 text-sm font-bold mb-2">Veterinaria o Estética:</label>
                    <select name="es_veterinaria_estetica" id="es_veterinaria_estetica" class="form-select rounded-md shadow-sm">
                        <option value="1">Veterinaria</option>
                        <option value="0">Estética</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="lugar" class="block text-gray-700 text-sm font-bold mb-2">Lugar:</label>
                    <select name="lugar" id="lugar" class="form-select rounded-md shadow-sm">
                        <option value="Valle Dorado">Valle Dorado</option>
                        <option value="MacroPlaza">MacroPlaza</option>
                        <option value="Pórticos">Pórticos</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="nombre_mascota" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la mascota:</label>
                    <input type="text" name="nombre_mascota" id="nombre_mascota" class="form-input rounded-md shadow-sm">
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Guardar</button>
            </form>
        </div>

        <a href="{{ route('dashboard') }}" class="fixed bottom-4 right-4 bg-gray-500 text-white py-2 px-4 rounded-md">Inicio</a>
    </div>
</body>
</html>
