<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
use Illuminate\Support\Facades\Auth;
//use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\For_;

class PDFController extends Controller
{

    /*
    public function PDF()
    {
        $pdf = PDF::loadView('prueba');
        return $pdf->Stream('prueba.pdf');
    }
    */


    public function PDFBit(Request $request)
    //REPORTE MENSUALMENTE LADO DEL USUARIO
    {

        $agencia = Auth::user()->agencia;
        $mes1 = $request->get('mes1');
        $mes = $request->get('mes');
        //return response()->json($mes);
        //return response()->json($mes); where year(Fecha) = YEAR(NOW())

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and MONTH(Fecha) = ? and YEAR(Fecha) = YEAR(NOW()) ', [$agencia, $mes]);

        //return response()->json($bitacoras);
        //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
        $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras'));
        //return $pdf->Stream('Reporte.pdf');

        return $pdf->setPaper('carta', 'landscape')->download($mes1 . '_Reporte.pdf');
    }

    public function PDFBitacora(Request $request)
    //REPORTE MENSUALMENTE - LADO ADMINISTRADOR 
    {
        //$bitacoras = Bitacora::all();
        //$agencia = "la paz";
        //$request = request()->except('_token');
        //$res =  implode($request);

        $agencia = $request->get('agencia');
        $mes = $request->get('mes');

        //return response()->json($mes);
        $resumen = DB::select('select  AVG(temperatura) as pTemperatura, AVG(Humedad) as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);
        //return response()->json($agencia);

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);

        if ($bitacoras != null) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje', 'No se Encontraron Registros');
        }
    }

    public function PDFBitacora2(Request $request)
    // REPORTES HECHO CON INTERVALOS DE FECHAS - LADO ADMINISTRADOR Y USUARIO
    {
        $agencia = $request->get('agencia');
        $ini = $request->get('date1');
        $fin = $request->get('date2');


        $resumen = DB::select('select  AVG(temperatura) as pTemperatura, AVG(Humedad) as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and Fecha BETWEEN ? AND ? order by id asc', [$agencia, $ini, $fin]);

        //return response()->json($bitacoras);
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu'));
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje2', 'No se Encontraron Registros');
        }
    }


    public function PDFAll(Request $request)
    // REPORTE GENERAL DE TODAS LA AGENCIAS CON INTERVALO
    {
        $ini = $request->get('date1');
        $fin = $request->get('date2');

        //todos los registros
        $bitall = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where Fecha BETWEEN ? AND ? order by agencia,fecha desc', [$ini, $fin]);

        //contar todos los registros
        $bitto = DB::select('select agencia, COUNT(agencia) as total from bitacoras group by agencia order by total desc');


        //mostrar todos los registros por agencias 
        $prueba = DB::select('select distinct agencia from bitacoras where 1 = 1');

        $datos = Arr::pluck($prueba, 'agencia');


        for ($i = 0; $i < count($datos); $i++) {
            //echo $datos[$i];
            $a = $datos[$i];
            $all[] = $con = DB::select('select * from bitacoras where agencia = ?', [$a]);
             //consulta para sacar los nombres de cada encargado ok
             //$all[] = $con = DB::select('select b.agencia, u.nombre from bitacoras as b INNER JOIN users as u ON b.agencia = u.agencia where b.agencia = ?', [$a]);
        }


        return response()->json($all);




        if ($bitall != null) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
            $pdf = PDF::loadView('complebit.PDFReportGeneralBit', compact('bitall', 'bitto'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje', 'No se Encontraron Registros');
        }
    }

    public function PDFAlertas(Request $request)
    {

        $agencia = $request->get('agencia');
        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and (Temperatura > 40 or Humedad > 85) order by fecha desc', [$agencia]);
        //return response()->json($alerta);
        $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras'));
        return $pdf->setPaper('carta', 'landscape')->Stream('Resumen.pdf');
    }
}
