<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function head_member()
	{
	    return $this->belongsTo('App\User', 'head_member_id');
	}
	public function project()
	{
	    return $this->belongsTo('App\Project');
	}
	public function tasklists()
    {
        return $this->hasMany('App\Tasklist');
    }
}
