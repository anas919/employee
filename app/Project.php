<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function boards()
    {
        return $this->hasMany('App\Board');
    }
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'teamprojects', 'project_id', 'team_id');
    }
    public function client()
	{
	    return $this->belongsTo('App\Client');
	}
}
