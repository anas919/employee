<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'visa_id', 'id');
    }
}
