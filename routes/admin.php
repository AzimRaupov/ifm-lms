<?php

use Illuminate\Support\Facades\Route;


Route::prefix('class')->group(function (){

    Route::post('/',[\App\Http\Controllers\admin\SinfController::class,'store'])->name('class.store');
    Route::get('/edit/{id}',[\App\Http\Controllers\admin\SinfController::class,'edit'])->name('class.edit');
});


Route::prefix('teacher')->group(function (){
    Route::get('/',[\App\Http\Controllers\admin\TeacherController::class,'index'])->name('teacher.index');
    Route::post('/add',[\App\Http\Controllers\admin\TeacherController::class,'store'])->name('teacher.store');
    Route::get('/edit/{id}',[\App\Http\Controllers\admin\TeacherController::class,'edit'])->name('teacher.edit');
});
