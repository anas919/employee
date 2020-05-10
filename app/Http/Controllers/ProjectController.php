<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Project;
use App\Client;
use App\Team;

class ProjectController extends Controller
{
    public function index() {
    	$members = User::all();
    	$clients = Client::all();
    	$teams = Team::all();
    	$projects = Project::all();

        return view('projects/index', ['projects'=>$projects, 'clients'=>$clients, 'members'=>$members, 'teams'=>$teams]);
    }
    public function add(Request $req){
    	$project = new Project();
    	$project->name = $req->name;
    	$project->client_id = $req->client;
    	$project->description = $req->ckeditor1;

		$project->start_date = date('Y-m-d',strtotime($req->start_date));
		$project->end_date = date('Y-m-d',strtotime($req->end_date));

    	$project->save();
		if($req->teams)
            $project->teams()->attach($req->teams);

		return redirect()->route('projects', Auth::user()->subdomain);
    }
    public function editProject(Request $req, $account, $project_id) {
        $project = Project::find($project_id);

        if(count($project->teams))
            $teams = $project->teams;
        else
            $teams = 0;

        if($project->client)
        	$client = $project->client;
        else
        	$client = 0;

        return response()->json(['project'=>$project, 'teams'=>$teams, 'client'=>$client]);
    }
    public function update(Request $req) {
        $project = Project::find($req->id);
        $project->name = $req->name;
        $project->client_id = $req->client;
		$project->description = $req->description;

		$project->start_date = date('Y-m-d',strtotime($req->start_date));
		$project->end_date = date('Y-m-d',strtotime($req->end_date));

        $project->teams()->detach();
        if($req->teams != null) {
            $project->teams()->attach($req->teams);
        }
		$project->save();

        return response()->json(['result'=>'Tou passe bien']);
    }
}
