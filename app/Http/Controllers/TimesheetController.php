<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Timesheet;
use App\User;
use Illuminate\Support\Facades\Auth;
use Datetime;
use Carbon\Carbon;

class TimesheetController extends Controller
{
	public function hoursandmins($time, $format = '%02d:%02d')
    {
        if ($time < 1) {
            return $time;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }
	public function index(Request $req)
	{
		$currentDate = (new Datetime())->format('Y-m-d');
    	$members = DB::table('timesheets')->selectRaw('member_id')->whereDate('start_time','=',$currentDate)->groupBy('member_id')->get();
    	foreach ($members as $member) {
    		//Get total worked time
    		$timesheets = Timesheet::whereDate('start_time','=',$currentDate)
	    		->where('member_id',$member->member_id)
	    		->get();
	    	$hours = 0;
    		foreach ($timesheets as $timesheet) {
    			$date1 = new Datetime($timesheet->start_time);
				$date2 = new Datetime($timesheet->end_time);
				$diff = $date2->diff($date1);

	            $hours = $hours + (($diff->h * 60) + $diff->i);
    		}
    		$member->worked = $this->hoursandmins($hours);
    		//Get total Breaks time
    		$breaks = 0;
	        $first_timesheet = Timesheet::whereDate('start_time','=',$currentDate)
	        	->where('member_id',$member->member_id)
	        	->first();
	        $last_timesheet = Timesheet::whereDate('start_time','=',$currentDate)
	        	->where('member_id',$member->member_id)
	        	->latest()->first();
	        if($first_timesheet){
	        	$member->first_punch = $first_timesheet->start_time;
	        	$member->timesheet_id = $first_timesheet->id;
	            $date1 = new Datetime($first_timesheet->start_time);
	            $date2 = new Datetime($last_timesheet->end_time);
	            $diff = $date2->diff($date1);
	            $breaks = (($diff->h * 60) + $diff->i) - $hours;
	        }
	        if($first_timesheet){
	        	$member->last_punch = $last_timesheet->end_time;
	        }
			$member->breaks = $this->hoursandmins($breaks);
			$member->member = User::find($member->member_id);

    	}
    	$start_date = (new Datetime())->format('d-m-Y');
		return view('timesheets/index', ['members'=>$members, 'start_date'=>$start_date, 'end_date'=>$start_date]);
	}
	public function search(Request $req, $account)
	{
		$startDate = date('Y-m-d', strtotime($req->start_date));
		$endDate = date('Y-m-d', strtotime($req->end_date));

    	$members = DB::table('timesheets')->selectRaw('member_id')
    		->whereDate('start_time','>=',$startDate)
    		->whereDate('start_time','<=',$endDate)
    		->groupBy('member_id')
    		->get();
    	foreach ($members as $member) {
    		//Get total worked time
    		$timesheets = Timesheet::whereDate('start_time','>=',$startDate)
    			->whereDate('start_time','<=',$endDate)
	    		->where('member_id',$member->member_id)
	    		->get();
	    	$hours = 0;
    		foreach ($timesheets as $timesheet) {
    			$date1 = new Datetime($timesheet->start_time);
				$date2 = new Datetime($timesheet->end_time);
				$diff = $date2->diff($date1);

	            $hours = $hours + (($diff->h * 60) + $diff->i);
    		}
    		$member->worked = $this->hoursandmins($hours);
    		//Get total Breaks time
    		$breaks = 0;
	        $first_timesheet = Timesheet::whereDate('start_time','>=',$startDate)
    			->whereDate('start_time','<=',$endDate)
	        	->where('member_id',$member->member_id)
	        	->first();
	        $last_timesheet = Timesheet::whereDate('start_time','>=',$startDate)
    			->whereDate('start_time','<=',$endDate)
	        	->where('member_id',$member->member_id)
	        	->latest()->first();
	        if($first_timesheet){
	        	$member->first_punch = $first_timesheet->start_time;
	        	$member->timesheet_id = $first_timesheet->id;
	            $date1 = new Datetime($first_timesheet->start_time);
	            $date2 = new Datetime($last_timesheet->end_time);
	            $diff = $date2->diff($date1);
	            $breaks = (($diff->h * 60) + $diff->i) - $hours;
	        }
	        if($first_timesheet){
	        	$member->last_punch = $last_timesheet->end_time;
	        }
			$member->breaks = $this->hoursandmins($breaks);
			$member->member = User::find($member->member_id);
    	}
    	// dd($members);
		return view('timesheets/index', ['members'=>$members, 'start_date'=>$req->start_date, 'end_date'=>$req->end_date]);
		// dd(date('Y-m-d', strtotime($req->start_date)));
	}
}
