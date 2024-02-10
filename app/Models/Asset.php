<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'code', 'description', 'acquisition_date',
        'useful_life', 'department_id', 'category_id', 'user_id',
        'depreciation_method', 'depreciation_rate', 'value'
    ];

}
