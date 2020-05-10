<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Team;
use App\User;
use App\Project;

class TeamController extends Controller
{
    public function index() {
    	$projects = Project::all();
    	$members = User::all();
    	$teams = Team::all();

        return view('teams/index', ['teams'=>$teams, 'members'=>$members, 'projects'=>$projects]);
    }
    public function add(Request $req){
    	$team = new Team();
    	$team->name = $req->name;

    	$team->save();
		if($req->team_leaders)
            $team->leads()->attach($req->team_leaders);
		if($req->team_members)
            $team->members()->attach($req->team_members);
        if($req->projects)
            $team->projects()->attach($req->projects);

		return redirect()->route('teams', Auth::user()->subdomain);
    }
    public function editTeam(Request $req, $account, $team_id) {
        $team = Team::find($team_id);
        if(count($team->leads))
            $leads = $team->leads;
        else
            $leads = 0;
        if(count($team->members))
            $members = $team->members;
        else
            $members = 0;
        if(count($team->projects))
            $projects = $team->projects;
        else
            $projects = 0;

        return response()->json(['team'=>$team, 'leads'=>$leads, 'members'=>$members, 'projects'=>$projects]);
    }
    public function update(Request $req) {
        $team = Team::find($req->id);
        $team->name = $req->name;

        $team->leads()->detach();
        if($req->leads != null) {
            $team->leads()->attach($req->leads);
        }
        $team->members()->detach();
        if($req->members != null) {
            $team->members()->attach($req->members);
        }
        $team->projects()->detach();
        if($req->projects != null) {
            $team->projects()->attach($req->projects);
        }
        $team->save();

        return response()->json(['result'=>'Tout passe bien']);
    }
}
