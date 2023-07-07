<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUserSeeder extends Seeder
{
   
    public function run(): void
    {
        /* Valor setado para criacao de 5 usuarios no banco
            * lembre-se de mudar o valor dele no arquivo hourFavtory para o campo user_id (mude contador do For)
        */ 
       
        User::factory(1)->create();
    }
}
