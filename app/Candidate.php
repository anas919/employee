<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
	public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
    public function country()
	{
	    return $this->belongsTo('App\Country', 'country_id');
	}
	public function media(){
        return $this->belongsTo('App\Media');
    }
    public function resume(){
        return $this->belongsTo('App\Resume');
    }
    public function interviews()
    {
        return $this->hasMany('App\Interview');
    }
	public function candidateresponse()
    {
        return $this->hasMany('App\Candidateresponse');
    }
}
