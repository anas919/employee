<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Card;
use App\Tasklist;
use App\Project;
use App\Tenant;
use Datetime;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $req, $account)
    {
        $cards = Auth::user()->membercards()->orderBy('created_at','desc')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        });
		$collection = $cards;
		foreach ($collection as $day => $cards) {
	    	foreach ($cards as $card) {
                if($card->start_time && $card->end_time){
	    		    $card->duration = $this->getTimeInterval($card->start_time,$card->end_time);
                }elseif($card->due_date){
                    $card->duration = 'Due at '.(new DateTime($card->due_date))->format('M d,Y');
                }else{
                    $card->duration = 'Created at '.(new DateTime($card->created_at))->format('M d,Y');
                }
	    	}
		}
        $projects = Project::all();
    	return view('tasks.index',['collection'=>$collection, 'projects'=>$projects]);
    }

    public function add(Request $req, $account){
    	$card = new Card();
    	$card->title = $req->title;
        if($req->project != ''){
            $card->project_id = $req->project;
        }
    	$card->start_time = date('Y-m-d H:i:s', strtotime($req->start_time));
    	$card->end_time = date("Y-m-d H:i:s", strtotime($req->start_time) + $req->seconds);
        $card->priority = 'normal';

        $order = DB::table('cards')->where('tasklist_id', '=', $req->tasklist_id)->max('order');
        if($order)
            $card->order = $order + 1;
        else
            $card->order = 1;
    	$card->save();
        $card->members()->attach(Auth::user()->id);
        $card->duration = $this->getTimeInterval($card->start_time,$card->end_time);

    	return response()->json(['success'=>'Task added successfuly','task'=>$card]);
    }
    public function editTask(Request $req, $account, $task_id){
        $task = Card::find($task_id);

        return response()->json(['task'=>$task]);
    }
    public function update(Request $req, $account){
    	$task = Card::find($req->id);
        if($req->description != '')
    	   $task->description = $req->description;
        if($req->start_time != '')
            $task->start_time = date('Y-m-d H:i:s',strtotime($req->start_time));
        else
            $task->start_time = null;
        if($req->end_time != '')
            $task->end_time = date('Y-m-d  H:i:s',strtotime($req->end_time));
        else
            $task->end_time = null;

    	$task->save();

    	return response()->json(['success'=>'Task Updated successfuly','task'=>$task]);
    }
    public function assignLists(Request $req, $account)
    {
        $task = Card::find($req->task_id);
        $list = Tasklist::find($req->list_id);
        if($list->id)
            $task->tasklist_id = $list->id;
        $task->save();
        return response()->json(['success'=>'Task assigned to list '.$list->title]);
    }
    public function delete(Request $req, $account){
        $card = Card::find($req->task_id);
        $card->members()->detach();
        foreach ($card->files as $file) {
            $file->delete();
        }
        $card->delete();
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
    //api
    public function addBlindTask(Request $req)
    {
        $tenant = Tenant::where('database',$req->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
        $task = new Task();
        $task->title = $req->title;
        $task->start_time = date('Y-m-d H:i:s', strtotime($req->start_time));
        $task->end_time = date("Y-m-d H:i:s", strtotime($req->start_time) + $req->seconds);
        $task->member_id = Auth::user()->id;
        $task->save();
        $task->duration = $this->getTimeInterval($task->start_time,$task->end_time);

        return response()->json(['success'=>'Task added successfuly','task'=>$task]);
    }
}
