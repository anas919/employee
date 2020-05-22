<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class PermissionController extends Controller
{
    public function index(Request $req)
    {
		$members = User::all();
		$roles = Role::all();
    	return view('permissions.index',['members'=>$members, 'roles'=>$roles]);
    }
	public function selectRole(Request $req, $account, $role_id)
	{
		$role = Role::find($role_id);
		dd($role->permissions);

		return response()->json(['']);
	}
	public function addRole(Request $req)
	{
		$role = new Role();
		$role->name = $req->name;
		$role->save();

		return response()->json(['success'=>'Role added Successefully','role'=>$role]);
	}
}
