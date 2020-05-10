<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Invite;

class InviteController extends Controller
{
	//Redirect user to complete registration with his email
    public function accept($token)
	{
	    // Look up the invite
	    if (!$invite = Invite::where('token', $token)->first()) {
	        //if the invite doesn't exist do something more graceful than this
	        abort(404);
	    }

	    // create the user with the details from the invite
	    // User::create(['email' => $invite->email]);

	    // delete the invite so it can't be used again
	    // $invite->delete();

	    // here you would probably log the user in and show them the dashboard, but we'll just prove it worked

	    return view('auth.invite',['email'=> $invite->email]);
	}
}
