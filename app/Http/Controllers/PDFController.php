<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\facade as PDF;
// alternativa  use PDF;
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
        $name = Auth::user()->name;

        $mes1 = $request->get('mes1'); //literal
        $mes = $request->get('mes'); //numeral

        $ms = Date("Y-$mes");

        setlocale(LC_TIME, "spanish");
        $fe = $ms;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesini = strftime("%B de %Y", strtotime($newDate));


        $resumen = DB::select('select  ROUND(AVG(temperatura),2) as pTemperatura, ROUND(AVG(Humedad),2) as pHumedad from bitacoras where agencia = ? GROUP BY agencia', [$agencia]);

        $bitacoras = DB::select('select *, fecha from bitacoras where agencia = ? and MONTH(fecha) = ? and YEAR(fecha) = YEAR(NOW()) ', [$agencia, $mes]);
        $datosu = DB::select('select name,agencia from users where name = ? ', [$name]);

        $generador = DB::select('select * from generadors where agencia = ? and MONTH(fecha) = ? and YEAR(fecha) = YEAR(NOW())', [$agencia, $mes]);
        //return $generador;

        $vr = 0;

        $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'datosu', 'vr', 'mesini', 'resumen', 'generador'));
        //return $pdf->Stream('Reporte.pdf');

        return $pdf->setPaper('carta', 'landscape')->stream($mes1 . '_Reporte.pdf');
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
        $datosu = DB::select('select  name,agencia from users where 1=1 and agencia = ? order by id desc limit 1 ', [$agencia]);


        $bitacoras = DB::select('select *, fecha from bitacoras where agencia = ? and date_format(fecha, "%Y-%m") = ? order by id desc', [$agencia, $mes]);


        $generador = DB::select('select * from generadors where agencia = ? and date_format(fecha, "%Y-%m") = ?', [$agencia, $mes]);

        $vr = 0;
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu', 'mesini', 'vr', 'generador'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje', 'no se encontraron registros');
        }
    }

    public function PDFBitacora2(Request $request)
    // REPORTES HECHO CON INTERVALOS DE fechaS - LADO ADMINISTRADOR Y CLIENTE
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
        $datosu = DB::select('select name,agencia from users where 1=1 and agencia = ? order by id desc limit 1 ', [$agencia]);

        $bitacoras = DB::select('select *,fecha from bitacoras where agencia = ? and fecha BETWEEN ? AND ? order by id asc', [$agencia, $ini, $fin]);

        $generador = DB::select('select * from generadors where agencia = ? and fecha BETWEEN ? AND ? order by id asc', [$agencia, $ini, $fin]);
        $vr = 1;
        //return response()->json($bitacoras);
        if ($bitacoras != null) {

            $pdf = PDF::loadView('complebit.PDFReport', compact('bitacoras', 'resumen', 'datosu', 'mesini', 'mesfin', 'vr', 'generador'));
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte.pdf');
        } else {
            return redirect('reportes')->with('mensaje22', 'no se encontraron registros');
        }
    }


    public function PDFAll(Request $request)
    // REPORTE GENERAL DE TODAS LA AGENCIAS MENSUALMENTE
    {
        $mes = $request->get('mes');

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));
        //devuelve: Noviembre de 2021



        //todos los registros por fechas
        //$bitall = DB::select('select *, date_format(fecha, "%d-%m-%Y") as fecha from bitacoras where fecha BETWEEN ? AND ? order by agencia,fecha desc', [$ini, $fin]);

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
        $rfn = DB::select('select agencia,COUNT(agencia) as total,  CONCAT(ROUND((COUNT(agencia)/?*100),0),"%") as porcentaje from bitacoras where date_format(fecha, "%Y-%m") = ? group by agencia order by total desc', [$dias, $mes]);



        //mostrar todos los registros por agencias 
        $prueba = DB::select('select distinct agencia from bitacoras where 1 = 1');

        $datos = Arr::pluck($prueba, 'agencia');


        for ($i = 0; $i < count($datos); $i++) {
            //echo $datos[$i];
            $a = $datos[$i];
            //$all[] = $con = DB::select('select agencia,encargadoop,temperatura,humedad,filtracion,ups,generador,observaciones, date_format(fecha, "%d-%m-%Y") as fecha from bitacoras where agencia = ? and date_format(fecha, "%Y-%m") = ?   order by fecha desc', [$a, $mes]);

            //consulta para sacar los names de cada encargado ok para DESPUES
            //$all[] = $con = DB::select('select b.*, u.name from bitacoras as b INNER JOIN users as u ON b.agencia = u.agencia where b.agencia = ? and date_format(fecha, "%Y-%m") = ? order by fecha asc', [$a,$mes]);
            $all[] = $con = DB::select('select b.*,(select distinct name from users where 1=1 and agencia = ? order by id desc limit 1) as name from bitacoras as b INNER JOIN users as u ON b.agencia = u.agencia where b.agencia = ? and date_format(fecha, "%Y-%m") = ? order by fecha asc', [$a, $a, $mes]);


            //return response()->json($all);

        }
        $generador = DB::select('select * from generadors where date_format(fecha, "%Y-%m") = ? order by fecha desc', [$mes]);

        //return response()->json($generador);


        if (!empty($all[0])) {
            //SELECT * FROM tu_tabla WHERE date_format(fecha, '%m-%Y') = '12-2005'
            //$pdf = PDF::loadView('complebit.PDFReportGeneralBit', compact('all', 'rfn', 'mesDesc', 'generador'));
            //return $pdf->Stream('Reporte.pdf');
            //return $pdf->setPaper('carta', 'landscape')->stream('Reporte_General_bitacoras.pdf');

            return view('complebit.ReportGeneralBit')->with(['all' => $all, 'rfn' => $rfn, 'mesDesc' => $mesDesc, 'generador' => $generador]);
        } else {
            return redirect('reportes')->with('mensajeall', 'No se Encontraron Registros');
        }
    }

    public function PDFAlertas(Request $request)
    {

        $agencia = $request->get('agencia');



        $bitacoras = DB::select('select * from alertas where agencia = ? order by fecha desc', [$agencia]);
        $datosu = DB::select('select name,agencia from bitacoras where agencia = ? order by fecha desc limit 1', [$agencia]);

        //return response()->json($alerta);
        $pdf = PDF::loadView('complebit.PDFAlertas', compact('bitacoras', 'datosu'));
        return $pdf->setPaper('carta', 'landscape')->stream('Resumen.pdf');
    }


    public function PDFindexb(Request $request)
    {

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


        //calcula el mes actual
        $mes = date("Y-m");

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));




        $rfn = DB::select('select agencia,COUNT(agencia) as total,  CONCAT(ROUND((COUNT(agencia)/?*100),0),"%") as porcentaje from bitacoras where date_format(fecha, "%Y-%m") = ? group by agencia order by total desc', [$dias, $mes]);

        $pdf = PDF::loadView('complebit.PDFindexb', compact('rfn', 'mesDesc'));
        return $pdf->setPaper('carta')->stream('Resumen_bitacora.pdf');
    }

    public function PDFindexg(Request $request)
    {
        //calcula el mes actual
        $mes = date("Y-m");

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));

        $generador = DB::select('select distinct agencia, fecha, observaciones, agencia from generadors where MONTH(fecha) = MONTH(date(NOW())) and  1 = 1 order by fecha desc');




        $pdf = PDF::loadView('complebit.PDFindexg', compact('generador', 'mesDesc'));
        return $pdf->setPaper('carta')->stream('Resumen_generador.pdf');
    }

    public function ResumenCG(Request $request)
    {

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

        //Obtener mes 
        $mes = $request->get('mes');

        setlocale(LC_TIME, "spanish");
        $fe = $mes;
        $fe = str_replace("/", "-", $fe);
        $newDate = date("d-m-Y", strtotime($fe));
        $mesDesc = strftime("%B de %Y", strtotime($newDate));




        $rfn = DB::select('select agencia,COUNT(agencia) as total,  CONCAT(ROUND((COUNT(agencia)/?*100),0),"%") as porcentaje from bitacoras where date_format(fecha, "%Y-%m") = ? group by agencia order by total desc', [$dias, $mes]);
        $generador = DB::select('select distinct agencia, fecha, observaciones, agencia from generadors where date_format(fecha, "%Y-%m") = ? and  1 = 1 order by fecha desc',[$mes]);


        $pdf = PDF::loadView('complebit.ResumenCG', compact('generador', 'mesDesc','rfn'));
        return $pdf->setPaper('carta')->stream('Resumen_cpd_generador.pdf');
       
    }
}
