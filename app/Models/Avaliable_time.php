<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliable_time extends Model
{
    use HasFactory;

    protected $table = 'avaliable_times';
    protected $fillable = ['doctor_id', 'day', 'start_time', 'end_time', 'duration'];
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function timeSlots(){
        return $this->hasMany(Time_Slots::class);
    }
}
