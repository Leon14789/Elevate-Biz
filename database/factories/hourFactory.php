<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hour;
use Database\Seeders\CreateUserSeeder;
class HourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $years = random_int(2000, 2023);
            $months = random_int(1, 12);
            $days =  random_int(10, 31);
            $hour = random_int(7, 8);
            $minute = random_int(00, 30);
            $second = random_int(00, 00);
          
            static $user_id = 1;

           
            
            return [
                'user_id' => $user_id++,
                'work_date' => date("Y/m/d"),
                'time1' =>  date("$years-$months-$days $hour:$minute:$second"),
                'time2' => date("$years-$months-$days $hour:$minute:$second"),
                'time3' => date("$years-$months-$days $hour:$minute:$second"),
                'time4' => date("$years-$months-$days $hour:$minute:$second"),
                'worked_time' => '8'
            
            ];

        }
}
