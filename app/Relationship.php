<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function member(){
        return $this->belongsTo('App\User');
    }
}
