<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hour;
class CreateHoursWorkeedSeeder extends Seeder
{
    
    public function run(): void
    {
        // Valor setado para criacao de 5 jornadas de trabalho no banco 
        
        Hour::factory(1)->create();
    }
}
