<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;
use App\Project;
use App\Client;
use App\Team;
use App\Tenant;

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
    //Api routes
    public function projects(Request $request){
        // $user = User::find($request->user()->id);
        $tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
        $user = User::where('subdomain',$request->user()->subdomain)->first();
        $unique_ids = array();
        $projects = array();
        foreach ($user->memberteams as $team) {
            foreach($team->projects as $project){
                if(!in_array($project->id, $unique_ids))
                    array_push($projects, $project);
                array_push($unique_ids, $project->id);
            }
        }

        return response()
            ->json(['projects' => $projects,'name' => $user->first_name]);
    }
	public function boards(Request $request, $projectId)
	{
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
        $user = User::where('subdomain',$request->user()->subdomain)->first();
		$project = Project::find($projectId);
		$boards = $project->boards;
		foreach ($boards as $board) {
			$board->tasklists = $board->tasklists;
			foreach ($board->tasklists as $tasklist) {
				$tasklist->cards = $tasklist->cards;
			}
		}
		return response()
			->json(['boards'=>$boards]);
	}
}
