<?php

namespace App\Http\Controllers\eno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EnoController extends Controller
{
    public function index()
    {
        $datos['users'] = DB::select('select * from users where acceso = "no"');
        return view('eno.index', $datos);
    }

    public function create()
    {
        return view('eno.create');
    }

    public function store(Request $request)
    {
        $campos = [
            'agencia'=> 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'confirmed' => 'las contraseñas no coinciden',
            'min:8'=>'la contraseña tiene que tener al menos 8 caracteres',

        ];
        $this->validate($request, $campos, $mensaje);


        
        User::insert([
            'name' => request('name'),
            'agencia' => request('agencia'),
            'acceso' => 'no',
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return redirect()->to('/eno');
    }

    public function edit(Request $request, $id)
    {


        $user = User::findOrFail($id);
        return view('eno.edit', compact('user'));
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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
      
           

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            'confirmed' => 'las contraseñas no coinciden',
            'min'=>'la contraseña tiene que tener al menos 8 caracteres',
        ];
        $this->validate($request, $campos, $mensaje);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('eno')->with('mensaje', 'Registro Modificado..');
    }

    public function destroy($id)
    {

        User::destroy($id);
        return redirect('eno')->with('mensaje', 'Registro Borrado..');
    }
}
