<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class PayrollController extends Controller
{
    public function index(Request $req)
    {
		$currentDate = new DateTime();
		$year = $currentDate->format('Y');
		$weekNumber = max(date("W", strtotime($year ."-12-27")), date("W", strtotime($year ."-12-29")), date("W", strtotime($year ."-12-31")));

    	return view('payroll/index', ['weekNumber'=>$weekNumber]);
    }
}
