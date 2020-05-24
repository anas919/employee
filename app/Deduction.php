<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
	public function payslip(){
		return $this->belongsTo('App\Payslip');
	}
}
