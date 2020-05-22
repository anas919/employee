<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function members()
	{
		return $this->belongsToMany('App\User', 'userroles');
	}
	public function permissions()
	{
		return $this->belongsToMany('App\Permission', 'rolepermissions');
	}
}
