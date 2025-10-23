<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('users.create');
});


Route::resource('users', UserController::class)->except('index');
Route::get('pg/office-emp-police-verification/', [UserController::class, 'index'])->name('users-data.index');
Route::post('users/{user}/download', [UserController::class, 'download'])->name('users.download');
