<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function earnings()
	{
		return $this->hasMany('App\Earning');
	}
	public function deductions()
	{
		return $this->hasMany('App\Deduction');
	}
}
