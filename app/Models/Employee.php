<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name','lastname','photo','position','gender','salary','phone','store_id'];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function productsAdded()
    {
        return $this->belongsToMany(Product::class, 'employee_product', 'employee_id', 'product_id');
    }
}
