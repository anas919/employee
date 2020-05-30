<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
	protected $table = "educations";
	
	public function member(){
	    return $this->belongsTo('App\User');
	}
}
