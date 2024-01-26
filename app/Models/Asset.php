<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','creation_date','depreciation_method','useful_life',
        'department_id','asset_category_id','user_id','acq_date',
        'description'
    ];
}

