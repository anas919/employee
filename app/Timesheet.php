<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    public function member()
    {
        return $this->belongsTo('App\User');
    }
    public function schedule(){
        return $this->belongsTo('App\Schedule');
    }
}
