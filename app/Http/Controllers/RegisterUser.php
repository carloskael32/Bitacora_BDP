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
            'name'=> 'required',
            'user' => 'required',
            'email' => 'required',          
            'agencia'=> 'required',
            

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);


        
        User::insert([
            'name' => request('name'),
            'user'=> request('user'),  
            'email' => request('email'),          
            'descripcion' => request('descripcion'),
            'agencia'=> request('agencia'),
            'acceso' => 'yes',            
            'password' => Hash::make(request('user')),
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
/* 
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

        return redirect('user')->with('mensaje', 'Registro Modificado..'); */
    }

    public function destroy($id)
    {

        User::destroy($id);
        return redirect('user')->with('mensaje', 'Registro Borrado..');
    }
}
