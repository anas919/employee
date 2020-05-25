<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentrate extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'paymentrate_id', 'id');
    }
}
