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

/////////index///////////////
Route::get('/student',[StudentController::class, 'index'])->name('students.index');
Route::get('/relative',[RelativeController::class, 'index'])->name('relatives.index');
Route::get('/course',[CourseController::class, 'index'])->name('courses.index');
Route::get('/staff',[StaffController::class, 'index'])->name('staff.index');


///////////create///////////////
Route::get('/student/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/relatives/create', [RelativeController::class, 'create'])->name('relatives.create');
Route::post('/student', [StudentController::class, 'store'])->name('students.store');
Route::post('/relatives/store', [RelativeController::class, 'store'])->name('relatives.store');

//////////edit///////////////
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::get('/relatives/create', [RelativeController::class, 'create'])->name('relatives.create');
Route::post('/student/{id}', [StudentController::class, 'update'])->name('students.update');
Route::post('/relatives/store', [RelativeController::class, 'store'])->name('relatives.store');

////////////delete/////////////////
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('students.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
