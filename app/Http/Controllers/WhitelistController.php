<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhitelistController extends Controller
{
    public function index(Request $req)
    {
    	return view('whitelist.index');
    }
}
