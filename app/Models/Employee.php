<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'salary',
        'DOB',
        'created_by',
        'updated_by',
    ];
}
