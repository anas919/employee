<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req, $account='')
    {
			//dd($account);
			if($account == ''){
				if(Auth::check())
					return 'Login at : <a href="http://'.Auth::user()->subdomain.'.localhost:8000">http://'.Auth::user()->subdomain.'.localhost.</a> and login';
				else
					return route('login');
			}
			else {
					$users = User::all();
					return view('home',['users'=>$users]);
			}
    }
}
