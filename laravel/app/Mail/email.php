<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NombreDeTuMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre; // Variable pública para almacenar el nombre del cliente u otros datos

    /**
     * Create a new message instance.
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre; // Asigna el nombre pasado como argumento al atributo $nombre
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Has sido aceptado en Egiflex', // Define el asunto del correo electrónico
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.aceptado', // Define la vista para el contenido del correo electrónico
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.aceptado') // Define la vista para la construcción del correo electrónico
            ->subject('Has sido aceptado en Egiflex') // Define el asunto del correo electrónico
            ->with([
                'nombre' => $this->nombre, // Pasa el nombre del cliente a la vista
            ]);
    }
}
