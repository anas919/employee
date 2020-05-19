<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Schedule;
use App\User;
use App\Tenant;
use Datetime;

class ScheduleController extends Controller
{
    public function index() {
    	$schedules = Schedule::all();
    	$members = User::all();

        return view('schedules/index', ['schedules'=>$schedules, 'members'=>$members]);
    }
    public function add(Request $req){
		foreach ($req->members as $member) {
	    	$start_date = new DateTime(date('Y-m-d',strtotime($req->start_date)));
			$end_date = new DateTime(date('Y-m-d',strtotime($req->end_date)));
			$numberDays = $end_date->diff($start_date)->format("%a");
			// dd($numberDays);
			for ($i=0; $i <= $numberDays; $i++) {
				$schedule = new Schedule();
		    	$schedule->start_time = $req->start_time;
				$schedule->end_time = $req->end_time;
				$schedule->start_date = $start_date->format('Y-m-d');
				$schedule->end_date = $start_date->format('Y-m-d');
				$schedule->min_hours = $req->min_hours;
				$schedule->member_id = $member;
				if(date("Y-m-d") < $start_date->format('Y-m-d'))
					$schedule->attendance = 'coming';
				if(date("Y-m-d") > $start_date->format('Y-m-d'))
					$schedule->attendance = 'missed';
				$schedule->save();
				$start_date->modify('+1 day');
			}
		}

		return redirect()->route('schedules', Auth::user()->subdomain);
    }
	//Api Routes
	public function schedules(Request $request)
	{
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
		$user = User::where('subdomain',$request->user()->subdomain)->first();
		$schedules = Schedule::where('member_id',$user->id)->with('member')->get();

		return response()->json(['schedules'=>$schedules]);
	}
	public function addSchedule(Request $request)
	{
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
		$user = User::where('subdomain',$request->user()->subdomain)->first();
		return response()->json(['user'=>$user]);
	}
}
