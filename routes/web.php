<?php

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


Route::post('/import' , [\App\Http\Controllers\StudentController::class , 'import'])->name('import');
Route::get('/export' , [\App\Http\Controllers\StudentController::class , 'export'])->name('export');
