<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class EmailAlertGenerador extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Generador - Alertas ";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


      /*   $datos = DB::select('select * from generadors where agencia = ? and year(fecha) = YEAR(NOW()) order by fecha desc',[$age]);

        return view('generador.index', $datos);
        return view('generador.index')->with(['generador' => $datos]); */

        return $this->view('emails.EmailAlertGenerador');
    }
}
