<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'package_id',
        'diet_plan_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile(){
       return $this->hasOne(Profile::class);
    }
    public function myPackages(){
       return $this->hasMany(MyPackage::class,'member_id');
    }
    public function package(){
        return $this->belongsTo(Package::class);
     }

    public function dietplan(){
        return $this->belongsTo(DietPlan::class,'diet_plan_id');
    }
    public function dietplans(){
        return $this->hasMany(DietPlan::class);
    }
}
