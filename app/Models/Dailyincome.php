<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailyincome extends Model
{
    use HasFactory;

    protected $fillable = [
        'income_cat_id', 'income_amount','created_at'
    ];
}
