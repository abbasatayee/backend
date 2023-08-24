<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable =
    [
        'employee_id', 'attendance_date', 'in_time', 'out_time', 'status', 'reason'
    ];

    public function employees(){
        $this->hasMany(Employee::class);
    }
}
