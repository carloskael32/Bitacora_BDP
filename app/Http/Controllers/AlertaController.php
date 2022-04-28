<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametro = DB::select('select * from parametros');
        //GENERADOR DE ALERTAS

        foreach ($parametro as $pa) {
            $temmax =  $pa->temmax;
            $hummax =  $pa->hummax;
        }
        //$fc = date("Y-m");
        $datos = DB::select('select * from alertas where MONTH(fecha) = MONTH(date(NOW())) order by fecha desc');
        //return response()->json($datos);
        return view('complebit.alert')->with(['bitacoras' => $datos, 'parametro' => $parametro]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function show(Alerta $alerta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function edit(Alerta $alerta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alerta $alerta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alerta  $alerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alerta $alerta)
    {
        //
    }
}
