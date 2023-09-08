<?php

use App\Http\Controllers\CustomerController;
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

// Route::get('/', function () {
//     return view('customerhome');
// });
Route::get('/',[CustomerController::class,'alldata']);
Route::post('/',[CustomerController::class,'alldata']);

Route::post('/trash',[CustomerController::class,'trashdata']);
Route::get('/trash',[CustomerController::class,'trashdata']);

Route::post('/delete/{id}',[CustomerController::class,'delete']);
Route::post('/restore/{id}',[CustomerController::class,'restoring']);
Route::post('/permanentDelete/{id}',[CustomerController::class,'destroy']);




