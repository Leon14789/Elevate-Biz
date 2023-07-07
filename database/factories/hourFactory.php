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
            $years = random_int(1000, 2500);
            $months = random_int(10, 12);
            $days =  random_int(10, 31);
            $teste =  random_int(10, 31);
            static $increment = 1;

           
            
            return [
                'user_id' => $increment++,
                'work_date' => $increment++,
                'time1' => $years   . $months  . $days,
                'time2' => $years   . $months  . $days,
                'time3' => $years   . $months  . $days,
                'time4' => $years   . $months  . $days,
                'worked_time' => '8'
            
            ];

        }
}
