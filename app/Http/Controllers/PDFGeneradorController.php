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
        $rfn = DB::select('select agencia,COUNT(agencia) as total,  CONCAT(ROUND((COUNT(agencia)/?*100),0),"%") as porcentaje from bitacoras where date_format(Fecha, "%Y-%m") = ? group by agencia order by total desc', [$dias,$mes]);
        


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
            $pdf = PDF::loadView('complebit.PDFReportGenerador', compact('all', 'rfn','mesDesc'));
            //return $pdf->Stream('Reporte.pdf');
            return $pdf->setPaper('carta', 'landscape')->Stream('Reporte_General_Generadores.pdf');
        } else {
            return redirect('reportesge')->with('mensaje', 'No se Encontraron Registros');
        }
    }
}
