<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Tasklist;
use App\Card;
use App\Cardfile;
use App\Tenant;

class CardController extends Controller
{
    public function add(Request $req){
    	$tasklist = Tasklist::find($req->tasklist_id);

        $card = new Card();

		$card->tasklist_id = $req->tasklist_id;
        $card->title = $req->title;
        $card->priority = 'normal';

        $order = DB::table('cards')->where('tasklist_id', '=', $req->tasklist_id)->max('order');
        if($order)
        	$card->order = $order + 1;
        else
        	$card->order = 1;

        $card->save();
        return response()->json(['card' => $card]);
    }
    public function editCard(Request $req, $account, $card_id){
        $card = Card::find($card_id);

        if(count($card->members))
            $members = $card->members;
        else
            $members = 0;

        if($members){
            foreach($members as $member){
                if($member->media_id){
                    $member->reference = $member->media->reference;
                }else{
                    $member->name = substr($member->first_name, 0, 1).substr($member->last_name, 0, 1);
                }
            }
        }
        $card->attachedFiles = $card->files;

        return response()->json(['members'=>$members, 'card'=>$card]);
    }
    public function duplicateCard(Request $req, $account, $card_id) {
        $card = Card::find($card_id);

        $duplicatedCard = new Card();

        $duplicatedCard = $card->replicate();
        $duplicatedCard->save();

        $duplicatedCard->members()->attach($card->members);
        foreach ($card->files as $file) {

            Storage::disk('public')->copy($file->reference, 'Cards/'.date('m-Y').'/temp/'.$file->name);
            $file_to_copy = new File('storage/Cards/'.date('m-Y').'/temp/'.$file->name);
            $reference = Storage::disk('public')->putFile('Cards/'.date('m-Y'), $file_to_copy);

            Storage::disk('public')->delete('Cards/'.date('m-Y').'/temp/'.$file->name);

            Cardfile::create([
                'name'=>$file->name,
                'reference'=>$reference,
                'size'=>$file->size,
                'mime_type'=>$file->mime_type,
                'card_id'=>$duplicatedCard->id
            ]);
        }
        DB::select(DB::raw(
            "UPDATE cards SET `order` = `order` + 1 WHERE `order` >= ".$card_id." AND `tasklist_id` = ".$card->tasklist_id
        ));
        if(count($card->members))
            $members = $card->members;
        else
            $members = 0;

        if($members){
            foreach($members as $member){
                if($member->media_id){
                    $member->reference = $member->media->reference;
                }else{
                    $member->name = substr($member->first_name, 0, 1).substr($member->last_name, 0, 1);
                }
            }
        }
        return response()->json(['members'=>$members, 'card'=>$card]);
    }
    public function update(Request $req, $account){

        $card = Card::find($req->id);

        $card->members()->detach();
        if($req->members != null) {
            $card->members()->attach($req->members);
        }
        if($req->title)
            $card->title = $req->title;
        if($req->due_date)
            $card->due_date = date('Y-m-d',strtotime($req->due_date));

        $card->priority = $req->priority;
        if($req->description)
            $card->description = $req->description;

        $card->save();

        $members = $card->members;
        if(isset($members)){
            foreach($members as $member){
                if($member->media_id){
                    $member->reference = $member->media->reference;
                }else{
                    $member->name = substr($member->first_name, 0, 1).substr($member->last_name, 0, 1);
                }
            }
        }
        return response()->json(['members'=>$members, 'card'=>$card]);
    }
    public function fetchMembers(Request $req, $account, $card_id){
        $card = Card::find($card_id);
        if(count($card->members))
            $members = $card->members;
        else
            $members = 0;

        return response()->json(['members'=>$members]);
    }
    public function assignMembers(Request $req) {
        $card = Card::find($req->id);

        $card->members()->detach();
        if($req->members != null) {
            $card->members()->attach($req->members);
        }
        $card->save();

        $members = $card->members;
        if(isset($members)){
            foreach($members as $member){
                if($member->media_id){
                    $member->reference = $member->media->reference;
                }else{
                    $member->name = substr($member->first_name, 0, 1).substr($member->last_name, 0, 1);
                }
            }
        }
        return response()->json(['members'=>$members]);
    }
    public function dragDropUpdate(Request $req, $account){

        $card = Card::find($req->card_id);

        $card->tasklist_id = $req->target_tasklist;

        //
        if($req->previous_card != '0'){
            $previous_card = Card::find($req->previous_card);
            $t = $previous_card;
            $card->order = $previous_card->order;
            DB::select(DB::raw(
                "UPDATE cards SET `order` = `order` + 1 WHERE `id` <> ".$req->card_id." AND `order` >= ".$previous_card->order." AND `tasklist_id` = ".$card->tasklist_id
            ));
        } else {
            $t = '0';
            $last_card = DB::table('cards')->where('tasklist_id', '=', $req->target_tasklist)->max('order');
            $card->order = $last_card + 1;
        }

        $card->save();

        return response()->json(['success', 'Task updated']);
    }

    public function attachFile(Request $req, $account, $card_id){

        if($req->hasFile('attachedFile')){
            if($req->attachedFile->isValid()){
                $file = new Cardfile();

                $file->_card_id = $card_id;
                $file->_file = $req->file('attachedFile');
                $file->_path = 'Cards';

                $file->_save();
            }
        }
        if(isset($file))
            return response()->json(['status'=> 400, 'serverFileName'=>$file->reference]);
        else
             abort(500, 'cannot upload file');
    }

    public function deleteFile(Request $req, $account){
        $uploadedFiles = (json_decode(file_get_contents("php://input"), true));
        // var_dump(json_decode($req->files));

        foreach ($uploadedFiles as $key => $fileReference) {
            if($key == end($uploadedFiles)){
                // $cardFile = Cardfile::findByReference($fileReference);
                $cardFile = Cardfile::where('reference', '=', $fileReference)->first();
                $cardFile->delete();
            }
        }
        return response()->json(['uploadedFiles'=>$uploadedFiles]);
    }
    public function deleteCard(Request $req, $account, $card_id){
        $card = Card::find($card_id);
        $card->members()->detach();
        foreach ($card->files as $file) {
            $file->delete();
        }
        $card->delete();
        return response()->json(['success'=>'deleted']);
    }

	//Api Routes
	public function getCard(Request $request, $card_id)
	{
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
		$card = Card::find($card_id);
		return response()->json(['task'=>$card]);
	}
	public function addCard(Request $request) {
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
		$tasklist = Tasklist::find($request->tasklist_id);

        $card = new Card();

		$card->tasklist_id = $request->tasklist_id;
        $card->title = $request->title;
        $card->description = $request->description;
        $card->priority = 'normal';

        $order = DB::table('cards')->where('tasklist_id', '=', $request->tasklist_id)->max('order');
        if($order)
        	$card->order = $order + 1;
        else
        	$card->order = 1;

        $card->save();
        return response()->json(['card' => $card]);
	}
	public function updateCard(Request $request) {
		$tenant = Tenant::where('database',$request->user()->subdomain)->first();
        if($tenant)
            $tenant->configure()->use();
		$card = Card::find($request->id);

        $card->title = $request->title;
        $card->description = $request->description;
        $card->priority = $card->priority;

        $card->save();
        return response()->json(['card' => $card]);
	}
}
