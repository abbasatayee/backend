<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTransaction extends Model
{
    use HasFactory;
    protected $table = 'salary_transactions';
    protected $fillable =
    [
        'employee_id', 'transaction_date', 'transaction_type', 'amount', 'created_by'
    ];
    public function employees(){
        $this->hasMany(Employee::class);
    }
}
