<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function add(Request $req, $account)
    {
		$department = new Department();
        $department->name = $req->name;

		$department->save();
        return response()->json(['success'=>'Department Created Successefuly', 'department'=>$department]);
    }
}
