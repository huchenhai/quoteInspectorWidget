<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MessageModel;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
class MessageController extends Controller
{
    //
    /**
     * @param $sub_num
     */

    function getMessage(Request $request)
    {
        if ($request->isMethod('get')) {
            $sub_num = $request->get('sub_num');
            if($message = MessageModel::where('submission_number', $sub_num)->first()) {

                $data = ['clean' => $message->comments, 'status' => 1, 'sub_num' => $sub_num];
                return view('input')->with($data);
            }
            else echo"Wrong submission number, please check it again";
//            if ($update != 1) {
//                echo "Updating Error";
//            } else echo "Updating success, effected rows =" . $update;

//        $messages = DB::table('x_message')->where('submission_number',$sub_num)->first();
//
//            echo $messages->comments;
        }

    }

    function postMessage()
    {
        $sub_num = Input::get('pk');
        $newComments = str_replace("\"", "'", Input::get('value'));
          if($update = DB::table('x_message')->where('submission_number', $sub_num)->update(['comments' => $newComments])) {
             $updated = MessageModel::where('submission_number', $sub_num)->first();
              $data = ['clean' => $updated->comments, 'status' => 1, 'sub_num' => $sub_num];

              return Response::json($data);
          }
          else echo $update;

    }




}
