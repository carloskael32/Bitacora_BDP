<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
use Illuminate\Support\Facades\Auth;
//use PDF;
use Illuminate\Support\Facades\DB;


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
    {
        //$bitacoras = Bitacora::all();
        //$agencia = "la paz";
        //$request = request()->except('_token');
        //$res =  implode($request);

        $agencia = $request->get('agencia');
        $mes = $request->get('mes');

        //return response()->json($mes);

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);

        if ($bitacoras != null) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje', 'No se Encontraron Registros');
        }
    }

    public function PDFBitacora2(Request $request)
    {
        $agencia = $request->get('agencia');
        $ini = $request->get('date1');
        $fin = $request->get('date2');



        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and Fecha BETWEEN ? AND ? order by id desc', [$agencia, $ini, $fin]);

        //return response()->json($bitacoras);
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras'));
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje2', 'No se Encontraron Registros');
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
