<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'tech_passport_seria',
        'tech_passport_number',
        'gov_number',
        'tech_passport_issue_date',
        'issue_year',
        'vehicle_type_id',
        'body_number',
        'engine_number',
        'p_vehicle_id',
        'model_name',
        'vehicle_color',
        'division',
        'full_weight',
        'empty_weight',
        'fuel_type',
        'seats',
        'stands',
        'comment',
        'inspection',
        'pinfl',
        'owner',
    ];
}
