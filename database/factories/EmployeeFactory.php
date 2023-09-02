<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Employee::class;

    public function definition()
    {
        $storeIds = Store::pluck('id')->take(10);
        
        return [
            'name' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'photo' => 'EmployeeImage/avatars/1.png',
            'position' => $this->faker->randomElement(['manager', 'seller']),
            'phone' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'salary' => $this->faker->numberBetween(30000, 100000),
            'store_id' => $this->faker->randomElement($storeIds),
        ];
    }
}
