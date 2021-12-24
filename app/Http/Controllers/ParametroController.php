<?php

namespace App\Http\Controllers;

use App\Models\parametro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ParametroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->agencia;


        /*
        $datos['bitacoras'] = Bitacora::paginate(5);
        return view('bitacora.index', $datos);
        */

        $datos = DB::select('select * from parametros');


        //return view('bitacora.bitacora', $datos);
        return view('parametro.index')->with(['dtpa' => $datos]);
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
     * @param  \App\Models\parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function show(parametro $parametro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function edit(parametro $parametro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parametro $parametro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parametro  $parametro
     * @return \Illuminate\Http\Response
     */
    public function destroy(parametro $parametro)
    {
        //
    }
}
