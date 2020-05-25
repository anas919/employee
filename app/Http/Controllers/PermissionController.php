<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Permission;

class PermissionController extends Controller
{
    public function index(Request $req)
    {
		$members = User::all();
		$roles = Role::all();
    	return view('permissions.index',['members'=>$members, 'roles'=>$roles]);
    }
	public function selectRole(Request $req, $account, $role_id, $module)
	{
		$permissions = Permission::where('module','=',$module)->get();
		$role = Role::find($role_id);
		$affectedPermissions = array();
		foreach ($role->permissions as $permission) {
			$affectedPermissions[] = $permission->id;
		}
		foreach ($permissions as $permission) {
			if(in_array($permission->id,$affectedPermissions))
				$permission->has_permission = true;
			else
				$permission->has_permission = false;
		}
		// dd($permissions);
		return response()->json(['module'=>$module, 'permissions'=>$permissions]);
		// return response()->json(['module'=>'employees','permissions'=>$role->members_permissions]);
	}
	public function addRole(Request $req)
	{
		$role = new Role();
		$role->name = $req->name;
		$role->save();

		return response()->json(['success'=>'Role added Successefully','role'=>$role]);
	}
	public function assignPermissions(Request $req)
	{
		$role = Role::find($req->role);
		if(isset($req->assignedPermissions))
			$role->permissions()->detach($req->assignedPermissions);
		if(isset($req->detachedPermissions))
			$role->permissions()->detach($req->detachedPermissions);

		$role->permissions()->attach($req->assignedPermissions);
		return response()->json(['attached'=>'Permissions attached Successefully']);
	}
}
