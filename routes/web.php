<?php

use App\Http\Controllers\CourtDecisionsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DecisionController;


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
});


Route::get('/hello', function () {
    return 'أهلا بالعالم';
});


Route::get('/decisions/{id}', [DecisionController::class, 'show']);

Route::post('/decisions/{id}/ask', [DecisionController::class, 'askQuestion'])->name('ask-question');

Route::get('/decisions/{id}', [DecisionController::class, 'show'])->name('decisions.show');





