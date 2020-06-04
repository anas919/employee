<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;
use App\Board;
use App\Organization;
use App\User;

class BoardController extends Controller
{
    public function index(Request $req, $account) {

    	$projects = Project::all();
    	$boards = Board::all();

        return view('boards/index', ['projects'=>$projects, 'boards'=>$boards]);
    }
    public function add(Request $req, $account){

        $board = new Board();
        $board->project_id = $req->project;
        $board->title = $req->title;
        $board->status = 'opened';

        $board->save();
        return redirect()->route('boards', Auth::user()->subdomain)->with('success','Board Created Successefuly');
    }
    public function details(Request $req, $account, $id){

        $board = Board::find($id);

        if(!isset($board))
            abort(404);

        $members = User::all();

        return view('boards/view1', ['board'=>$board, 'members'=>$members]);
    }
}
