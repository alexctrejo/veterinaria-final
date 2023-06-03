<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cita;
use Illuminate\Http\Request;
use App\Mail\CitaVerification;
use Illuminate\Support\Facades\Mail;

class CitaController extends Controller
{
    public function create()
    {
        return view('citas.create');
    }

    public function store(Request $request)
{
    try {
        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'es_veterinaria_estetica' => 'required|boolean',
            'lugar' => 'required|in:Valle Dorado,MacroPlaza,Pórticos',
            'nombre_mascota' => 'nullable|string',
        ]);

        // Crear una nueva instancia de Cita con los datos validados
        $cita = new Cita();
        $cita->fecha = $validatedData['fecha'];
        $cita->hora = $validatedData['hora'];
        $cita->es_veterinaria_estetica = $validatedData['es_veterinaria_estetica'];
        $cita->lugar = $validatedData['lugar'];
        $cita->nombre_mascota = $validatedData['nombre_mascota'];

        // Asociar la cita al usuario autenticado
        $user = auth()->user();
        $cita->user_id = $user->id;
        $cita->save();

        // Obtener el correo electrónico del usuario autenticado
        $email = $user->email;

        // Obtener los datos necesarios para el correo
        $fecha = $cita->fecha;
        $hora = $cita->hora;
        $servicio = $cita->es_veterinaria_estetica ? 'Veterinaria' : 'Estética';
        $lugar = $cita->lugar;

        // Enviar el correo de verificación
        Mail::to($email)->send(new CitaVerification($fecha, $hora, $servicio, $lugar));

        // Redirigir a la página de resultados
        return redirect()->route('citas.resultados')->with('success', 'La cita se ha creado correctamente.');
    } catch (\Exception $exception) {
        // Manejar el error de migración de la base de datos
        $migrationError = "Error al guardar la cita. Por favor, intenta nuevamente.";
        return redirect()->route('citas.create')->with('migrationError', $migrationError);
    }
}


    public function showResults()
    {
        $user = auth()->user();
        $citas = $user->citas;
        return view('citas.resultados', compact('citas'));
    }

    public function edit(Cita $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, Cita $cita)
    {
        $validatedData = $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required',
            'es_veterinaria_estetica' => 'required|boolean',
            'lugar' => 'required|in:Valle Dorado,MacroPlaza,Pórticos',
            'nombre_mascota' => 'nullable|string',
        ]);

        $cita->fecha = $validatedData['fecha'];
        $cita->hora = $validatedData['hora'];
        $cita->es_veterinaria_estetica = $validatedData['es_veterinaria_estetica'];
        $cita->lugar = $validatedData['lugar'];
        $cita->nombre_mascota = $validatedData['nombre_mascota'];

        $cita->save();

        return redirect()->route('citas.edit', $cita)->with('success', 'La cita se ha actualizado correctamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();

        return redirect()->route('citas.resultados')->with('success', 'La cita se ha eliminado correctamente.');
    }
}
