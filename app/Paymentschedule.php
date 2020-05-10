<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentschedule extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'paymentschedule_id', 'id');
    }
}
