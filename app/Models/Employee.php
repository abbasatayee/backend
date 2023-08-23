<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function productsAdded()
    {
        return $this->belongsToMany(Product::class, 'employee_product', 'employee_id', 'product_id');
    }
}
