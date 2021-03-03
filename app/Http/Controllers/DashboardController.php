<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
		return view('dashboard.index');
    }
    public function spent(Request $req, $account)
    {
    	
    }
    public function earned(Request $req, $account)
    {
    	# code...
    }
    public function achieved(Request $req, $account)
    {
    	# code...
    }
    public function pending(Request $req, $account)
    {
    	# code...
    }
    public function activities(Request $req, $account)
    {
    	# code...
    }
    public function progress(Request $req, $account)
    {
    	# code...
    }
}
