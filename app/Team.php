<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function leads()
    {
        return $this->belongsToMany('App\User', 'teamleads', 'team_id', 'lead_id');
    }
    public function members()
    {
        return $this->belongsToMany('App\User', 'teammembers', 'team_id', 'member_id');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Project', 'teamprojects', 'team_id', 'project_id');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }
}
