<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Generador;



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



        $bitacoras = DB::select('select agencia, COUNT(EncargadoOP) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia order by total desc');
        //$bitacoras = DB::select(DB::raw('select agencia, COUNT(EncargadoOP) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia'));

        //dd($bitacoras);
        //return response()->json($bitacoras);

        $puntos = [];
        $array = json_decode(json_encode($bitacoras), true);

        $dias = 21;


        foreach ($array as $bitac) {

            if ($bitac['total'] <= $dias) {
                $b = round(($bitac['total'] * 100) / $dias);
                $puntos[] = ['name' => $bitac['agencia'], 'y' => $b];
            } else {
                $puntos[] = ['name' => $bitac['agencia'], 'y' => 100];
            }
        }


        $bitacora = DB::select('select agencia, COUNT(EncargadoOP) total from bitacoras where MONTH(fecha) = MONTH(date(NOW())) group by agencia order by total desc');

        $generador = DB::select('select * from generadors where MONTH(fecha) = MONTH(date(NOW())) order by fecha desc');
        //return response()->json($generador);


        //return view("index", ["datos1" => json_encode($puntos)],$resultado2);
        return view('index')->with(["datos1" => json_encode($puntos), 'generador' => $generador,'registros'=>$bitacora, 'tapin'=>'active']);
    }
}
