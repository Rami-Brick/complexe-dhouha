<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RelativeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('student')->controller(StudentController::class)->group(function(){
    Route::get('', 'index')->name('students.index');
    Route::post('', 'store')->name('students.store');
    Route::get('create', 'create')->name('students.create');
    Route::get('{studentId}/edit', 'edit')->name('students.edit');
    Route::post('{studentId}','update')->name('students.update');
    Route::delete('{studentId}', 'destroy')->name('students.destroy');
});

Route::prefix('relative')->controller(RelativeController::class)->group(function() {
    Route::get('','index')->name('relatives.index');
    Route::get('create', 'create')->name('relatives.create');
    Route::post('', 'store')->name('relatives.store');
    Route::get('{relativeId}/edit', 'edit')->name('relatives.edit');
    Route::post('{relativeId}', 'store')->name('relatives.update');
    Route::delete('{relativeId}', 'destroy')->name('relatives.destroy');
});

Route::prefix('course')->controller(CourseController::class)->group(function() {
    Route::get('','index')->name('courses.index');
    Route::get('create', 'create')->name('courses.create');
    Route::post('', 'store')->name('courses.store');
    Route::get('{courseId}/edit', 'edit')->name('courses.edit');
    Route::post('{courseId}', 'store')->name('courses.update');
    Route::delete('{courseId}', 'destroy')->name('courses.destroy');
});

Route::prefix('staff')->controller(StaffController::class)->group(function() {
    Route::get('','index')->name('staff.index');
    Route::get('create', 'create')->name('staff.create');
    Route::post('', 'store')->name('staff.store');
    Route::get('{staffId}/edit', 'edit')->name('staff.edit');
    Route::post('{staffId}', 'store')->name('staff.update');
    Route::delete('{staffId}', 'destroy')->name('staff.destroy');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
