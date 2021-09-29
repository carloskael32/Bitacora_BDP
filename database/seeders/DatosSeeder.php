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

        $useradmin=User::create([
            'name'=> 'rmachicado',
            'agencia'=> 'Caranavi',
            'email'=>'ricardo.machicado@bdp.com.bo',
            'password'=> Hash::make('rmachicado'),
            'acceso'=>'no',
        ]);
        $useradmin=User::create([
            'name'=> 'lmamani',
            'agencia'=> 'Chulumani',
            'email'=>'lizardo.mamani@bdp.com.bo
            ',
            'password'=> Hash::make('lmamani'),
            'acceso'=>'no',
        ]);
        $useradmin=User::create([
            'name'=> 'mdavila',
            'agencia'=> 'Palos Blancos',
            'email'=>'merced.davila@bdp.com.bo
            ',
            'password'=> Hash::make('mdavila'),
            'acceso'=>'no',
        ]);
        $useradmin=User::create([
            'name'=> 'mconde',
            'agencia'=> 'Buenaventura',
            'email'=>'marleny.conde@bdp.com.bo
            ',
            'password'=> Hash::make('mconde'),
            'acceso'=>'no',
        ]);
        $useradmin=User::create([
            'name'=> 'mlaura',
            'agencia'=> 'Oruro',
            'email'=>'mirian.laura@bdp.com.bo
            ',
            'password'=> Hash::make('mlaura'),
            'acceso'=>'no',
        ]);




        //php artisan db:seed --class=DatosSeeder

    }
}
