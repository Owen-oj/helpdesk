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


Route::get('/', 'HomeController@index');

Auth::routes();

Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix'=>'admin'],function (){
        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */
        Route::resource('statuses','StatusController');

        /*
        |--------------------------------------------------------------------------
        | Priority
        |--------------------------------------------------------------------------
        */
        Route::resource('priorities','PriorityController');

        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */
        Route::resource('categories','CategoryController');

        /*
        |--------------------------------------------------------------------------
        | Agents
        |--------------------------------------------------------------------------
        */
        Route::get('agents',['as'=>'agents.index','uses'=>'AgentController@index']);
        Route::get('agents/users',['as'=>'agents.users','uses'=>'AgentController@users']);
        Route::post('agents/{id}/delete',['as'=>'agents.delete','uses'=>'AgentController@removeAgent']);
        Route::post('agents/create/{id}',['as'=>'agents.create','uses'=>'AgentController@addAgent']);
    });

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('dashboard',['as'=>'dashboard','uses'=>'HomeController@dashboard']);

    /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */
    Route::get('tickets/complete',['as'=>'tickets.complete','uses'=>'TicketController@indexComplete']);
    Route::get('tickets/indextable/{completed}',['as'=>'tickets.indextable','uses'=>'TicketController@indexTable']);
    Route::resource('tickets','TicketController');


    /*
    |--------------------------------------------------------------------------
    | Comment
    |--------------------------------------------------------------------------
    */
    Route::resource('comments','CommentsController');
});

Route::get('testapi/{completed}','Api\TicketController@index');
Route::get('tickets-store/','Api\TicketController@store');

Route::get('select-services','Api\SelectServices');



//todo add administrator entity
