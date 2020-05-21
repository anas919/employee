<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DateTime;

class PayrollController extends Controller
{
    public function index(Request $req)
    {
		//Number of weeks in current year
		$currentDate = new DateTime();
		$year = $currentDate->format('Y');
		$weekNumber = max(date("W", strtotime($year ."-12-27")), date("W", strtotime($year ."-12-29")), date("W", strtotime($year ."-12-31")));

		$members = User::all();

    	return view('payroll/index', ['weekNumber'=>$weekNumber, 'members'=>$members]);
    }
}
