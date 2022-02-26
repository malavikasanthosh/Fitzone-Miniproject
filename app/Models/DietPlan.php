<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietPlan extends Model
{
    use HasFactory;
    protected $fillable=['name',
    'plan',
    'user_id'];

    public function trainer(){
        return $this->belongsTo(User::class);
    }
    public function dietplan(){
        return $this->belongsTo(DietPlan::class);
    }
}
