<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    public function board()
	{
	    return $this->belongsTo('App\Board');
	}
	public function cards()
    {
        return $this->hasMany('App\Card');
    }
}
