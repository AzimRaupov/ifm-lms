<?php

use Illuminate\Support\Facades\Route;


Route::prefix('class')->group(function (){
    Route::get('/{literal_int}',[\App\Http\Controllers\admin\SinfController::class,'showLiterals'])->name('class.showLiterals');
    Route::get('/show/{id}',[\App\Http\Controllers\admin\StudentController::class,'index'])->name('class.show');
    Route::post('/add',[\App\Http\Controllers\admin\SinfController::class,'store'])->name('class.store');
    Route::post('/addStudent',[\App\Http\Controllers\admin\StudentController::class,'addStudent'])->name('class.addStudent');
    Route::get('/edit/{id}',[\App\Http\Controllers\admin\SinfController::class,'edit'])->name('class.edit');
    Route::get('/teachers/index/{id}',[\App\Http\Controllers\admin\SinfController::class,'class_teachers'])->name('class.teachers');
    Route::post('/magazine/create',[\App\Http\Controllers\admin\MagazineController::class,'create_magazine'])->name('class.create_magazine');



});



Route::prefix('teacher')->group(function (){
    Route::get('/',[\App\Http\Controllers\admin\TeacherController::class,'index'])->name('teacher.index');
    Route::post('/add',[\App\Http\Controllers\admin\TeacherController::class,'store'])->name('teacher.store');
    Route::get('/edit/{id}',[\App\Http\Controllers\admin\TeacherController::class,'edit'])->name('teacher.edit');
    Route::post('/update/{id}',[\App\Http\Controllers\admin\TeacherController::class,'update'])->name('teacher.update');
    Route::post('/destroy/{$id}',[\App\Http\Controllers\admin\TeacherController::class,'destroy'])->name('teacher.destroy');
});
