<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    //php artisan config:cache


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',

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

    protected $table = 'doctors';


   public function profile(){
    return $this->hasOne(Profile::class);
   }
   public function images(): MorphOne
   {
       return $this->morphOne(Image::class, 'imageble');
   }
   public function avaliableTimes(){
    return $this->hasMany(Avaliable_Time::class);
   }
   public function appointments(){
    return $this->hasMany(Appointment::class);
   }
   public function specializations(){
    return $this->belongsToMany(Specialization::class, 'specialization_doctors', 'doctor_id', 'specialization_id');
   }

    }
