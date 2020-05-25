<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    public function members()
    {
        return $this->belongsToMany('App\User', 'policymembers', 'member_id', 'policy_id');
    }
    public function timeoffs()
    {
        return $this->hasMany('App\Timeoff');
    }
}
