<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Service;
use Session;
use Validator;

class ClientController extends Controller
{
    public function submitClientRate(Request $request) {
        $validator = Validator::make($request->all(), [
            'sex' => 'required',
            'type' => 'required',
            'institution' => 'required',
            'transaction' => 'required',
            'service' => 'required',
            'responsiveness' => 'required',
            'access' => 'required',
            'communication' => 'required',
            'cost' => 'required',
            'integrity' => 'required',
            'assurance' => 'required',
            'outcome' => 'required',
        ]);
        $response = array(
            'status' => 0,
            'error' => array(),
        );
        if ($validator->fails()) {
            $response['status'] = 1;
            $response['error'] = $validator->errors();
        } else {
            $feedback = new Client;
            $feedback->fill($request->all());
            $feedback->save();
        }
        return response()->json($response);
    }

    public function listService(Request $request) {
        $services = Service::all();
        return response()->json($services);
    }
}
