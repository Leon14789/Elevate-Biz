<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class CreateUserSeeder extends Seeder
{
   
    public function run(): void
    {
        /*  
            Valor setado para criacao de 5 usuarios no banco aleatoriamente 
        */ 
       
       // User::factory(1)->create();

        /* 
            Criando 5 Usuarios sem sereem aleatorios
        */
        
        User::create([
            
            'name' => 'Leonardo Ortiz Alves',
            'email' => 'leonardoortizalves@gmail.com',
            'email_verified_at' => now(),
            'password' => '123456789', 
            'remember_token' => Str::random(10),
            'start_date' => '2000-01-01',
            'end_date' => now(),
            'is_admin' => random_int(0, 1),
            
        ]);

        User::create([
            
            'name' => 'Murillo Jesus',
            'email' => 'murillojesus@gmail.com',
            'email_verified_at' => now(),
            'password' => '123456789', 
            'remember_token' => Str::random(10),
            'start_date' => '2000-01-01',
            'end_date' => now(),
            'is_admin' => random_int(0, 1),
            
        ]);

        User::create([
            
            'name' => 'Daniel Almeida Alves',
            'email' => 'danielalmeidaalves@gmail.com',
            'email_verified_at' => now(),
            'password' => '123456789', 
            'remember_token' => Str::random(10),
            'start_date' => '2000-01-01',
            'end_date' => now(),
            'is_admin' => random_int(0, 1),
            
        ]);

      

        
    }
}
