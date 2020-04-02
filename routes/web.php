<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('guest')->group(function (){
    //Login
    Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('admin', 'Auth\LoginController@login');

    //Feedback
    Route::get('/', 'PagesController@showFeedbackForm');
    Route::get('/office', 'PagesController@showOffice');
    Route::get('/rate', 'PagesController@showRate');
    Route::get('/success', 'PagesController@showSuccess');
    Route::post('/office/select', 'FeedbackController@selectOffice');
    Route::post('/submit', 'FeedbackController@submitFeedback');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Authenticated
Route::middleware('auth')->group(function (){
    Route::get('/admin/dashboard', 'PagesController@showDashboard');
    Route::get('/admin/dashboard/overall', 'AdminController@overallRating');
    Route::get('/admin/dashboard/byOffice', 'AdminController@byOfficeRating');
});

