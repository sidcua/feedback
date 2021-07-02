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
    Route::get('office', 'PagesController@showOffice');
    Route::get('rate', 'PagesController@showRate');
    Route::get('success', 'PagesController@showSuccess');
    Route::post('office/select', 'FeedbackController@selectOffice');
    Route::get('service', 'PagesController@showService');
    Route::post('service/select', 'FeedbackController@selectService');
    Route::post('submit', 'FeedbackController@submitFeedback');

    Route::get('form', 'PagesController@showForm');
    Route::post('submitForm', 'ClientController@submitClientRate');
    Route::get('listService', 'ClientController@listService');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function (){
    Route::prefix('admin')->group(function (){

        // Dashboard
        Route::get('dashboard', 'PagesController@showDashboard');
        Route::prefix('dashboard')->group(function(){
            Route::get('overallRating', 'AdminController@overallRating');
            Route::get('byFactor', 'AdminController@byFactor');
            Route::get('totalFeedback', 'AdminController@totalFeedback');
        });
        
        // Entity
        Route::get('entity', 'PagesController@showEntity');
        Route::prefix('entity')->group(function(){
            Route::get('list', 'EntityController@listEntities');
            Route::get('listMain', 'EntityController@listMainEntities');
            Route::get('listMainEdit', 'EntityController@listMainEntitiesEdit');
            Route::post('add', 'EntityController@addEntity');
            Route::post('delete', 'EntityController@deleteEntity');
            Route::post('edit', 'EntityController@editEntity');
        });

        //Report
        Route::get('report', 'PagesController@showReport');
        Route::prefix('report')->group(function (){
            Route::get('listService', 'ReportController@listService');
            Route::get('listFeedback', 'ReportController@listFeedback');
        });
    });
});

