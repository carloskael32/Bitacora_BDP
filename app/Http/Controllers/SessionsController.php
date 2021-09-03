<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller

{
    //

    public function index()
    {
        return view('user.login');
    }

    public function store()
    {

        if (Auth::attempt(request(['name', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'el nombre o contraseña son incorrectos',

            ]);
        }
        if (Auth::user()->acceso == "yes") {
            return redirect()->to('/');
        }else{
            return redirect()->to('/bitacora/create');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->to('/login');
    }
}
