<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function showFeedbackForm(){
        return view('feedback.index2');
    }

    public function showOffice(){
        return view()->make('feedback.office');
    }

    public function showService() {
        return view()->make('feedback.service');
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

    public function showForm() {
        return view('feedback.form');
    }

    public function showReport() {
        return view('feedback.admin.report');
    }
}
