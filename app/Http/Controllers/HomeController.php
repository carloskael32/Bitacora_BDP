<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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


        $bitacoras = DB::select('select agencia, COUNT(EncargadoOP) total from bitacoras where MONTH(fecha) = date("%m") group by agencia');
        

        $puntos = [];
        foreach ($bitacoras as $bitac){
            $puntos[] = ['name'=>$bitac['agencia'], 'y'=> ($bitac['total'])];
        }
        //return response()->json($puntos);
        return view ("index", ["data"=>json_encode($puntos)]);
    }
}
