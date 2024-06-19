<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'plants';

    protected $fillable = [
        'user_id',
        'plant_id',
        'is_default',
        'name',
        'image',
        'watering',
        'temperature',
        'humidity',
        'soil_Humidity'
    ];
}
