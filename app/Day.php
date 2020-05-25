<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function schedules()
    {
        return $this->belongsToMany('App\Schedule', 'scheduledays', 'day_id', 'schedule_id');
    }
}
