<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\Entity;
use Session;
use Validator;

class FeedbackController extends Controller
{
    public function selectOffice(Request $request){
        $officeID = $request->office;
        $office = Entity::where('entityID', $officeID)->first();
        session()->put('office', $office->entity);
        $services = Service::where('entityID', $officeID)->orderBy('service', 'ASC')->get();
        return response()->json($services);
    }

    public function listOffice() {
        $offices = Entity::where([
            ['under', 0],
            ['status', 1],
            ])->orderBy('entity', 'ASC')->get();
        return response()->json($offices);
    }

    public function selectService(Request $request){
        $serviceID = $request->service;
        if ($serviceID) {
            $service = Service::where('serviceID', $serviceID)->first();
            session()->put('service', $service->service);
            return response()->json($service);
        } else {
            session()->put('service', 'Other Matters');
            return response()->json(True);
        }
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
            $feedback->service = session()->get('service');
            $feedback->save();
        }
        return response()->json($response);
    }
}
