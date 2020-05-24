<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Payslip;
use App\Earning;
use App\Deduction;
use App\Organization;
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
		$payslips = Payslip::all();
    	return view('payroll/index', ['weekNumber'=>$weekNumber, 'members'=>$members, 'payslips'=>$payslips]);
    }
	public function add(Request $req)
	{
		$dates = explode('-', $req->daterange);
		// dd($dates);->format("M j, Y")
		foreach ($req->members as $member) {
			$payslip = new Payslip();
			$payslip->start_date =  date('Y-m-d',strtotime($dates[0]));
			$payslip->end_date =  date('Y-m-d',strtotime($dates[1]));
			if(isset($req->ckeditor1))
				$payslip->note = $req->ckeditor1;
			$last = DB::table('payslips')->max('id');
			$payslip->number = 'PL-'.($last+1);
			$payslip->user_id = $member;
			$payslip->amount = $req->amount;
			$payslip->save();
			if(isset($req->earnings)){
				foreach ($req->earnings as $key => $earning) {
					$earned = new Earning();
					$earned->payslip_id = $payslip->id;
					$earned->amount = $earning;
					$earned->description = $req->motif_earnings[$key];
					$earned->save();
				}
			}
			if(isset($req->deductions)){
				foreach ($req->deductions as $key => $deduction) {
					$deducted = new Deduction();
					$deducted->payslip_id = $payslip->id;
					$deducted->amount = $deduction;
					$deducted->description = $req->motif_deductions[$key];
					$deducted->save();
				}
			}
		}
		return redirect()->route('payroll', Auth::user()->subdomain);
	}
	public function editPayroll(Request $req, $account, $id)
	{
		$payslip = Payslip::find($id);
		$organization = Organization::find(1);

		return view('payroll.edit',['payslip'=>$payslip, 'organization'=>$organization]);
	}

}
