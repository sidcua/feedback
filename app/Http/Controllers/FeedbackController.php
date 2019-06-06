<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Session;
use Validator;

class FeedbackController extends Controller
{
    public function selectOffice(Request $request){
        $office = $request->office;
        if ($office){
            session()->put('office', $office);
        }
        return response()->json($office);
    }

    public function submitFeedback(Request $request){
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'name' => 'max:100',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if ($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $feedback = new Feedback;
            $feedback->fill($request->all());
            if ($request->comment){
                $feedback->comment = $request->comment;
            }
            if ($request->name){
                $feedback->name = $request->name;
            }
            $feedback->office = session()->get('office');
            $feedback->save();
        }
        return response()->json($response);
    }
}
