<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function members()
    {
        return $this->belongsToMany('App\User', 'cardmembers', 'card_id', 'user_id');
    }
    public function tasklist()
	{
	    return $this->belongsTo('App\Tasklist');
	}
	public function files()
    {
        return $this->hasMany('App\Cardfile');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
