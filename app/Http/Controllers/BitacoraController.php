<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

use App\Models\User;
use App\Notifications\NotiBit;

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
        //$datos['bitacoras'] = DB::select('select c count(id) from  bitacoras ');
        return view('bitacora.index');
    }

    public function bitacora()
    {


        /*
        $datos['bitacoras'] = Bitacora::paginate(5);
        return view('bitacora.index', $datos);
        */

        $datos['bitacoras'] = DB::table('bitacoras')->orderByDesc('id')->paginate(7);
        return view('bitacora.bitacora',$datos);
    }

    public function alertas()
    {

        $datos['bitacoras'] = DB::select('select * from bitacoras where Temperatura > 40 or Humedad > 85  order by id desc');


        return view('bitacora.alert', $datos);
    }

    public function reportes()
    {
        $ag['agencias'] = DB::select('select distinct agencia from bitacoras where 1=1');
        $datos['bitacoras'] = DB::table('bitacoras')->orderByDesc('id')->paginate(20);
        return view('bitacora.report', $datos, $ag);
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
         
            Notification::route('mail', $adm)->notify(new NotiBit);
            

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

        Bitacora::destroy($id);
        return redirect('bitacora')->with('mensaje', 'Registro Borrado..');
    }
}
