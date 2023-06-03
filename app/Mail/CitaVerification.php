<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CitaVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $fecha;
    public $hora;
    public $servicio;
    public $lugar;

    /**
     * Create a new message instance.
     *
     * @param string $fecha
     * @param string $hora
     * @param string $servicio
     * @param string $lugar
     * @return void
     */
    public function __construct($fecha, $hora, $servicio, $lugar)
    {
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->servicio = $servicio;
        $this->lugar = $lugar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.cita_information')
            ->subject('Información de Cita');
    }
}
