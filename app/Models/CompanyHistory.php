<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_uz',
        'text_ru',
        'text_en',
         'image',
        'date',
    ];
}
