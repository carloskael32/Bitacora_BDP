<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailAlert;
use  Illuminate\Support\Facades\Mail;

class Balert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitacora:alerta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $ay = DB::select('SELECT * from bitacoras where fecha = date(now()) and Agencia = "prueba" or Agencia = "prueba1"');
        if ($ay == ''){

            $correo = new EmailAlert;

            Mail::to('virgi')->send($correo);

        }
     
        //$admin = DB::select('select email from users where acceso = "yes"');

     
    }
}
