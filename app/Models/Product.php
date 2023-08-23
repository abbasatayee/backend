<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function employeesAdded()
    {
        return $this->belongsToMany(Employee::class, 'employee_product', 'product_id', 'employee_id');
    }
}
