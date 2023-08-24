<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeProduct>
 */
class EmployeeProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $employee = Employee::inRandomOrder()->first()->id;
        $product = Product::inRandomOrder()->first()->id;
        return [
            'employee_id'=>$employee,
            'product_id'=>$product
        ];
    }
}
