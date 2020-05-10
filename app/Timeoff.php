<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeoff extends Model
{
    public function member(){
        return $this->belongsTo('App\User');
    }
    public function policy(){
        return $this->belongsTo('App\Policy');
    }
}
