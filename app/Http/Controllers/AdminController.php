<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function overallRating(){
        $factors = DB::select("SELECT AVG(responsiveness) AS responsiveness, AVG(reliability) AS reliability, AVG(access) AS access, AVG(communication) AS communication, AVG(cost) AS cost, AVG(integrity) AS integrity, AVG(assurance) AS assurance, AVG(outcome) AS outcome FROM clients");
        $overallAverage = ($factors[0]->responsiveness + $factors[0]->reliability + $factors[0]->reliability + $factors[0]->access + $factors[0]->communication + $factors[0]->cost + $factors[0]->integrity + $factors[0]->assurance + $factors[0]->outcome)/8;
        return response()->json($overallAverage);
    }

    public function byFactor() {
        $factors = DB::select("SELECT AVG(responsiveness) AS responsiveness, AVG(reliability) AS reliability, AVG(access) AS access, AVG(communication) AS communication, AVG(cost) AS cost, AVG(integrity) AS integrity, AVG(assurance) AS assurance, AVG(outcome) AS outcome FROM clients");
        return response()->json($factors[0]);
    }

    public function totalFeedback() {
        $feedbacks = Client::all()->count();
        return response()->json($feedbacks);
    }
}
