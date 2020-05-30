<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function member(){
        return $this->belongsTo('App\User');
    }
    public function card(){
        return $this->belongsTo('App\User');
    }
}
