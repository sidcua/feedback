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
    Route::get('office/list', 'FeedbackController@listOffice');
    Route::get('rate', 'PagesController@showRate');
    Route::get('success', 'PagesController@showSuccess');
    Route::post('office/select', 'FeedbackController@selectOffice');
    Route::get('service', 'PagesController@showService');
    Route::post('service/select', 'FeedbackController@selectService');
    Route::post('submit', 'FeedbackController@submitFeedback');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->group(function (){
    Route::prefix('admin')->group(function (){

        // Dashboard
        Route::get('dashboard', 'PagesController@showDashboard');
        Route::prefix('dashboard')->group(function(){
            Route::get('overall', 'AdminController@overallRating');
            Route::get('byOffice', 'AdminController@byOfficeRating');
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

        //Service
        Route::get('service', 'PagesController@showServicePage');
        Route::prefix('service')->group( function () {
            Route::get('list', 'ServiceController@listService');
            Route::get('listEntity', 'ServiceController@listEntity');
            Route::post('add', 'ServiceController@addService');
            Route::post('delete', 'ServiceController@deleteService');
            Route::post('edit', 'ServiceController@editService');
        });

        //Feedback
        Route::get('feedback', 'PagesController@showFeedbackPage');
        Route::prefix('feedback')->group( function () {
            Route::get('list', 'AdminController@listFeedback');
        });
    });
});

