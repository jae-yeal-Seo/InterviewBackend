<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionController;
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
});

Route::get(
    '/dashboard',
    [Controller::class, 'storeUserInformation']
)->middleware(['auth'])->name('dashboard');

Route::get('/userid', [Controller::class, 'getUserId']);

Route::post('/questionsetadd', [QuestionController::class, 'questionSetAdd']);

Route::get('/getquestionsets/{userId}', [QuestionController::class, 'getQuestionsets']);

Route::post('/questionadd', [QuestionController::class, 'questionAdd']);

require __DIR__ . '/auth.php';
