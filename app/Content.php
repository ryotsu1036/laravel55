<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function zodiacSign()
    {
        return $this->belongsTo('App\ZodiacSign');
    }

    public function horoscope()
    {
        return $this->belongsTo('App\Horoscope');
    }
}
