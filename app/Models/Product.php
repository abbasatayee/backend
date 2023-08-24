<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = 
    [
        'sku','product_name','p_code','type','expiration_date','category_id','unit','description','number_of_sales','is_published'
    ];
    public function employeesAdded()
    {
        return $this->belongsToMany(Employee::class, 'employee_product', 'product_id', 'employee_id');
    }
}
