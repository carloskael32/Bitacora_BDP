<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Controller
{
    //

    public function index()
    {
        $datos['users'] = DB::select('select * from users where acceso = "yes"');
        return view('user.index', $datos);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $campos = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'confirmed' => 'las contraseñas no coinciden'

        ];
        $this->validate($request, $campos, $mensaje);




        //$user = User::create(request(['name', 'email', Hash::make('password')]));
        User::insert([
            'name' => request('name'),
            'agencia' => '',
            'acceso' => 'yes',
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return redirect()->to('/user');
    }

    public function edit(Request $request, $id)
    {


        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    /*
    public function update(Request $request, $id)
    {
        User::where('id', '=', $id)->update($DatosUser);
        $bitacora = User::findOrFail($id);
        //return response()->json($datosBitacora);
        return redirect('user')->with('mensaje', 'Registro Modificado..');
    }
*/
    public function update(Request $request, $id)
    {

        $campos = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'confirmed',

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'confirmed' => 'las contraseñas no coinciden'


        ];
        $this->validate($request, $campos, $mensaje);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('user')->with('mensaje', 'Registro Modificado..');
    }

    public function destroy($id)
    {

        User::destroy($id);
        return redirect('user')->with('mensaje', 'Registro Borrado..');
    }
}
