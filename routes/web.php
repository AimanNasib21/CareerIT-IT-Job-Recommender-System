<?php

use App\Http\Controllers\ResumeBuilderController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'resume-builder', 'as' => 'resume-builder.', 'middleware' => 'auth'], function () {
    Route::get('/page-1', [ResumeBuilderController::class, 'page1'])->name('page-1');
    Route::get('/page-2', [ResumeBuilderController::class, 'page2'])->name('page-2');
    Route::get('/page-3', [ResumeBuilderController::class, 'page3'])->name('page-3');
    Route::get('/page-4', [ResumeBuilderController::class, 'page4'])->name('page-4');
    Route::get('/page-5', [ResumeBuilderController::class, 'page5'])->name('page-5');
    Route::get('/page-6', [ResumeBuilderController::class, 'page6'])->name('page-6');
    Route::get('/page-7', [ResumeBuilderController::class, 'page7'])->name('page-7');
    Route::get('/page-8', [ResumeBuilderController::class, 'page8'])->name('page-8');
});
