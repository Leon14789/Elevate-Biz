<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hour;
class CreateHoursWorkeedSeeder extends Seeder
{
    
    public function run(): void
    {
        /* Valor setado para criacao de 5 jornadas de trabalho no banco
            de forma aleatoria
        */
     //   Hour::factory(1)->create();

        /*
            Comando para criar 5 usuarios de sem ser aleatorios 
            Lembre-se que cada usuario pode bater o ponto uma vez ao dia 
            entao se quiser uma grande quantidade de dados recomando que use a fectory
        */

        Hour::create([
            'user_id' => '1',
            'work_date' => date('Y-m-d'),
            'time1' => date('Y-m-d 08:00:00'),
            'time2' =>  date('Y-m-d 12:00:00'),
            'time3' =>  date('Y-m-d 13:00:00'),
            'time4' =>  date('Y-m-d 17:00:00'),
            'worked_time' => '0'
        ]);


        Hour::create([
            'user_id' => '2',
            'work_date' => date('Y-m-d'),
            'time1' => date('Y-m-d 08:00:00'),
            'time2' =>  date('Y-m-d 12:00:00'),
            'time3' =>  date('Y-m-d 13:00:00'),
            'time4' =>  date('Y-m-d 18:00:00'),
            'worked_time' => '0'
        ]);

        Hour::create([
            'user_id' => '3',
            'work_date' => date('Y-m-d'),
            'time1' => date('Y-m-d 08:30:00'),
            'time2' =>  date('Y-m-d 12:00:00'),
            'time3' =>  date('Y-m-d 13:00:00'),
            'time4' =>  date('Y-m-d 18:00:00'),
            'worked_time' => '0'
        ]);


    }
}
