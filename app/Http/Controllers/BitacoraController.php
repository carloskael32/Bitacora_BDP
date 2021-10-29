<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Notifications\NotiBit;
//use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Notification;

//use Illuminate\Support\Facades\Notification;

class BitacoraController extends Controller
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

        $datos = DB::table('bitacoras')->where('Agencia', '=', $user)->orderByDesc('id')->paginate(10);

        //return view('bitacora.bitacora', $datos);
        return view('bitacora.bitacora')->with(['bitacoras' => $datos,'tapbi' =>'active']);
    }

    public function alertas()
    {
        //GENERADOR DE ALERTAS
        $datos = DB::select('select * from bitacoras where fecha = date(now()) and (Temperatura > 40 or Humedad > 85) ');
        //return response()->json($datos);

        //return view('complebit.alert', $datos);
        
        return view('complebit.alert')->with(['bitacoras' => $datos, 'tapal'=>'active']);

    }

    public function reportes()
    {

        if (Auth::user()->acceso == "no") {

            $agencia = Auth::user()->agencia;

            //return response()->json($ag);
            //usuarios
            //$ene['enero'] = DB::select('select  agencia, count(agencia) as result from bitacoras where year(Fecha) = YEAR(NOW()) and agencia = ? and month(Fecha) = 1 group by agencia ',[$agencia]);
          
           $meses = DB::select('select MONTH(Fecha) as mes, count(agencia) as result from bitacoras where agencia = ? group by mes',[$agencia]);
            
            //return response()->json($meses);

            //return view('complebit.report',$meses);
            return view('complebit.report')->with(['meses' => $meses,'tapre' =>'active']);

        } else {
            //administrador
            $ag['agencias'] = DB::select('select distinct agencia from bitacoras where 1=1');
            $datos['bitacoras'] = DB::table('bitacoras')->where('fecha', '=', date(now()))->orderByDesc('id')->paginate(20);
            return view('complebit.report', $datos, $ag);
        }

        //return response()->json($datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('bitacora.create');
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

            'Agencia' => 'required|string|max:100',
            'EncargadoOP' => 'required|string|max:100',
            'Temperatura' => 'required|string|max:50',
            'Humedad' => 'required|string|max:50',
            'Filtracion' => 'required|string|max:50',
            'UPS' => 'required|string|max:50',
            'Generador' => 'required|string|max:50',
            'Observaciones' => 'required|string|max:100',
            'Fecha' => 'required|date|max:50',


        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'

        ];

        $this->validate($request, $campos, $mensaje);

        //$datosBitacora = request()->all();
        $datosBitacora = request()->except('_token');
        Bitacora::insert($datosBitacora);


        //Notificacion

        $temperatura = $request->get('Temperatura');
        $humedad = $request->get('Humedad');

        if ($temperatura >= 40 or $humedad >= 85) {

            $adm = DB::select('select email from users where acceso = "yes"');
            
            Notification::route('mail', $adm)->notify(new NotiBit('CPD'));


            //$user = User::find(1);
            //$user->notify(new NotiBit);

        }
        return redirect('bitacora')->with('mensaje', 'Bitacora Agregada con Exito..');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $bitacora = Bitacora::findOrFail($id);
        return view('bitacora.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //MODIFICAR BITACORAS

        $datosBitacora = request()->except(['_token', '_method']);
        Bitacora::where('id', '=', $id)->update($datosBitacora);

        $bitacora = Bitacora::findOrFail($id);
        //return view('bitacora.edit', compact('bitacora'));

        //return response()->json($datosBitacora);
        return redirect('bitacora')->with('mensaje', 'Registro Modificado..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bitacora  $bitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // BORRAR BITACORAS
        Bitacora::destroy($id);
        return redirect('bitacora')->with('mensaje', 'Registro Borrado..');
    }
}
