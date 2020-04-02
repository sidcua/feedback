<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function overallRating(){
        $rating = Feedback::avg('rate');
        return response()->json($rating);
    }

    public function byOfficeRating() {
        $rating = DB::select('SELECT office, AVG(rate) AS rate FROM feedbacks GROUP BY office');
        return response()->json($rating);
    }
}
