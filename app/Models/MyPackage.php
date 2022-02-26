<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class MyPackage extends Model
{
    use HasFactory;
    protected $fillable=[
        'package_id',
        'timeslot_id',
        'member_id',
        'trainer_id',
        'diet_plan_id'
    ];

    public function package(){
        return $this->belongsTo(Package::class);
    }
    public function timeslot(){
        return $this->belongsTo(Timeslot::class);
    }
    public function trainer(){
        return $this->belongsTo(User::class,'trainer_id');
    }
    public function member(){
        return $this->belongsTo(User::class,'member_id');
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
