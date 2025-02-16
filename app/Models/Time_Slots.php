<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_Slots extends Model
{
    use HasFactory;
    protected $table = 'time_slots';
    protected $fillable = ['avaliable_time_id', 'start_time', 'end_time', 'date', 'status'];
    public function avaliableTime(){
        return $this->belongsTo(Avaliable_Time::class);
    }
    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
}
