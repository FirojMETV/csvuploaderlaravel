<?php

use App\Http\Controllers\CsvController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload',[CsvController::class,'showForm'])->name('csv.form');
Route::post('/upload',[CsvController::class,'upload'])->name('csv.upload');
Route::get('/show',[CsvController::class,'showData'])->name('csv.show');
