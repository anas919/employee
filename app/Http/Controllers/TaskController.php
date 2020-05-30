<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Task;
use Datetime;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $req, $account)
    {

		$tasks = Task::where('member_id',Auth::user()->id)->orderBy('created_at','desc')->get()->groupBy(function($date) {
        	return Carbon::parse($date->created_at)->format('Y-m-d');
    	});
		$collection = $tasks;
		foreach ($collection as $day => $tasks) {
	    	foreach ($tasks as $task) {
	    		$task->duration = $this->getTimeInterval($task->start_time,$task->end_time);
	    	}
		}
    	return view('tasks.index',['collection'=>$collection]);
    }

    public function add(Request $req, $account){
    	$task = new Task();
    	$task->title = $req->title;
    	$task->start_time = date('Y-m-d H:i:s', strtotime($req->start_time));
    	$task->end_time = date("Y-m-d H:i:s", strtotime($req->start_time) + $req->seconds);
    	$task->member_id = Auth::user()->id;
    	$task->save();
        $task->duration = $this->getTimeInterval($task->start_time,$task->end_time);

    	return response()->json(['success'=>'Task added successfuly','task'=>$task]);
    }
    public function update(Request $req, $account){
    	$task = Task::find($req->task_id);
    	$task->description = $req->description;
    	$task->save();
    	return response()->json(['success'=>'Task Updated successfuly','task'=>$task]);
    }
    public function delete(Request $req, $account){
    	$task = Task::find($req->task_id);

    	$task->delete();
    	return response()->json(['success'=>'Task deleted successfuly']);

    }
    public function getTimeInterval($start_time, $end_time) {
        $end_time = new DateTime ($end_time);
        $start_time = new DateTime ($start_time);
        if ($end_time >= $start_time) {
            $timeDifference = date_diff ($end_time , $start_time);
        }
        $period = array (" second", " minute", " hour", " day", " month", " year");
        $periodValue= array ($timeDifference->format('%s'), $timeDifference->format('%i'), $timeDifference->format('%h'), $timeDifference->format('%d'), $timeDifference->format('%m'), $timeDifference->format('%y'));
        for ($i = 0; $i < count($periodValue); $i++) {
            if ($periodValue[$i] != 1) {
                $period[$i] .= "s";
            }
            if ($periodValue[$i] > 0) {
                $interval = $periodValue[$i].$period[$i];
            }
        }
        if (isset($interval)) {
            return $interval;
        } else {
            return "0 seconds";
        }
    }
}
