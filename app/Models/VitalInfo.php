<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'weight',
        'height',
        'user_id'
    ];
}
