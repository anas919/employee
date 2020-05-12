<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
	use HasApiTokens, Notifiable;
    protected $guarded = [];


	    /**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'first_name', 'last_name', 'email', 'number', 'password', 'subdomain'
	    ];

	    /**
	     * The attributes that should be hidden for arrays.
	     *
	     * @var array
	     */
	    protected $hidden = [
	        'password', 'remember_token',
	    ];

	    public function media(){
	        return $this->belongsTo('App\Media');
	    }
	    public function avatar(){
	        return  $this->media ? $this->media->reference : substr($this->first_name, 0, 2) ;
	    }
	    public function roles()
	    {
	        return $this->belongsToMany('App\Role', 'userroles');
	    }
	    public function hasAnyRole($roles){
	        if(is_array($roles)){
	            foreach ($roles as $role) {
	                if($this->hasRole($role)){
	                    return true;
	                }
	            }
	        }else{
	            if($this->hasRole($roles)){
	                return true;
	            }
	        }
	        return false;
	    }
	    public function hasRole($role){
	        if($this->roles()->where('name', $role)->first()){
	            return true;
	        }
	        return false;
	    }
	    public function boards()
	    {
	        return $this->hasMany('App\Board', 'head_member_id', 'id');
	    }
	    public function offers()
	    {
	        return $this->hasMany('App\Offer', 'responsible_id', 'id');
	    }
	    public function schedules()
	    {
	        return $this->hasMany('App\Schedule', 'member_id', 'id');
	    }
	    //a member can be team lead on many projects
	    public function projects()
	    {
	        return $this->hasMany('App\Project');
	    }
	    public function organization()
	    {
	        return $this->belongsTo('App\Organization', 'organization_id');
	    }
	    public function paymentschedule()
	    {
	        return $this->belongsTo('App\Paymentschedule', 'paymentschedule_id');
	    }
	    public function paymentrate()
	    {
	        return $this->belongsTo('App\Paymentrate', 'paymentrate_id');
	    }
	    public function paymentmethod()
	    {
	        return $this->belongsTo('App\Paymentmethod', 'paymentmethod_id');
	    }
	    public function country()
	    {
	        return $this->belongsTo('App\Country', 'country_id');
	    }
	    public function job()
	    {
	        return $this->belongsTo('App\Job', 'job_id');
	    }
	    public function department()
	    {
	        return $this->belongsTo('App\Department', 'department_id');
	    }
	    public function visa()
	    {
	        return $this->belongsTo('App\Visa', 'visa_id');
	    }
	    public function leaderteams()
	    {
	        return $this->belongsToMany('App\Team', 'teamleads', 'lead_id', 'team_id');
	    }
	    public function memberteams()
	    {
	        return $this->belongsToMany('App\Team', 'teammembers', 'member_id', 'team_id');
	    }
	    public function membercards()
	    {
	        return $this->belongsToMany('App\Card', 'cardmembers', 'user_id', 'card_id');
	    }
	    public function interviews()
	    {
	        return $this->hasMany('App\Interview');
	    }
	    public function policies()
	    {
	        return $this->belongsToMany('App\Policy', 'policymembers', 'policy_id', 'member_id');
	    }
	    public function timeoffs()
	    {
	        return $this->hasMany('App\Timeoff');
	    }
	    public function invites()
	    {
	        return $this->hasMany('App\Invite');
	    }
}
