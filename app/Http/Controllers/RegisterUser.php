<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterUser extends Controller
{
    //

    public function index(){
        $datos['users'] = DB::select('select * from users where acceso = "yes"');
        return view('auth.register',$datos);
    }
}
