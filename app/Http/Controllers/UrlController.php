<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlController extends Controller
{
	public function index(Request $req)
    {
    	return view('urls/index');
    }
}
