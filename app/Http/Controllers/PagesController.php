<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function showFeedbackForm(){
        return view('feedback.index');
    }

    public function showOffice(){
        return view()->make('feedback.office');
    }

    public function showRate(){
        return view()->make('feedback.rate');
    }
    
    public function showSuccess(){
        return view()->make('feedback.success');
    }
    
    public function showDashboard() {
        return view('feedback.admin.dashboard');
    }

    public function showEntity() {

        $entity = Entity::where('under',0)->get();
        return view('feedback.admin.entity', compact('entity'));
    }
}
