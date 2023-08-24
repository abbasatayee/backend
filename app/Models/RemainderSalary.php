<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemainderSalary extends Model
{
    use HasFactory;
    protected $table = 'remainder_salaries';
    protected $fillable = ['employee_id','amount','status'];

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
