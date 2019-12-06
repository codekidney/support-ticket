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

Route::get('/', 'HomeController@index')->name('home');
Route::get('language/{locale}', function ($locale) {
    App::setLocale($locale);
    return redirect()->route('home');
});
Auth::routes();
Route::get('new-ticket', 'TicketController@create');
Route::get('/lang/{key}', function ($key) {
    session()->put('locale', $key);
    return redirect()->back();
});
Route::post('new-ticket', 'TicketController@store');
Route::get('my_tickets', 'TicketController@userTickets')->name('user_home');
Route::get('tickets/{ticket_id}', 'TicketController@show');
Route::post('comment', 'CommentsController@postComment');
Route::prefix('admin')->group(function(){
    Route::get('tickets','TicketController@index')->name('admin_home');
    Route::get('close_ticket/{ticket_id}','TicketsController@close');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
