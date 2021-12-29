<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;

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

        $mes1 = $request->get('mes1'); //literal
        $mes = $request->get('mes'); //numeral

        $ms = Date("Y-$mes");

        setlocale(LC_TIME, "spanish");
        $fe = $ms;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesini = strftime("%B de %Y", strtotime($newDate));


        $resumen = DB::select('select  ROUND(AVG(temperatura),2) as pTemperatura, ROUND(AVG(Humedad),2) as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and MONTH(Fecha) = ? and YEAR(Fecha) = YEAR(NOW()) ', [$agencia, $mes]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);

        $vr = 0;

        $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'datosu', 'vr', 'mesini', 'resumen'));
        //return $pdf->Stream('Reporte.pdf');

        return $pdf->setPaper('carta', 'landscape')->download($mes1 . '_Reporte.pdf');
    }

    public function PDFBitacora(Request $request)
    //REPORTE MENSUALMENTE - LADO ADMINISTRADOR 
    {

        $agencia = $request->get('agencia');
        $mes = $request->get('mes');

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesini = strftime("%B de %Y", strtotime($newDate));


        $resumen = DB::select('select  ROUND(AVG(temperatura),2) as pTemperatura, ROUND(AVG(Humedad),2) as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);


        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);
        $vr = 0;
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu', 'mesini', 'vr'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje', 'No se Encontraron Registros');
        }
    }

    public function PDFBitacora2(Request $request)
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


        $resumen = DB::select('select  CONCAT(ROUND(AVG(temperatura))," %") as pTemperatura, CONCAT(ROUND(AVG(Humedad))," %") as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);

        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and Fecha BETWEEN ? AND ? order by id asc', [$agencia, $ini, $fin]);
        $vr = 1;
        //return response()->json($bitacoras);
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu', 'mesini', 'mesfin', 'vr'));
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje2', 'No se Encontraron Registros');
        }
    }


    public function PDFAll(Request $request)
    // REPORTE GENERAL DE TODAS LA AGENCIAS CON INTERVALO
    {
        $mes = $request->get('mes');

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));
        //devuelve: Noviembre de 2021



        //todos los registros por fechas
        //$bitall = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where Fecha BETWEEN ? AND ? order by agencia,fecha desc', [$ini, $fin]);

        //contar todos los registros
        // calcula los dias de cada mes sin los domingos
        $starDate = new DateTime();
        $starDate->modify('first day of this month');

        $ct = 0;
        $cd = 0;
        $endDate = new DateTime();
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
        $rfn = DB::select('select agencia,COUNT(agencia) as total,  CONCAT(ROUND((COUNT(agencia)/?*100),0),"%") as porcentaje from bitacoras where date_format(Fecha, "%Y-%m") = ? group by agencia order by total desc', [$dias, $mes]);



        //mostrar todos los registros por agencias 
        $prueba = DB::select('select distinct agencia from bitacoras where 1 = 1');

        $datos = Arr::pluck($prueba, 'agencia');


        for ($i = 0; $i < count($datos); $i++) {
            //echo $datos[$i];
            $a = $datos[$i];
            $all[] = $con = DB::select('select agencia,encargadoOP,temperatura,humedad,filtracion,UPS,generador,observaciones, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and date_format(Fecha, "%Y-%m") = ?   order by Fecha desc', [$a, $mes]);

            //consulta para sacar los nombres de cada encargado ok para DESPUES
            //$all[] = $con = DB::select('select b.*, u.nombre from bitacoras as b INNER JOIN users as u ON b.agencia = u.agencia where b.agencia = ?', [$a]);
        }



        if (!empty($all[0])) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
            $pdf = PDF::loadView('complebit.PDFReportGeneralBit', compact('all', 'rfn', 'mesDesc'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte_General_bitacoras.pdf');
        } else {
            return redirect('reportes')->with('mensajeall', 'No se Encontraron Registros');
        }
    }

    public function PDFAlertas(Request $request)
    {

        $agencia = $request->get('agencia');
        $bitacoras = DB::select('select *, date_format(Fecha, "%d-%m-%Y") as Fecha from bitacoras where agencia = ? and (Temperatura > 40 or Humedad > 85) order by fecha desc', [$agencia]);
        $datosu = DB::select('select nombre,agencia from users where agencia = ?', [$agencia]);
        //return response()->json($alerta);
        $pdf = PDF::loadView('complebit.PDFAlertas', compact('bitacoras', 'datosu'));
        return $pdf->setPaper('carta', 'landscape')->Stream('Resumen.pdf');
    }
}
