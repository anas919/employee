<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function members()
    {
        return $this->hasMany('App\User', 'job_id', 'id');
    }
}
