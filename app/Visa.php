<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    public function member()
    {
        return $this->hasOne('App\Member');
    }
}
