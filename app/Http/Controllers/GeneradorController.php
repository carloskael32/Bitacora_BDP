<?php

namespace App\Http\Controllers;

use App\Mail\EmailAlertGenerador;
use App\Models\Generador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $age = Auth::user()->agencia;


        /*
        $datos['bitacoras'] = Bitacora::paginate(5);
        return view('bitacora.index', $datos);
        */

        //$datos = DB::table('generadors')->where('agencia', '=', $user)->orderByDesc('id');
        $datos = DB::select('select * from generadors where agencia = ? and year(fecha) = YEAR(NOW()) order by fecha desc', [$age]);

        //return view('generador.index', $datos);
        return view('generador.index')->with(['generador' => $datos]);
    }

    public function reportesge()
    {

        if (Auth::user()->acceso == "no") {
            //users
            $agencia = Auth::user()->agencia;
            //$meses = DB::select('select MONTH(fecha) as mes, count(agencia) as result from generadors where agencia = ? group by mes', [$agencia]);
            $meses = DB::select('select MONTH(fecha) as mes ,fecha from generadors where agencia = ? and year(fecha) = YEAR(NOW())  order by mes asc ', [$agencia]);
            //$meses = DB::select('select MONTH(fecha) as mes, count(agencia) as result from bitacoras where agencia = ? and year(fecha) = YEAR(NOW()) group by mes', [$agencia]);
            //return response()->json($meses);
            return view('complebit.reportge')->with(['meses' => $meses]);
        } else {
            //administrador
            $ag = DB::select('select distinct agencia from generadors where 1=1');
            //$datos['generador'] = DB::table('bitacoras')->where('fecha', '=', date(now()))->orderByDesc('id')->paginate(20);
            //$generador = DB::select('select * from generadors where MONTH(fecha) = MONTH(date(NOW())) order by fecha desc');
            $fecha = date("n");


            $generador = DB::table('generadors')->whereMonth('fecha', '=', $fecha)->orderByDesc('id')->paginate(20);
            //return $generador;
            return view('complebit.reportge')->with(['agencias' => $ag, 'generador' => $generador]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $age = Auth::user()->agencia;

        $datos = DB::select('select * from generadors where agencia = ? order by fecha desc limit 1', [$age]);
        return view('generador.create')->with(['generador' => $datos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campos = [

            'tiempo' => 'required|string|max:100',
            'marca' => 'required|string|max:100',


        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);


        $datosGenerador = request()->except('_token');
        Generador::insert($datosGenerador);

        //Correo de Alerta
        $obs = $request->get('observaciones');

        if ($obs != 'Sin Observaciones') {
            $adm = DB::select('select email from users where acceso = "yes"');
            $correo = new EmailAlertGenerador;
            Mail::to($adm)->send($correo);
        }
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
    public function edit($id)
    {
        //

        $generador = Generador::findOrFail($id);
        return view('generador.edit', compact('generador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //MODIFICAR generador

        $datosGenerador = request()->except(['_token', '_method']);
        Generador::where('id', '=', $id)->update($datosGenerador);

        $generador = Generador::findOrFail($id);
        //return view('bitacora.edit', compact('bitacora'));

        //return response()->json($datosBitacora);
        return redirect('generador')->with('mensaje', 'Registro Modificado..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generador  $generador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // BORRAR generador
        Generador::destroy($id);
        return redirect('generador')->with('mensaje', 'Registro Borrado..');
    }
}
