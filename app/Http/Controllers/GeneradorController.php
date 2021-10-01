<?php

namespace App\Http\Controllers;

use App\Models\Generador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->agencia;


        /*
        $datos['bitacoras'] = Bitacora::paginate(5);
        return view('bitacora.index', $datos);
        */

        $datos['generador'] = DB::table('generadors')->where('agencia', '=', $user)->orderByDesc('id')->paginate(12);

        return view('generador.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosGenerador = request()->except('_token');
        Generador::insert($datosGenerador);
        return redirect('generador')->with('mensaje', 'Reporte registrado con Exito..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function show(Generador $generador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function edit(Generador $generador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generador $generador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generador $generador)
    {
        //
    }
}
