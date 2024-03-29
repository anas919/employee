<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
    	'email', 'token', 'user_id','roles'
	];
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
