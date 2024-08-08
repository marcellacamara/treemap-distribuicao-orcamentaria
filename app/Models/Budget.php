<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'percentage_last_year',
        'percentage_this_year',
    ];

    public function calculateVariation(): float
    {
        return ($this->percentage_this_year - $this->percentage_last_year) / $this->percentage_last_year * 100;
    }
}
