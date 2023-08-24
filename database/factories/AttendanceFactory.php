<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $employeeIds = Employee::inRandomOrder()->first()->id;
        return [
            'employee_id'=>$employeeIds,
            'attendance_date' => $this->faker->date(), 
            'in_time'=>$this->faker->time(),
            'out_time'=>$this->faker->time(),
            'status'=>$this->faker->randomElement(['present','absent with deduction','absent without deduction','half-day','late']),
            'reason'=>$this->faker->sentence,
        ];
    }
}
