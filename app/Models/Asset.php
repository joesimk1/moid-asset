<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','code','depreciation_method','useful_life',
        'department_id','asset_category_id','user_id','acq_date',
        'description'
    ];
}
public function bookValue()
    {
        if ($this->depreciation_method === "straight line") {
            $value =  $this->calcBookValByStraight();
            return $value;
        }

        $value =  $this->calcBookValByDecline();
        return $value;



    }

    public function calcBookValByStraight()
    {
        $res = (($this->value) - 0) / $this->useful_life;
        $year = date('Y');
        $p_year = Carbon::parse($this->acquisition_date);

        $used_years = $year - $p_year->year;

        $val = $this->value - ($used_years * $res);

        if ($val < 0) {
            return 0;
        }

        return $val;
    }

    public function calcBookValByDecline()
    {
        $year = date('Y');
        $p_year = Carbon::parse($this->acquisition_date);

        $accumulated = 0;

        $diff_years = $year - $p_year->year;

        for ($year_num = 0; $year_num < $diff_years; $year_num++) {
            $accumulated += ($this->value - $accumulated) * ($this->depreciation_rate / 100);
        }

        $val = $this->value - $accumulated;

        if ($val < 0) {
            return 0;
        }


        return $val;
    }




}

