<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function overallRating(){
        $rating['rate'] = Feedback::avg('rate');
        $rating['count'] = Feedback::all()->count();
        return response()->json($rating);
    }

    public function byOfficeRating() {
        $rating = DB::select('SELECT office, AVG(rate) AS rate, COUNT(rate) as count FROM feedbacks GROUP BY office');
        return response()->json($rating);
    }
}
