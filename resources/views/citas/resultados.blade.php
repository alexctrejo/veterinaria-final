<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Resultados</title>
</head>
<body>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Citas</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-700 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="p-2 border border-gray-300">Fecha</th>
                    <th class="p-2 border border-gray-300">Hora</th>
                    <th class="p-2 border border-gray-300">Tipo</th>
                    <th class="p-2 border border-gray-300">Lugar</th>
                    <th class="p-2 border border-gray-300">Nombre de la Mascota</th>
                    <th class="p-2 border border-gray-300">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                    <tr>
                        <td class="p-2 border border-gray-300">{{ $cita->fecha }}</td>
                        <td class="p-2 border border-gray-300">{{ $cita->hora }}</td>
                        <td class="p-2 border border-gray-300">{{ $cita->es_veterinaria_estetica ? 'Veterinaria' : 'Estética' }}</td>
                        <td class="p-2 border border-gray-300">{{ $cita->lugar }}</td>
                        <td class="p-2 border border-gray-300">{{ $cita->nombre_mascota }}</td>
                        <td class="p-2 border border-gray-300">
                            <div class="flex">
                                <a href="{{ route('citas.edit', $cita) }}" class="bg-yellow-500 text-white py-1 px-2 rounded-md mr-2">Editar</a>
                                <form action="{{ route('citas.destroy', $cita) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded-md" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cita?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('citas.create') }}" class="bg-blue-500 m-10 text-white py-2 px-4 rounded-md float-right">Crear nueva cita</a>
        <a href="{{ route('dashboard') }}" class="bg-blue-500 m-10 text-white py-2 px-4 rounded-md float-right">Inicio</a>

    </div>
</body>
</html>
