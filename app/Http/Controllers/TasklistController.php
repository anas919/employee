<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Tasklist;
use App\Board;
use App\Card;
use App\Cardfile;

class TasklistController extends Controller
{
    public function add(Request $req){
     	$board = Board::find($req->board_id);

        $tasklist = new Tasklist();

  		$tasklist->board_id = $board->id;
        $tasklist->title = $req->name;
        $tasklist->status = 'opened';

        $order = DB::table('tasklists')->where('board_id', '=', $req->board_id)->max('order');
        if($order)
         $tasklist->order = $order + 1;
        else
         $tasklist->order = 1;

        $tasklist->save();
        return response()->json(['tasklist' => $tasklist]);
    }

    public function update(Request $req, $account){


        $tasklist = Tasklist::find($req->id);
        $tasklist->title = $req->title;
        $tasklist->save();

        return response()->json(['success'=>'Updated']);
    }
    public function dragDropUpdate(Request $req, $account){
		if($req->target_tasklist == 'no_previous'){
			$source_tasklist = Tasklist::find($req->source_tasklist);
			$source_tasklist->order = 1;
			$source_tasklist->save();
			DB::select(DB::raw(
	            "UPDATE tasklists SET `order` = `order` + 1 WHERE `id` <> ".$source_tasklist->id." AND `order` >= ".$source_tasklist->order
	        ));
		}else{
			$source_tasklist = Tasklist::find($req->source_tasklist);
	        $target_tasklist = Tasklist::find($req->target_tasklist);

	        $source_tasklist->order = $target_tasklist->order + 1;
	        $source_tasklist->save();
	        DB::select(DB::raw(
	            "UPDATE tasklists SET `order` = `order` + 1 WHERE `id` <> ".$source_tasklist->id." AND `order` >= ".$source_tasklist->order
	        ));
		}

        return response()->json(['success', 'Task updated']);
    }
    public function duplicateTasklist(Request $req, $account, $tasklist_id){
        $tasklist = Tasklist::find($tasklist_id);

        $duplicatedList = new Tasklist();
        $duplicatedList = $tasklist->replicate();
        $duplicatedList->order = $tasklist->order + 1;
        $duplicatedList->save();

        DB::select(DB::raw(
            "UPDATE tasklists SET `order` = `order` + 1 WHERE `id` <> ".$duplicatedList->id." AND `order` >= ".$duplicatedList->order
        ));

        foreach ($tasklist->cards as $card) {
            $card = Card::find($card->id);

            $duplicatedCard = new Card();

            $duplicatedCard = $card->replicate();
            $duplicatedCard->tasklist_id = $duplicatedList->id;
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
        }

        return response()->json(['tasklist'=>$tasklist]);
    }
}
