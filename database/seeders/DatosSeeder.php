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
            'name'=> 'admin',
            'agencia'=> '',
            'email'=>'admin@gmail.com',
            'password'=> Hash::make('admin'),
            'acceso'=>'yes',
       
        ]);

        $useradmin=User::create([
            'name'=> 'cmamani',
            'agencia'=> 'La Paz',
            'email'=>'carlos.mamani@bdp.com.bo',
            'password'=> Hash::make('cmamani'),
            'acceso'=>'no',
         

        ]);
    }
}
