<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
//use PDF;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{
    public function PDF()
    {
        $pdf = PDF::loadView('prueba');
        return $pdf->Stream('prueba.pdf');
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

        $bitacoras = DB::select('select * from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);


        //return response()->json($bitacoras);
        //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'

        $pdf = PDF::loadView('bitacora.PDFReport', compact('bitacoras'));
        //return $pdf->Stream('Reporte.pdf');
        return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');


        //$collection = collect(['name' => 'taylor', 'framework' => 'laravel']);

        //$value = $collection->get('name');
    }

    public function PDFBitacora2(Request $request)
    {
        $agencia = $request->get('agencia');
        $mes = $request->get('mes');

        $bitacoras = DB::select('select * from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);
        
        $pdf = PDF::loadView('bitacora.PDFReport', compact('bitacoras'));
        return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
    }
}
