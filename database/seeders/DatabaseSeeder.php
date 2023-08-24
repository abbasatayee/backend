<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Employee;
use App\Models\EmployeeProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(10)->create();
        Employee::factory(10)->create();
        Product::factory(10)->create();
        Store::factory(10)->create();
        EmployeeProduct::factory(10)->create();
        Category::factory(10)->create();
    }
}
