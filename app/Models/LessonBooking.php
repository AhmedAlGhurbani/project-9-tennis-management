<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonBooking extends Model
{
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    // A LessonBooking belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
