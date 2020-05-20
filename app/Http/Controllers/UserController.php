<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\User;
use App\Project;
use App\Media;
use App\Role;
use App\Country;
use App\Department;
use App\Job;
use App\Paymentschedule;
use App\Paymentrate;
use App\Paymentmethod;
use App\Invite;
use App\Mail\WelcomeMail;
use App\Mail\InvitationMail;
use App\Tenant;

class UserController extends Controller
{
	public function index(){
    	$user = new User();
    	$members = User::all();
    	$roles = Role::all();
    	$countries = Country::all();
    	$departments = Department::all();
        $jobs = Job::all();
    	$paymentschedules = Paymentschedule::all();
    	$paymentrates = Paymentrate::all();
    	$paymentmethods = Paymentmethod::all();
    	$projects = Project::all();

        return view('members/index', ['user'=>$user,'members'=>$members,'roles'=>$roles,'countries'=>$countries,'departments'=>$departments,'jobs'=>$jobs,'paymentschedules'=>$paymentschedules,'paymentrates'=>$paymentrates,'paymentmethods'=>$paymentmethods,'projects'=>$projects]);
    }
	public function add(Request $req){
    	$user = new User();
		$user->number = $req->number;
		$user->first_name = $req->first_name;
		$user->last_name = $req->last_name;
		$user->email = $req->email;

		$arr = explode('/', $req->birth_date);
		$req->birth_date = implode("-", array_reverse($arr));
		$user->birth_date = $req->birth_date;

		$user->gender = $req->gender;
		$user->marital_status = $req->marital_status;
		$user->address = $req->address;
		$user->city = $req->city;
		$user->province = $req->province;
		$user->postal_code = $req->postal_code;
		$user->phone = $req->phone;
		$user->paymentschedule_id = $req->paymentschedule;
		$user->paymentrate_id = $req->paymentrate;
		$user->paymentmethod_id = $req->paymentmethod;

		$arr = explode('/', $req->hire_date);
		$req->hire_date = implode("-", array_reverse($arr));
		$user->hire_date = $req->hire_date;

		$user->status = $req->status;
		$user->self_service_access = $req->self_service_access;
		$user->country_id = $req->country;
		$user->job_id = $req->job;
		$user->department_id = $req->department;
		if($req->notes)
			$user->notes = $req->notes;
		if($req->linkedin)
			$user->linkedin = $req->linkedin;
		if($req->twitter)
			$user->twitter = $req->twitter;
		if($req->facebook)
			$user->facebook = $req->facebook;
		if($req->visa_id)
			$user->visa_id = $req->visa_id;
		// if($req->hasFile('image'))
			// $user->image = $req->file('image')->store('public/Members');

		if($req->hasFile('image')){
			$media = new Media();
            if($user->media_id)
                $media = Media::find($user->media_id);

            $media->_file = $req->file('image');
            $media->_path = 'Members';
            $media = $media->_save();

            if($media)
                $user->media_id = $media->id;
	    }

		if($req->password)
			$user->password = bcrypt($req->password);

		$user->save();

		return redirect()->route('members');
    }
	public function invite(Request $req) {
    	$emails = preg_split('/\r\n|[\r\n]/', $req->email);

    	foreach ($emails as $email) {
    		do {
		        $token = Str::random();
		    } //check if the token already exists and if it does, try again
		    while (Invite::where('token', $token)->first());

		    //create a new invite record
		    $invite = Invite::create([
		        'email' => $email,
		        'token' => $token,
		        'user_id' => Auth::user()->id,
		    ]);

		    // send the email
		    Mail::to($email)->send(new InvitationMail($invite));
    	}
	    // redirect back where we came from
	    return redirect()->route('members', Auth::user()->subdomain);
    }
	public function update(Request $req) {
		$user = User::find($req->id);
		$user->number = $req->number;
		$user->first_name = $req->first_name;
		$user->last_name = $req->last_name;
		$user->email = $req->email;

		$user->birth_date = date('Y-m-d',strtotime($req->birth_date));

		$user->gender = $req->gender;
		$user->marital_status = $req->marital_status;
		$user->address = $req->address;
		$user->city = $req->city;
		$user->province = $req->province;
		$user->postal_code = $req->postal_code;
		$user->phone = $req->phone;
		$user->paymentschedule_id = $req->paymentschedule;
		$user->paymentrate_id = $req->paymentrate;
		$user->paymentmethod_id = $req->paymentmethod;

		$user->hire_date = date('Y-m-d',strtotime($req->hire_date));

		$user->status = $req->status;
		$user->self_service_access = $req->self_service_access;
		$user->country_id = $req->country;
		$user->job_id = $req->job;
		$user->department_id = $req->department;
		if($req->notes)
			$user->notes = $req->notes;
		if($req->linkedin)
			$user->linkedin = $req->linkedin;
		if($req->twitter)
			$user->twitter = $req->twitter;
		if($req->facebook)
			$user->facebook = $req->facebook;
		if($req->visa_id)
			$user->visa_id = $req->visa_id;
		if($req->hasFile('image')){
			$media = new Media();
            if($user->media_id)
                $media = Media::find($user->media_id);
            $media->_file = $req->file('image');
            $media->_path = 'Members';
            $media = $media->_save();
            if($media)
                $user->media_id = $media->id;
	    }
		if($req->password)
			$user->password = bcrypt($req->password);
		$member = User::find($user->id);
		$user->save();
		$countries = Country::all();
    	$departments = Department::all();
        $jobs = Job::all();
    	$paymentschedules = Paymentschedule::all();
    	$paymentrates = Paymentrate::all();
    	$paymentmethods = Paymentmethod::all();
		session()->flash('success', 'Informations updated successfully');
		return redirect()->route('edit',['member_id' => $member->id]);
	}
	public function search(Request $req) {
		// $name = $req->name;
		// $members = User::where(function ($query) {
		//     				$query->where('organization_id', '=', Auth::user()->organization_id);
		// 				})->where(function ($query) use ($name) {
		// 				    $query->whereRaw('LOWER(`first_name`) LIKE ? ',[trim(strtolower($name)).'%'])
		// 				    	->orwhereRaw('LOWER(`last_name`) LIKE ? ',[trim(strtolower($name)).'%'])
		// 				    ;
		// 				})->with('organization')->get();
		// return response()
        //     ->json(['members' => $members]);
	}
	public function editMember(Request $req, $account,$member_id) {
		$member = User::find($member_id);

		$countries = Country::all();
    	$departments = Department::all();
        $jobs = Job::all();
    	$paymentschedules = Paymentschedule::all();
    	$paymentrates = Paymentrate::all();
    	$paymentmethods = Paymentmethod::all();

		return view('members/edit',['member'=>$member,'countries'=>$countries,'departments'=>$departments,'jobs'=>$jobs,'paymentschedules'=>$paymentschedules,'paymentrates'=>$paymentrates,'paymentmethods'=>$paymentmethods]);
	}
	public function setTheme(Request $req, $org_id) {
		$user = User::find(Auth::user()->id);
		if($req->pref_theme == '1')
			$user->pref_theme = '0';
		else
			$user->pref_theme = '1';
		$user->save();
		return response()->json(['success'=>'Theme Changed']);
	}
    public function beforeLogin(Request $req)
    {
    	return view('before_login');
    }
	public function redirecttoLogin(Request $req)
	{
		$user = User::whereEmail($req->email)->first();

		if($user){
			return redirect('http://'.$user->subdomain.'.localhost:8000/login')->with('email', $user->email);
		}
		else {
			return redirect()->back()->withInput();
		}
	}
	//Api
	public function tasks(Request $request){
        // $user = User::find($request->user()->id);
        $tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
        $user = User::where('subdomain',$request->user()->subdomain)->first();

        return response()
            ->json(['tasks' => $user->membercards,'name' => $user->first_name]);
    }
	//Api Routes
	public function members(Request $request)
	{
		// $user = User::find($request->user()->id);
        $tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
        $user = User::where('subdomain',$request->user()->subdomain)->first();
		if($user->hasRole('Admin')){
			$users = User::with('media')->get();
			return response()
	            ->json(['members' => $users]);
		}
		return response()
			->json(['denied' => '$users']);
	}
}
