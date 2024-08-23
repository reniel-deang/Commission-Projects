<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Userdashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [Userdashboard::class, 'display'])->name('dashboard');
    Route::post('/dashboard', [Userdashboard::class, 'newstudent'])->name('newstudent');
});

Route::middleware('admin')->group(function () {
    Route::get('/admindashboard', [Admin::class, 'display'])->name('admin.dashboard');
    Route::get('/manageteacher', [Admin::class, 'displaymanageteacher'])->name('manageteacher');
    Route::post('/teacher/accept/{id}', [Admin::class, 'acceptTeacher'])->name('teacher.accept');
    Route::post('/teacher/reject/{id}', [Admin::class, 'rejectTeacher'])->name('teacher.reject');
})->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
