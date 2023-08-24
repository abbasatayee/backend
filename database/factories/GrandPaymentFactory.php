<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GrandPayment>
 */
class GrandPaymentFactory extends Factory
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
            'year'=>$this->faker->year(),
            'month'=>$this->faker->month(),
            'date'=>$this->faker->date(),
            'deduction_amount'=>$this->faker->numberBetween(200,50000),
            'net_pay_amount'=>$this->faker->numberBetween(1,50000),
            'is_paid'=>$this->faker->boolean(),
            'pay_amount'=>$this->faker->numberBetween(300,50000)
        ];
    }
}
