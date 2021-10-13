<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['agencia'] = DB::select('select * from agencias order by id desc');
        return view('agencia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agencia.create');
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
        $datosAgencia = request()->except('_token');
        Agencia::insert($datosAgencia);
        return redirect('agencia')->with('mensaje1', 'Registrado con Exito..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function show(Agencia $agencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Agencia $agencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencia $agencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Agencia::destroy($id);
        return redirect('agencia')->with('mensaje2', 'Registro Borrado..');
    }
}
