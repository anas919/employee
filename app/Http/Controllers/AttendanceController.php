<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tenant;
use App\Timesheet;
use App\Schedule;
use Datetime;

class AttendanceController extends Controller
{
    public function hoursandmins($time, $format = '%02d:%02d')
    {
        if ($time < 1) {
            return 0;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }
    public function index() {
        //Get schedules & timesheets of current date
        $currentDate = (new Datetime())->format('Y-m-d');
    	$timesheets = Timesheet::whereDate('start_time','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->get();
    	$schedule = Schedule::whereDate('start_date','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->get();
    	//Get total time worked
    	$hours = 0;
    	foreach ($timesheets as $timesheet) {
	    	$date1 = new Datetime($timesheet->start_time);
			$date2 = new Datetime($timesheet->end_time);
			$diff = $date2->diff($date1);

            $hours = $hours + (($diff->h * 60) + $diff->i);
    	}
        //Get total breaks
        $breaks = 0;
        $first_timesheet = Timesheet::whereDate('start_time','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->first();
        $last_timesheet = Timesheet::whereDate('start_time','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->latest()->first();
        if($first_timesheet){
            $date1 = new Datetime($first_timesheet->start_time);
            $date2 = new Datetime($last_timesheet->end_time);
            $diff = $date2->diff($date1);
            $breaks = (($diff->h * 60) + $diff->i) - $hours;
        }

        $worked = $this->hoursandmins($hours);
        $breaks = $this->hoursandmins($breaks);
        // First Punch In in current day
        $first_punch_in = Timesheet::whereDate('start_time','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->first();
        return view('attendance/index', ['timesheets'=>$timesheets, 'schedule'=>$schedule, 'first_punch_in'=>$first_punch_in, 'worked'=>$worked, 'breaks'=>$breaks, 'first_timesheet'=>$first_timesheet, 'last_timesheet'=>$last_timesheet]);
    }
    public function add(Request $req, $account)
    {
        //Get schedules & timesheets of current date
        $currentDate = (new Datetime())->format('Y-m-d');
        
        $schedule = Schedule::whereDate('start_date','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->get();
        //Add timesheet
        $timesheet = new Timesheet();
        $timesheet->start_time = date('Y-m-d H:i:s', strtotime($req->start_time));
        $timesheet->end_time = date("Y-m-d H:i:s", strtotime($req->start_time) + $req->seconds);
        $timesheet->member_id = Auth::user()->id;
        $timesheet->activity = 'in';
        $timesheet->status = 'approved';

        $schedule_hours = 0;
        if(count($schedule)){
            $timesheet->schedule_id = $schedule[0]->id;
            //Update attendance on schedule-to investigate follow $schedule_hours
            $schedule_date1 = new Datetime($schedule[0]->start_date.' '.$schedule[0]->start_time.':00:00');
            $schedule_date2 = new Datetime($schedule[0]->end_date.' '.$schedule[0]->end_time.':00:00');
            $schedule_diff = $schedule_date1->diff($schedule_date2);
            $schedule_hours = $schedule_hours + (($schedule_diff->h * 60) + $schedule_diff->i);

        }
        $timesheet->save();
        $timesheets = Timesheet::whereDate('start_time','=',$currentDate)
            ->where('member_id', Auth::user()->id)
            ->get();
        //Get total time worked
        $hours = 0;
        foreach ($timesheets as $timesheet) {
            $date1 = new Datetime($timesheet->start_time);
            $date2 = new Datetime($timesheet->end_time);
            $diff = $date2->diff($date1);

            $hours = $hours + (($diff->h * 60) + $diff->i);
        }
        if(count($schedule)){
            $schedule_updated = Schedule::find($schedule[0]->id);

            //More than 30 min still to finish
            if($schedule_hours-$hours > 30 && $schedule_hours != 0){
                $schedule_updated->attendance = 'working';
            }elseif ($schedule_hours-$hours <= 30 || $schedule_hours-$hours <= 0) {
                $schedule_updated->attendance = 'attended';
            }//Less than 5 min to finish
            //late
            $first_timesheet = Timesheet::whereDate('start_time','=',$currentDate)
                ->where('member_id', Auth::user()->id)
                ->first();
            $date1 = new Datetime($schedule_updated->start_date.' '.$schedule_updated->start_time.':00:00');
            $date2 = new Datetime($first_timesheet->start_time);
            $diff = $date2->diff($date1);
            $late = (($diff->h * 60) + $diff->i);
            // dd($late);
            if($late > 10){
                $schedule_updated->attendance = 'late';
            }
            //
            $schedule_updated->save();
        }
        //Get total breaks
        $breaks = 0;
        $first_timesheet = Timesheet::whereDate('start_time','=',$currentDate)->first();
        $last_timesheet = Timesheet::whereDate('start_time','=',$currentDate)->latest()->first();
        if($first_timesheet){
            $date1 = new Datetime($first_timesheet->start_time);
            $date2 = new Datetime($last_timesheet->end_time);
            $diff = $date2->diff($date1);
            $breaks = (($diff->h * 60) + $diff->i) - $hours;
        }

        $worked = $this->hoursandmins($hours);
        $breaks = $this->hoursandmins($breaks);
        // First Punch In in current day
        $first_punch_in = Timesheet::whereDate('start_time','=',$currentDate)->first();

        // return view('attendance/index', ['timesheets'=>$timesheets, 'schedule'=>$schedule, 'first_punch_in'=>$first_punch_in, 'worked'=>$worked, 'breaks'=>$breaks, 'first_timesheet'=>$first_timesheet, 'last_timesheet'=>$last_timesheet]);

    	$activities = view('attendance/ajax/activities', ['timesheets'=>$timesheets])->render();
        $statistics = view('attendance/ajax/statistics', ['schedule'=>$schedule, 'worked'=>$worked])->render();

    	return response()->json(['activities'=>$activities, 'statistics'=>$statistics]);

    }
}
