<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Tenant;
use App\User;
use App\Invite;
use App\Organization;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
			'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
		if($data['src'] == 'true'){
			if (!$invite = Invite::where('email', $data['email'])->first()) {
					abort(404);
			}
			//user who invite
            $inviter = User::find($invite->user_id);//Not implemented yet
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'number' => '0001',
                'email' => $data['email'],
                'subdomain' =>  $inviter->subdomain,
                'password' => bcrypt($data['password']),
            ]);
            Mail::to($data['email'])->send(new WelcomeMail($user));
            $invite->delete();
            return $user;
		}else{
			//Create user in general database
	        $user = User::create([
				'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
	            'email' => $data['email'],
	            'subdomain' => $data['subdomain'],
	            'password' => Hash::make($data['password']),
	        ]);
			//Create a tenant for user in general database
			$tenant = Tenant::create([
	            'name' => $data['subdomain'],
	            'domain' => $data['subdomain'].'.localhost',
	            'database' => $data['subdomain'],
	        ]);
			//Create sessions folder for subdomain
			File::makeDirectory(base_path().'/storage/framework/sessions/'.$tenant->id);
			Artisan::call('db:create '.$data['subdomain']);
			Artisan::call('tenants:migrate');
			Artisan::call('db:seed --class=RoleSeeder');
			Artisan::call('db:seed --class=CountrySeeder');
			Artisan::call('db:seed --class=PaymentrateSeeder');
			Artisan::call('db:seed --class=PaymentscheduleSeeder');
			Artisan::call('db:seed --class=PaymentmethodSeeder');
			Artisan::call('db:seed --class=RelationshipSeeder');
			//Create user in subdomain database
			$query = "INSERT INTO ".$data['subdomain'].".users (first_name, last_name, email, subdomain, password) VALUES ('".$user->first_name."','".$user->last_name."','".$user->email."','".$user->subdomain."','".$user->password."');";
			DB::statement($query);
			//Give user admin role
			$query = "INSERT INTO ".$data['subdomain'].".userroles (user_id, role_id) VALUES ('1','1');";
			DB::statement($query);
			//Create organization in subdomain db
			$query = "INSERT INTO ".$data['subdomain'].".organizations (phone, name) VALUES ('".$data['phone']."','".$data['org']."');";
			DB::statement($query);
			Mail::to($user->email)->send(new WelcomeMail($user));
			return $user;
		}
    }
}
