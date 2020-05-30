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
                    return redirect()->route('members',['account'=>Auth::user()->subdomain]);
				else
					return route('login');
			}
			else {
                if(Auth::check())
                    return redirect()->route('members',['account'=>Auth::user()->subdomain]);
                else
					return view('home',['users'=>$users]);
			}
    }
}
