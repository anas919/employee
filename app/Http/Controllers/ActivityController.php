<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;
use Datetime;

class ActivityController extends Controller
{
    public function index(Request $req)
    {
    	$activities = Activity::all();
    	foreach ($activities as $key => $activity) {
    		$activity->date = $this->getTimeInterval($activity->created_at);
    	}
    	return view('activities.index',['activities'=>$activities]);
    }
    public function details(Request $req, $account, $member_id)
    {
        $activities = Activity::where('user_id',$member_id)->get();
        foreach ($activities as $key => $activity) {
            $activity->date = $this->getTimeInterval($activity->created_at);
        }
        $member = User::find($member_id);
        return view('activities.details',['activities'=>$activities,'member'=>$member]);
    }
    public function getTimeInterval($date) {
        $date = new DateTime ($date);
        $now = date ('Y-m-d H:i:s', time());
        $now = new DateTime ($now);
        if ($now >= $date) {
            $timeDifference = date_diff ($date , $now);
            $tense = " ago";
        } else {
            $timeDifference = date_diff ($now, $date);
            $tense = " until";
        }
        $period = array (" second", " minute", " hour", " day", " month", " year");
        $periodValue= array ($timeDifference->format('%s'), $timeDifference->format('%i'), $timeDifference->format('%h'), $timeDifference->format('%d'), $timeDifference->format('%m'), $timeDifference->format('%y'));
        for ($i = 0; $i < count($periodValue); $i++) {
            if ($periodValue[$i] != 1) {
                $period[$i] .= "s";
            }
            if ($periodValue[$i] > 0) {
                $interval = $periodValue[$i].$period[$i].$tense;
            }
        }
        if (isset($interval)) {
            return $interval;
        } else {
            return "0 seconds" . $tense;
        }
    }
    
}
