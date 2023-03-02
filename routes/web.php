<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/dashboard/create-event-matches',[App\Http\Controllers\DashboardController::class, 'showMatches'])->name('create-event-matches')->middleware('user','fireauth');
Route::post('/dashboard/create-event-matches',[App\Http\Controllers\DashboardController::class, 'createMatches']);


Route::get('/dashboard/create-event-training',[App\Http\Controllers\DashboardController::class, 'showTraining'])->name('create-event-training')->middleware('user','fireauth');
Route::post('/dashboard/create-event-training',[App\Http\Controllers\DashboardController::class, 'createTraining']);

Route::get('/dashboard/players',[App\Http\Controllers\DashboardController::class, 'showPlayers'])->name('showPlayers')->middleware('user','fireauth');
Route::get('/dashboard/players/{id}',[App\Http\Controllers\DashboardController::class, 'showPlayersDetail'])->name('showPlayersDetail')->middleware('user','fireauth');




Route::get('/dashboard/calendar',[App\Http\Controllers\DashboardController::class, 'calendar'])->name('calendar')->middleware('user','fireauth');

Auth::routes();
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user','fireauth');

Route::get('/calendar/training/{id}', [DashboardController::class, 'showDetailTraining'])->name('showDetailTraining')->middleware('user','fireauth');
Route::get('/calendar/match/{id}', [DashboardController::class, 'showDetailMatch'])->name('showDetailMatch')->middleware('user','fireauth');
Route::post('/calendar/match/{id}',[App\Http\Controllers\DashboardController::class, 'summonPlayers']);

Route::get('/dashboard/chat', [App\Http\Controllers\DashboardController::class, 'chat'])->name('chat')->middleware('user','fireauth');
Route::get('/dashboard/team-stats', [App\Http\Controllers\DashboardController::class, 'teamStats'])->name('teamStats')->middleware('user','fireauth');
Route::get('/dashboard/presence', [App\Http\Controllers\DashboardController::class, 'presence'])->name('presence')->middleware('user','fireauth');


Route::get('/email/verify', [App\Http\Controllers\Auth\ResetController::class, 'verify_email'])->name('verify')->middleware('fireauth');

Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');
Route::get('/dashboard',  [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('user','fireauth');

Route::resource('/home/profile', App\Http\Controllers\Auth\ProfileController::class)->middleware('user','fireauth');

Route::resource('/password/reset', App\Http\Controllers\Auth\ResetController::class);

Route::resource('/img', App\Http\Controllers\ImageController::class);
