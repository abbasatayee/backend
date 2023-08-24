<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalaryTransaction>
 */
class SalaryTransactionFactory extends Factory
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
            'transaction_date'=>$this->faker->date(),
            'transaction_type'=>$this->faker->randomElement(['Advance','Remainder']),
            'amount'=>$this->faker->numberBetween(20, 100),
            'created_by'=>$employeeIds,

        ];
    }
}
