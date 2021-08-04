<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Barryvdh\DomPDF\facade as PDF;
use PDF;
use App\Bitacora;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{
    public function PDF()
    {
        $pdf = PDF::loadView('prueba');
        return $pdf->Stream('prueba.pdf');
    }

    public function PDFBitacora(Request $agencia)
    {
        //$bitacoras = Bitacora::all();
        //$agencia = "la paz";
        $bitacoras = DB::select('select * from bitacoras where agencia = ? order by id desc',[$agencia]);
        $pdf = PDF::loadView('Bitacora.PDFReport',compact('bitacoras'));
        //return $pdf->Stream('Reporte.pdf');
        return $pdf->setPaper('a4','landscape')->Stream('Reporte.pdf');

        //$bitacoras = DB::select('select * from users where active = ?', [1])
    }


}
