<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomecategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'income_category_name'
    ];
}
