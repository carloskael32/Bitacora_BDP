<?php

namespace Database\Seeders;

use App\Models\Bitacora;
use App\Models\parametro;
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
      /*    $useradmin=User::create([
            'user'=> 'rcondori',
            'name'=> 'Rodrigo Condori Mamani',
            'agencia'=> 'La Paz',
            'email'=>'rodrigo.condori@bdp.com.bo',
            'descripcion'=>'ENCARGADO OPERATIVO ADMINISTRATIVO',
            'password'=> Hash::make('rcondori'),
            'acceso'=>'no',
       
        ]); */

      /*   $bit=Bitacora::create([
            'agencia'=> 'La Paz',
            'encargadoOP'=>'rcondori',
            'temperatura'=>'16.9',
            'humedad'=>'47',
            'filtracion'=>'No',
            'UPS'=>'Si',
            'generador'=>'Si',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-11-29',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Aiquile',
            'encargadoOP'=>'agracia',
            'temperatura'=>'21.5',
            'humedad'=>'55',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-12-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Monteagudo',
            'encargadoOP'=>'jbarrios',
            'temperatura'=>'17',
            'humedad'=>'75',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-11-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'lespinoza',
            'temperatura'=>'19.80',
            'humedad'=>'10',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-10-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'lespinoza',
            'temperatura'=>'19.80',
            'humedad'=>'10',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-10-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'lespinoza',
            'temperatura'=>'19.80',
            'humedad'=>'10',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-10-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Mairana',
            'encargadoOP'=>'pañaguaya',
            'temperatura'=>'23.8',
            'humedad'=>'75',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-09-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Luribay',
            'encargadoOP'=>'fgutierrez',
            'temperatura'=>'22.6',
            'humedad'=>'66',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-08-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'San Julian',
            'encargadoOP'=>'ribarra',
            'temperatura'=>'24',
            'humedad'=>'55',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-07-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'El alto',
            'encargadoOP'=>'acondori',
            'temperatura'=>'21.6',
            'humedad'=>'42',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-06-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'San Buenaventura',
            'encargadoOP'=>'mconde',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2021-05-02',
        ]); */
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-01',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-02',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-03',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-04',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-05',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-07',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-08',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-09',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-10',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-11',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-12',
        ]);


        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-14',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-15',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-16',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-17',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-18',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-19',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-21',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-22',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-23',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-24',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-25',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-26',
        ]);
        $bit=Bitacora::create([
            'agencia'=> 'Yacuiba',
            'encargadoOP'=>'cmamani',
            'temperatura'=>'18.5',
            'humedad'=>'35',
            'filtracion'=>'No',
            'UPS'=>'En linea',
            'generador'=>'En linea',
            'observaciones'=>'Sin Observaciones',
            'Fecha'=>'2022-02-28',
        ]);

        $prm=parametro::create([
            'temmin'=> '0',
            'temmax'=> '40',
            'hummin'=> '10',
            'hummax'=> '85',
        ]); 
 
    
        //php artisan db:seed --class=DatosSeeder

    }
}
