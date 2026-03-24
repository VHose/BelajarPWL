<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;

Route::get('/student', [StudentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('stater');
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/category", [CategoryController::class, 'index'])-> name ('category.index');
    // untuk nambahin

    Route::middleware('role:1')->group(function () {
        Route::get("/category/create", [CategoryController::class, 'create'])-> name ('category.create');
        Route::post("/category/create", [CategoryController::class, 'store'])-> name ('category.store');
    
        // untuk update
        Route::get("/category/edit/{category}", [CategoryController::class, 'edit'])-> name ('category.edit');
        Route::put("/category/edit/{category}", [CategoryController::class, 'update'])-> name ('category.update');
    
        // untuk delete
        Route::delete("/category/delete/{category}", [CategoryController::class, 'destroy'])-> name ('category.destroy');
    });
    
});

require __DIR__.'/auth.php';
