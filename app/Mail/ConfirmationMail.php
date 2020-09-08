<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $dias;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details, $dias)
    {
        //
        $this->details = $details;
        $this->dias = $dias;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reserva de Culto Iglesia Cristiana Josue')
            ->view('mail.confirmationMail');
    }
}
