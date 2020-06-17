<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Policy;
use App\Timeoff;

class TimeoffController extends Controller
{
    public function index(){
    	$members = User::all();
    	$policies = Policy::all();
    	if(Auth::user()->hasPermission('view_timeoffs'))
    		$timeoffs = Timeoff::all();
    	else
    		$timeoffs = Timeoff::where('member_id',Auth::user()->id)->get();

		return view('timeoffs/index', ['members'=>$members, 'policies'=>$policies, 'timeoffs'=>$timeoffs]);
	}
	public function add(Request $req, $account) {
        if($req->timeoff_members){
            foreach ($req->timeoff_members as $member) {
    			$timeoff = new Timeoff();

    			$timeoff->member_id = $member;
    			$timeoff->policy_id = $req->policy;
    			$timeoff->reason = $req->reason;
    			$timeoff->start_date = date('Y-m-d',strtotime($req->start_date));
    			$timeoff->end_date = date('Y-m-d',strtotime($req->end_date));

    			$timeoff->save();
    		}
        }else{
            $timeoff = new Timeoff();

            $timeoff->member_id = Auth::user()->id;
            $timeoff->reason = $req->reason;
            $timeoff->start_date = date('Y-m-d',strtotime($req->start_date));
            $timeoff->end_date = date('Y-m-d',strtotime($req->end_date));

            $timeoff->save();
        }

		return redirect()->route('timeoffs', Auth::user()->subdomain)->with('success','Timeoffs created Successefuly');
	}
	public function addPolicy(Request $req, $account) {
		$policy = new Policy();

		$policy->name = $req->name;
		$policy->amount = $req->amount;
		if($req->approval == 'on')
			$policy->approval = 'y';
		else
			$policy->approval = 'n';
		if($req->timeoff_paid == 'on')
			$policy->timeoff_paid = 'y';
		else
			$policy->timeoff_paid = 'n';

		$policy->save();

		if($req->policy_members)
            $policy->members()->attach($req->policy_members);

        return redirect()->route('timeoffs', Auth::user()->subdomain)->with('success','Policy Created Successefuly');
	}
}
