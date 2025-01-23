<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'imageble_type', 'imageble_id'];

    public function imageble(): MorphTo
    {
        return $this->morphTo();
    }

    }

