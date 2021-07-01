<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function listFeedback(Request $request) {
        if (!$request->service) {
            $feedbacks['list'] = Client::all();
            $feedbacks['mean'] = DB::select("SELECT AVG(responsiveness) AS responsiveness, AVG(reliability) AS reliability, AVG(access) AS access, AVG(communication) AS communication, AVG(cost) AS cost, AVG(integrity) AS integrity, AVG(assurance) AS assurance, AVG(outcome) AS outcome FROM clients");
            $feedbacks['median']['responsiveness'] = Client::select('responsiveness')->get()->median('responsiveness');
            $feedbacks['median']['reliability'] = Client::select('reliability')->get()->median('reliability');
            $feedbacks['median']['access'] = Client::select('access')->get()->median('access');
            $feedbacks['median']['communication'] = Client::select('communication')->get()->median('communication');
            $feedbacks['median']['cost'] = Client::select('cost')->get()->median('cost');
            $feedbacks['median']['integrity'] = Client::select('integrity')->get()->median('integrity');
            $feedbacks['median']['assurance'] = Client::select('assurance')->get()->median('assurance');
            $feedbacks['median']['outcome'] = Client::select('outcome')->get()->median('outcome');
        } else {
            $feedbacks['list'] = Client::where('service', $request->service)->get();
            $feedbacks['mean'] = DB::select("SELECT AVG(responsiveness) AS responsiveness, AVG(reliability) AS reliability, AVG(access) AS access, AVG(communication) AS communication, AVG(cost) AS cost, AVG(integrity) AS integrity, AVG(assurance) AS assurance, AVG(outcome) AS outcome FROM clients WHERE service = $request->service");
            $feedbacks['median']['responsiveness'] = Client::select('responsiveness')->where('service', $request->service)->get()->median('responsiveness');
            $feedbacks['median']['reliability'] = Client::select('reliability')->where('service', $request->service)->get()->median('reliability');
            $feedbacks['median']['access'] = Client::select('access')->where('service', $request->service)->get()->median('access');
            $feedbacks['median']['communication'] = Client::select('communication')->where('service', $request->service)->get()->median('communication');
            $feedbacks['median']['cost'] = Client::select('cost')->where('service', $request->service)->get()->median('cost');
            $feedbacks['median']['integrity'] = Client::select('integrity')->where('service', $request->service)->get()->median('integrity');
            $feedbacks['median']['assurance'] = Client::select('assurance')->where('service', $request->service)->get()->median('assurance');
            $feedbacks['median']['outcome'] = Client::select('outcome')->where('service', $request->service)->get()->median('outcome');
        }
        return response()->json($feedbacks);
    }

    public function listService(Request $request) {
        $services = Service::all();
        return response()->json($services);
    }
}
