<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Mail\EmailAlert;
use App\Mail\ReporteMensual;
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

/*
consulta correcta
        $eno = DB::select('SELECT u.agencia, u.name,u.email from agencias as a INNER JOIN users as u ON a.agencia = u.agencia where a.agencia NOT IN(SELECT u.agencia from bitacoras as b INNER JOIN agencias as a on b.agencia = a.agencia INNER JOIN users as u on b.agencia = u.agencia where fecha = DATE_SUB(date(now()), INTERVAL 1 DAY))');
  
        $correo = new EmailAlert;
        Mail::to($eno)->send($correo);
*/
        
        $admin = DB::select('select email from users where acceso = "yes"');
    
        $correo = new EmailAlert;
        Mail::to($admin)->send($correo);

    }
}
