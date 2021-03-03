<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function member()
	{
	    return $this->belongsTo('App\User', 'member_id');
	}
	public function days()
    {
        return $this->belongsToMany('App\Day', 'scheduledays', 'schedule_id', 'day_id');
    }
	public function timesheets()
    {
        return $this->hasMany('App\Timesheet');
    }
}
