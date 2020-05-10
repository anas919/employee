<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    public function candidate(){
        return $this->belongsTo('App\Candidate');
    }
    public function offer(){
        return $this->belongsTo('App\Offer');
    }
    public function interviewer(){
        return $this->belongsTo('App\User', 'interviewer_id');
    }
}
