<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         $useradmin=User::create([
            'user'=> 'rcondori',
            'nombre'=> 'Rodrigo Condori Mamani',
            'agencia'=> 'La Paz',
            'email'=>'rodrigo.condori@bdp.com.bo',
            'descripcion'=>'ENCARGADO OPERATIVO ADMINISTRATIVO',
            'password'=> Hash::make('rcondori'),
            'acceso'=>'no',
       
        ]);
 
    
        //php artisan db:seed --class=DatosSeeder

    }
}
