<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Offer;
use App\Country;
use App\Department;
use App\Job;
use App\User;
use App\Candidate;
use App\Media;
use App\Resume;
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
		$offer->description = $req->ckeditor1;
		$offer->qualifications = $req->ckeditor2;
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
			return view('offers/apply',['offer'=>$offer[0], 'countries'=>$countries]);
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

		    return redirect()->route('view-offer', ['subdomain'=>Auth::user()->subdomain, 'offer_id'=>$req->offer])->with('success','You\'re apply has been sent successfuly.');
		}else{
			return redirect()->route('view-offer', ['subdomain'=>Auth::user()->subdomain, 'offer_id'=>$req->offer])->with('error','Offer expired');
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
	public function deleteOffer(Request $req, $account, $offer_id) {
		$offer = Offer::find($offer_id);

		$offer->delete();

		return response()->json(['success'=>'The Offer '.$offer->title.' has been deleted successfuly']);
	}
}
