<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'paymentmethod_id', 'id');
    }
}
