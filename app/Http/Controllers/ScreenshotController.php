<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
	public function index(Request $req)
    {
    	return view('screenshots/index');
    }
}
