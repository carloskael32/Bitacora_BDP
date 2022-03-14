<?php

namespace App\Http\Controllers;


use App\Mail\EmailAlertParameter;
use App\Models\Alerta;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;



use DateTime;

use Illuminate\Support\Facades\Mail;


class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $age = Auth::user()->agencia;


        /*
        $datos['bitacoras'] = Bitacora::paginate(5);
        return view('bitacora.index', $datos);
        */
        $fc = date("Y-m");
        $bitacoras = DB::select('select * from bitacoras where agencia = ? and date_format(fecha, "%Y-%m") = ? order by fecha desc',[$age,$fc]);
        

        //return view('bitacora.bitacora', $datos);
        
        return view('bitacora.bitacora')->with(['bitacoras' => $bitacoras]);
    }

    public function alertas()
    {

       
    }

    public function reportes()
    {

        if (Auth::user()->acceso == "no") {
            //USUARIO
            $agencia = Auth::user()->agencia;
            //$ene['enero'] = DB::select('select  agencia, count(agencia) as result from bitacoras where year(fecha) = YEAR(NOW()) and agencia = ? and month(fecha) = 1 group by agencia ',[$agencia]);
            $meses = DB::select('select MONTH(fecha) as mes, count(agencia) as result from bitacoras where agencia = ? and year(fecha) = YEAR(NOW()) group by mes', [$agencia]);

            $dmes = [];



            for ($i = 1; $i <= 12; $i++) {

                $starDate = new DateTime(Date("Y-$i"));

                $starDate->modify('first day of this month');

                $ct = 0;
                $cd = 0;
                $endDate = new DateTime(Date("Y-$i"));

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
                $dmes[] = ['td' => $dias];
            }
            //return $dmes;






            return view('complebit.report')->with(['meses' => $meses, 'dmes' => $dmes]);
        } else {
            //ADMINISTRADOR
            //$hoy = date('Y-m-d');

            $ag = DB::select('select distinct agencia from users where 1=1 and acceso = "no"');
            //return response()->json($ag);
            $fc = date("Y-m");

            $datos = DB::select('select * from bitacoras where date_format(fecha, "%Y-%m") = ? order by fecha desc',[$fc]);
                //return response()->json($datos);
            return view('complebit.report')->with(['bitacoras' => $datos, 'agencias' => $ag]);
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
        $parametro = DB::select('select * from parametros');
        return view('bitacora.create')->with(['parametro'=>$parametro]);
        
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
            'encargadoop' => 'required|string|max:100',
            'Temperatura' => 'required|string|max:50',
            'Humedad' => 'required|string|max:50',
            'Filtracion' => 'required|string|max:50',
            'ups' => 'required|string|max:50',
            'Generador' => 'required|string|max:50',
            'Observaciones' => 'required|string|max:100',
            'fecha' => 'required|date|max:50',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosBitacora = request()->all();
        $datosBitacora = request()->except('_token');
        Bitacora::insert($datosBitacora);


        //Correo de Alerta

        $temperatura = $request->get('Temperatura');
        $humedad = $request->get('Humedad');
        $filtracion = $request->get('Filtracion');
        $ups = $request->get('ups');
        $gen = $request->get('Generador');

        $parametro = DB::select('select * from parametros');

        foreach ($parametro as $pa){
            $temmax =  $pa->temmax;
            $hummax =  $pa->hummax;
       }
   
        if ($temperatura >= $temmax or $humedad >= $hummax or $filtracion != 'No' or $ups != 'En linea' or $gen != 'En linea' ) {

            $datosBitacora = request()->except('_token','name');
            Alerta::insert($datosBitacora);
            $adm = DB::select('select email from users where acceso = "yes"');
            $correo = new EmailAlertParameter;
            Mail::to($adm)->send($correo);
            //Notification::route('mail', $adm)->notify(new NotiBit('CPD'));
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
