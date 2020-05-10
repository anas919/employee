<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $table = 'countries';

    public function members()
    {
        return $this->hasMany('App\User', 'country_id', 'id');
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
