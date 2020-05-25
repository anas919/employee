<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Client;
use App\Media;
use App\User;

class ClientController extends Controller
{
    public function index(){
    	$clients = Client::all();

        return view('clients/index', ['clients'=>$clients]);
    }
    public function add(Request $req){
    	$client = new Client();
		$client->number = $req->number;
		$client->name = $req->name;
		$client->email = $req->email;
		$client->phone = $req->phone;
		$client->company_name = $req->company_name;
		$client->description = $req->description;
		$client->status = 'active';

		if($req->hasFile('company_logo')){
			$media = new Media();
            if($client->media_id)
                $media = Media::find($client->media_id);

            $media->_file = $req->file('company_logo');
            $media->_path = 'Clients';
            $media = $media->_save();

            if($media)
                $client->media_id = $media->id;
	    }

		$client->save();

		return redirect()->route('clients', Auth::user()->subdomain);
    }
    public function editClient(Request $req, $account,$client_id) {
		$client = Client::find($client_id);

		return view('clients/edit',['client'=>$client]);
	}
	public function update(Request $req) {
		$client = Client::find($req->id);

		$client->number = $req->number;
		$client->name = $req->name;
		$client->email = $req->email;
		$client->phone = $req->phone;
		$client->company_name = $req->company_name;
		$client->description = $req->description;
		$client->status = 'active';

		if($req->hasFile('company_logo')){
			$media = new Media();
            if($client->media_id)
                $media = Media::find($client->media_id);

            $media->_file = $req->file('company_logo');
            $media->_path = 'Clients';
            $media = $media->_save();

            if($media)
                $client->media_id = $media->id;
	    }

		$member = User::find($client->id);

		$client->save();

		session()->flash('success', 'Client updated successfully');

		return redirect()->route('edit-client',['account' => Auth::user()->subdomain, 'client_id' => $client->id]);
	}
}
