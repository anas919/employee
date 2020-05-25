<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
	public function payslip(){
		return $this->belongsTo('App\Payslip');
	}
}
