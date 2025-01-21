<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
  protected $table = 'profiles';

  protected $fillable = ['user_id','username','phone','address','city','state','hobbies','image','job','education','about','recent_activity','Recent_badges'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
