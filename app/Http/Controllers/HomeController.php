<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Generador;
use DateTime;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // calcula los dias de cada mes sin los domingos
        $starDate = new DateTime();
        $starDate->modify('first day of this month');

        $ct = 0;
        $cd = 0;
        $endDate = new DateTime();
        $endDate->modify('last day of this month');
        while ($starDate <= $endDate) {
            if ($starDate->format('l') == 'Sunday') {
                //echo $starDate->format('y-m-d (D)') . "<br/>";
                $cd++;
            }
            $starDate->modify("+1 days");
            $ct++;
        }
        $dias = $ct - $cd;


        $bitacoras = DB::select('select agencia, COUNT(encargadoop) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia order by total desc');
        //$bitacoras = DB::select(DB::raw('select agencia, COUNT(encargadoop) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia'));

        //dd($bitacoras);
        //return response()->json($bitacoras);

        $puntos = [];
        $array = json_decode(json_encode($bitacoras), true);

        foreach ($array as $bitac) {

            if ($bitac['total'] <= $dias) {
                $b = round(($bitac['total'] * 100) / $dias);
                $puntos[] = ['name' => $bitac['agencia'], 'y' => $b];
            } else {
                $puntos[] = ['name' => $bitac['agencia'], 'y' => 100];
            }
        }

        
        $bitacora = DB::select('select agencia, COUNT(agencia) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia order by total desc');

        $generador = DB::select('select distinct agencia, fecha, agencia from generadors where MONTH(fecha) = MONTH(date(NOW())) and  1 = 1 order by fecha desc');
        //return response()->json($generador);
        $agt = DB::select('select COUNT(agencia) totalag from users where acceso = ?',['no']);

        $mes = date("Y-m");

        $gent = DB::select('select COUNT(agencia) as totalge from generadors where 1=1 and date_format(fecha, "%Y-%m") = ? ',[$mes]);

        $users = DB::select('select COUNT(user) as totalus from users where acceso = ? ',['yes']);
 

        //$generador = DB::select('select * from generadors where date_format(fecha, "%Y-%m") = ? order by fecha desc', [$mes]);
        
        //return view("index", ["datos1" => json_encode($puntos)],$resultado2);
        return view('index')->with(["datos1" => json_encode($puntos), 'generador' => $generador, 'registros' => $bitacora,'totalag'=>$agt,'totalge'=>$gent,'totalu'=>$users]);
    }
}
