<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	public function responsible()
	{
	    return $this->belongsTo('App\User', 'responsible_id');
	}
    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }
    public function department()
	{
	    return $this->belongsTo('App\Department');
	}
	public function country()
	{
	    return $this->belongsTo('App\Country');
	}
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    public function interviews()
    {
        return $this->hasMany('App\Interview');
    }
	public function offerquestions()
    {
        return $this->hasMany('App\Offerquestion');
    }
}
