<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/admin', function() {
   return view('admin');
});

Route::get('/test', function() {
    return view('test');
});

Route::resource('assignment', App\Http\Controllers\AssignmentController::class);
Route::post('assignment/create', [App\Http\Controllers\AssignmentController::class, 'create'])
    ->name('assignment.create');
require __DIR__.'/auth.php';
