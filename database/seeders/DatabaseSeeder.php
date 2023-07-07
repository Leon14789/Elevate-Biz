<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\CreateUserSeeder;
use Database\Seeders\CreateHoursWorkeedSeeder;


class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
        // Uso do metodo para gerar usuarios e carga horaria 
       $this->call([
            CreateUserSeeder::class,
            CreateHoursWorkeedSeeder::class
       ]);


        
    }
}
