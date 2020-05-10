<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidateresponse extends Model
{
	public function candidate(){
		return $this->belongsTo('App\Candidate');
	}
	public function offerquestion(){
		return $this->belongsTo('App\Offerquestion');
	}
}
