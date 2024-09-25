<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');
Route::get('about',[FrontendController::class, 'about'])->name('frontend.about');
Route::get('employee',[FrontendController::class, 'employee'])->name('frontend.employee');

Route::resource('menu', MenuController::class);
