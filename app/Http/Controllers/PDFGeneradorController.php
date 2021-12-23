<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use DateTime;

class PDFGeneradorController extends Controller
{
    public function PDFALLGE(Request $request)
    // REPORTE GENERAL DE TODAS LA AGENCIAS CON INTERVALO
    {
        $mes = $request->get('mes');

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));
        //devuelve: diciembre de 2021

        // CANTIDAD Y PORCENTAJE DE AGENCIAS EN GENERAL MENSUAL
        $rfn = DB::select('select agencia,COUNT(agencia) as total from generadors where date_format(fecha, "%Y-%m") = ? group by agencia order by total desc', [$mes]);
        
   

        //return $rfn;
        //MOSTRAR LOS REGISTROS  DEL MES ACTUAL 
        $all = DB::select('select * from generadors where date_format(fecha, "%Y-%m") = ? order by agencia desc',[$mes]);
        $vr = 0;
        //return $all;
        if (!empty($all[0])) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
            $pdf = PDF::loadView('complebit.PDFReportGenerador', compact('all', 'rfn', 'mesDesc','vr'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte_General_Generadores.pdf');
        } else {
            return redirect('reportesge')->with('mensaje', 'No se Encontraron Registros');
        }
    }
    public function PDFINTERVALOGE(Request $request)
    // REPORTES HECHO CON INTERVALOS DE FECHAS - LADO ADMINISTRADOR Y CLIENTE
    {
        $agencia = $request->get('agencia');
        $ini = $request->get('date1');

        setlocale(LC_TIME, "spanish");
        $fe = $ini;
        $fe = str_replace("/", "-", $fe);
        $newDate1 = date("d-m-Y", strtotime($fe));
        $mesini = strftime("%d de %B de %Y", strtotime($newDate1));


        $fin = $request->get('date2');

        setlocale(LC_TIME, "spanish");
        $fe = $fin;
        $fe = str_replace("/", "-", $fe);
        $newDate2 = date("d-m-Y", strtotime($fe));
        $mesfin = strftime("%d de %B de %Y", strtotime($newDate2));


        /* $resumen = DB::select('select  CONCAT(ROUND(AVG(temperatura))," %") as pTemperatura, CONCAT(ROUND(AVG(Humedad))," %") as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]); */
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);

        $all = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from generadors where agencia = ? and Fecha BETWEEN ? AND ? order by id asc', [$agencia, $ini, $fin]);
        $vr = 1;
        //return response()->json($bitacoras);
        if ($all != null) {
            $pdf = PDF::loadView('complebit.PDFReportGenerador', compact('all','datosu', 'mesini', 'mesfin', 'vr'));
            return $pdf->setPaper('carta', 'landscape')->Stream($agencia. '_.pdf');
        } else {
            return redirect('reportesge')->with('mensaje2', 'No se Encontraron Registros');
        }

    }
}

