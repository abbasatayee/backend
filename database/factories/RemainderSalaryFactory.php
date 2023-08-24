<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RemainderSalary>
 */
class RemainderSalaryFactory extends Factory
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
            'amount'=>$this->faker->numberBetween(30,100),
            'status'=>$this->faker->randomElement(['clean','on store','on employee']),
            
        ];
    }
}
