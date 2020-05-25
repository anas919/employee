<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Candidate;
use App\Interview;
use App\User;
use Hashids\Hashids;

class CandidateController extends Controller
{
    public function index(){
        $candidates = Candidate::all();
        $members = User::all();
        // dd($candidates);
		return view('candidates/index', ['candidates'=>$candidates, 'members'=>$members]);
	}
}
