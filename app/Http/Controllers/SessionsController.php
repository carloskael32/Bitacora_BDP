<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller

{
    //

    public function index()
    {
        return view('login.login');
    }

    public function store()
    {

         //error_reporting(0);
         $domain = 'bdp.com.bo';
         $ldaprdn  = implode(request(['user'])); // ldap rdn or dn
         $ldappass = implode(request(['password']));  // associated password
 
 
       
         $ldapconn = ldap_connect('10.1.6.4') or die("Could not connect to LDAP server.");
         ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
         ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
         if ($ldapconn) {
        
             $ldapbind = ldap_bind($ldapconn, $ldaprdn . '@' . $domain, $ldappass);
 
 
             if ($ldapbind) {
 
                 
                 $result = ldap_search($ldapconn, "dc=bdp, dc=com, dc=bo", "(samaccountname=$ldaprdn)");
                 $entries = ldap_get_entries($ldapconn, $result);
 
                 $userDN6 = $entries[0]["distinguishedname"][0];
                 $separador = ",";
                 $separada = explode($separador, $userDN6);
                 $n = $separada[1];
                 $separador2 = " ";
                 $age = explode($separador2, $n);
                 $dldap = array(
                     $userDN3 = $entries[0]["displayname"][0],
                     $userDN4 = $entries[0]["samaccountname"][0],
                     $userDN5 = $entries[0]["mail"][0],
                     $userDN = $entries[0]["description"][0],
                     $age[1],
                 );
                 $con =  DB::select('select user from users where user = ?', [$dldap[1]]);
                 if ($con == null) {
                     if($dldap[3] == 'GERENCIA DE SISTEMAS Y TECNOLOGIA DE LA INFORMACION'){
                         DB::insert('insert into users (nombre, user, email, descripcion, agencia, acceso, password) values (?,?,?,?,?,?,?)', [$dldap[0], $dldap[1], $dldap[2], $dldap[3], $age[1], 'yes', Hash::make($dldap[1])]);
                     }else{
                         DB::insert('insert into users (nombre, user, email, descripcion, agencia, acceso, password) values (?,?,?,?,?,?,?)', [$dldap[0], $dldap[1], $dldap[2], $dldap[3], $age[1], 'no', Hash::make($dldap[1])]);
                     }                    
                 }
             } else {
                 echo "error de datos de usuario";
                 return back()->withErrors([
                     'message' => 'el nombre o contraseña son incorrectos',
                 ]);
             }
             
         } else {
             echo "Error de servidor";
         }
         if (Auth::attempt(['user' => $ldaprdn, 'password' => $dldap[1]])) {
             ldap_close($ldapconn);
             if(Auth::user()->acceso == 'yes'){
                return redirect()->to('/home');
             }else{
                return redirect()->to('/bitacora/create');
             }
             
         }else{
             return back()->withErrors([
                 'message' => 'error en al Autenticar',
             ]);
         }
         //return view('home');
         //return view('home')->with(['dldap' => $dldap]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->to('/login');
        
    }
}
