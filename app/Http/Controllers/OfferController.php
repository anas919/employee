<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\Activity;
use App\Offerquestion;
use App\Country;
use App\Department;
use App\Job;
use App\User;
use App\Candidate;
use App\CandidateResponse;
use App\Media;
use App\Resume;
use App\Organization;
use App\Tenant;
use Hashids\Hashids;

class OfferController extends Controller
{
    public function index(){

		$countries = Country::all();
    	$departments = Department::all();
        $jobs = Job::all();
    	$members = User::all();
        $offers = Offer::all();

		return view('offers/index', ['offers'=>$offers,'countries'=>$countries,'departments'=>$departments,'jobs'=>$jobs,'members'=>$members]);
	}
	public function add(Request $req) {
		$offer = new Offer();
		$offer->title = $req->title;
		$offer->responsible_id = $req->responsible;
		$offer->status = $req->status;
		$offer->description = $req->description;
		$offer->qualifications = $req->qualifications;
		$offer->department_id = $req->department;
		$offer->type = $req->type;
		$offer->experience = $req->experience;
		$offer->country_id = $req->country;
		$offer->city = $req->city;
		$offer->compentation = $req->compentation;
		if($req->resume == 'on' && $req->resume_required == 'y')
			$offer->resume = '2';
		elseif($req->resume == 'on' && $req->resume_required == 'n')
			$offer->resume = '1';
		if($req->cover_letter == 'on' && $req->cover_letter_required == 'y')
			$offer->cover_letter = '2';
		elseif($req->cover_letter == 'on' && $req->cover_letter_required == 'n')
			$offer->cover_letter = '1';
		if($req->portfolio == 'on' && $req->portfolio_required == 'y')
			$offer->portfolio = '2';
		elseif($req->portfolio == 'on' && $req->portfolio_required == 'n')
			$offer->portfolio = '1';
		if($req->desired_salary == 'on' && $req->desired_salary_required == 'y')
			$offer->desired_salary = '2';
		elseif($req->desired_salary == 'on' && $req->desired_salary_required == 'n')
			$offer->desired_salary = '1';

		$offer->save();
		$activity = new Activity();
		$activity->module = 'offers';
		$activity->activity = 'Create Offer under title "'.$offer->title.'"';
		$activity->user_id = Auth::user()->id;
		$activity->save();
		if(isset($req->opt_questions)){
			foreach ($req->opt_questions as $question) {
				$offerquestion = new Offerquestion();
				$offerquestion->question = $question;
				$offerquestion->required = '0';
				$offerquestion->offer_id = $offer->id;
				$offerquestion->save();
			}
		}
		if(isset($req->req_questions)){
			foreach ($req->req_questions as $question) {
				$offerquestion = new Offerquestion();
				$offerquestion->question = $question;
				$offerquestion->required = '1';
				$offerquestion->offer_id = $offer->id;
				$offerquestion->save();
			}
		}
		return redirect()->route('offers', Auth::user()->subdomain)->with('success','Offer Created Successefuly');
	}
	public function getShareableLink(Request $req, $account, $offer_id){

        $offer = Offer::find($offer_id);
        $hashid = new Hashids('offers');
		$offer->link = $hashid->encode($offer_id);
		$offer->save();

		return response()->json(['url'=>$offer->link]);
	}
	public function viewOffer(Request $req, $account, $offer_id){
        $hashid = new Hashids('offers');
		$offer_id = $hashid->decode($offer_id);

		$offer = Offer::find($offer_id);

		if(count($offer)){
			$countries = Country::all();
			$company = Organization::find(1);
			return view('offers/apply',['offer'=>$offer[0], 'countries'=>$countries, 'company'=>$company->name, 'account'=>$account]);
		}
		else{
			abort(404, 'Page not Found.');
		}
	}
	public function applyOffer(Request $req, $account){

		$hashid = new Hashids('offers');
		$offer_id = $hashid->decode($req->offer);
		$offer = Offer::find($offer_id);
		if(count($offer) and $offer[0]->status == 'opened'){
			$candidate = new Candidate();

			$candidate->first_name = $req->first_name;
			$candidate->last_name = $req->last_name;
			$candidate->email = $req->email;
			$candidate->phone = $req->phone;
			$candidate->address = $req->address;
			$candidate->city = $req->city;
			if($req->ckeditor1)
				$candidate->cover_letter = $req->ckeditor1;
			if($req->ckeditor2)
				$candidate->portfolio = $req->ckeditor2;
			if($req->desired_salary)
				$candidate->desired_salary = $req->desired_salary;

			$candidate->country_id = $req->country;
			$candidate->offer_id = $offer_id[0];

			if($req->hasFile('picture')){
				$media = new Media();

	            $media->_file = $req->file('picture');
	            $media->_path = 'Candidates';
	            $media = $media->_save();

	            if($media)
	                $candidate->media_id = $media->id;
		    }
		    if($req->hasFile('resume')){
				$resume = new Resume();

	            $resume->_file = $req->file('resume');
	            $resume->_path = 'Resumes';
	            $resume = $resume->_save();

	            if($resume)
	                $candidate->resume_id = $resume->id;
		    }
		    $candidate->save();
			if(isset($req->responses)){
				foreach ($req->responses as $key => $response) {
					$candidateresponse = new CandidateResponse();
					$candidateresponse->offerquestion_id = $key;
					$candidateresponse->candidate_id = $candidate->id;
					$candidateresponse->response = $response;
					$candidateresponse->save();
				}
			}
			// $company = Organization::find(1);
		    return redirect()->route('view-offer', ['account'=>$account, 'offer_id'=>$req->offer])->with('success','You\'re apply has been sent successfuly.');
		}else{
			return redirect()->route('view-offer', ['account'=>$account, 'offer_id'=>$req->offer])->with('error','Offer expired');
		}
	}
	public function closeOffer(Request $req, $account, $offer_id) {
		$offer = Offer::find($offer_id);

		$offer->status = 'closed';
		$offer->save();

		return response()->json(['success'=>'The Offer '.$offer->title.' Marked as closed']);
	}
	public function openOffer(Request $req, $account, $offer_id) {
		$offer = Offer::find($offer_id);

		$offer->status = 'opened';
		$offer->save();

		return response()->json(['success'=>'The Offer '.$offer->title.' Marked as opened']);
	}
	public function getCandidates(Request $req, $account, $offer_id)
	{
		$offer = Offer::find($offer_id);
		foreach ($offer->candidates as $candidate) {
			$candidate->resume = $candidate->resume->reference;
		}
		return response()->json(['candidates'=>$offer->candidates]);
	}
	public function deleteOffer(Request $req, $account, $offer_id) {
		$offer = Offer::find($offer_id);

		$offer->delete();

		return response()->json(['success'=>'The Offer '.$offer->title.' has been deleted successfuly']);
	}
}
