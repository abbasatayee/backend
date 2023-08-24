<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrandPayment extends Model
{
    
    use HasFactory;
    protected $table = 'grand_payments';
    protected $fillable =
    [
        'employee_id', 'year', 'month', 'date', 'deduction_amount', 'net_pay_amount', 'is_paid', 'pay_amount'
    ];
    public function employees(){
        $this->hasMany(Employee::class);
    }
}
