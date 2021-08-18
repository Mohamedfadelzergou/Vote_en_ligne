<?php

use Illuminate\Support\Facades\Route;

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





// Route::get('/home', 'HomeController@index')->name('home');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/', function () {
            return view('auth.login');
        });
        Auth::routes();
        Route::get('/user', 'UserController@index')->name('user');
        Route::get('/admin', 'AdminController@index')->name('admin');
        Route::get('/profile','ProfileController@index')->name('profile');
        Route::get('/voters','VoterController@index')->name('voters');
        Route::get('/votes', 'VoteController@index')->name('votes');
        Route::get('/vote/{id}','VoteController@edit')->name('voteedit');
        Route::get('/candidats','CandidatController@index')->name('candidats');
    });
Route::post('/profile','ProfileController@store')->name('profile');
Route::get('/confirmation', function () {return view('confirmation');});
Route::get('/voter/{id}/profile','ProfileController@profile_voter_id')->name('voter_profile');
Route::get('/candidat/{id}/profile','ProfileController@profile_candidat_id')->name('candidat_profile');
Route::post('/vote', 'VoteController@store')->name('vote');
Route::get('/vote/{id_vote}/{id_candidat}','VoteController@voter')->name('votevoter');
Route::post('/vote/{id}','VoteController@update')->name('voteedit');
Route::delete('/vote/{id}','VoteController@destroy')->name('votedelete');
Route::delete('/voter/{id}','VoterController@destroy')->name('voterdelete');
Route::post('/voter/{id}','VoterController@update')->name('voterupdate');
Route::post('/candidat', 'CandidatController@store')->name('candidat');
Route::post('/candidat/{id}','CandidatController@update')->name('candidatedit');
Route::delete('/candidat/{id}','CandidatController@destroy')->name('candidatdelete');


