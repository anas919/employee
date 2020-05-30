<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Candidate;
use App\Interview;
use Hashids\Hashids;

class InterviewController extends Controller
{

	public function add(Request $req, $account) {
		$interview = new Interview();
		$candidate = Candidate::find($req->candidate);
		if($candidate){
			$interview->candidate_id = $candidate->id;
			$interview->offer_id = $candidate->offer->id;
			$interview->interviewer_id = $req->interviewer;
			$interview->date = date('Y-m-d H:i:s',strtotime($req->date));
			$interview->save();
			$hashid = new Hashids('interviews');
			$interview->room = $hashid->encode($interview->id);

			$interview->save();
			return redirect()->route('candidates', Auth::user()->subdomain)->with('success','Interview setup successfuly.');
		}else{
			return redirect()->route('candidates', Auth::user()->subdomain)->with('error','Error occured.');
		}
	}
	public function historyInterview(Request $req, $account, $candidate_id) {
		$candidate = Candidate::find($candidate_id);

		$interviews = $candidate->interviews;
		foreach ($interviews as $inter) {
			if($inter->interviewer->media_id){
				$inter->reference = $inter->interviewer->media->reference;
			}else{
				$inter->name = substr($inter->interviewer->first_name, 0, 1).substr($inter->interviewer->last_name, 0, 1);
			}
		}
		return response()->json(['interviews'=>$interviews]);
	}
}
