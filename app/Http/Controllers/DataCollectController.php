<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\PhoneNumbersModel;
use Illuminate\Http\Request;

class DataCollectController extends Controller
{
    public function DataCollectStore(Request $request)
    {
        $data = json_decode($request->get('data'));
        $totalNumberAdded = 0;
        $totalCommentInsert = 0;

        if ($data) {
            foreach ($data as $key => $value) {
                $findOldPhone = PhoneNumbersModel::where('number', $value->phone)->first();
                if (!$findOldPhone) {
                    $findOldPhone = new PhoneNumbersModel();
                    $findOldPhone->number = $value->phone;
                    $findOldPhone->name = $value->name;
                    $findOldPhone->save();
                    $totalNumberAdded++;
                }
                $comments = CommentsModel::where([['phone_table_id', '=', $findOldPhone->phone_number_id], ['comments', '=', $value->comment]])->first();
                if (!$comments) {
                    $comments = new CommentsModel();
                    $comments->comments = $value->comment;
                    $comments->phone_table_id = $findOldPhone->phone_number_id;
                    $comments->submitted_date = $value->date;
                    $comments->source = 'st_fast';
                    $comments->user_id = null;
                    $comments->save();
                    $totalCommentInsert++;
                }
            }
        }

        //dd($data);
        return response()->json([
            'is_success' => true,
            'number_insert' => $totalNumberAdded,
            'comment_insert' => $totalCommentInsert,
        ]);
    } // End Method
}
