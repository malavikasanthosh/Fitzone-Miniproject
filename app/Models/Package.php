<?php

namespace App\Models;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'amount',
        'days',
        'id'
    ];

    public function timeslots()
    {
        return  $this->hasMany(Timeslot::class);
    }
    public function trainers()
    {
        return  $this->hasMany(User::class);
    }

}
