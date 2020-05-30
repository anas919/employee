<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	public function members()
	{
		return $this->belongsToMany('App\User', 'userroles');
	}
	public function membersByStatus($status){
		return $this->members()->where('status','=',$status)->get();
	}
	public function permissions()
	{
		return $this->belongsToMany('App\Permission', 'rolepermissions');
	}
	public function dashboard_permissions()
	{
		return $this->permissions()->where('module','=','dashboard');
	}
	public function members_permissions()
	{
		return $this->permissions()->where('module','=','members');
	}
	public function offers_permissions()
	{
		return $this->permissions()->where('module','=','offers');
	}
	public function candidates_permissions()
	{
		return $this->permissions()->where('module','=','candidates');
	}
	public function projects_permissions()
	{
		return $this->permissions()->where('module','=','projects');
	}
	public function teams_permissions()
	{
		return $this->permissions()->where('module','=','teams');
	}
	public function timeoffs_permissions()
	{
		return $this->permissions()->where('module','=','timeoffs');
	}
	public function schedules_permissions()
	{
		return $this->permissions()->where('module','=','schedules');
	}
	public function tasks_permissions()
	{
		return $this->permissions()->where('module','=','tasks');
	}
	public function invoices_permissions()
	{
		return $this->permissions()->where('module','=','invoices');
	}
	public function screenshots_permissions()
	{
		return $this->permissions()->where('module','=','screenshots');
	}
	public function apps_permissions()
	{
		return $this->permissions()->where('module','=','apps');
	}
	public function urls_permissions()
	{
		return $this->permissions()->where('module','=','urls');
	}
	public function clients_permissions()
	{
		return $this->permissions()->where('module','=','clients');
	}
	public function settings_permissions()
	{
		return $this->permissions()->where('module','=','settings');
	}
}
