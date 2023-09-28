<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('auth.login');
});


// Authenticate users routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/admin', function () {
        return view('backend.dashboard');
    });

    Route::get('/users', function () {
        return view('backend.users');
    });
    // Category routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');


    // report
    Route::get('category/pdf-report', [ReportController::class, 'categoryPDFReport'])->name('category.pdf_report');
    Route::get('category/excel-report', [ReportController::class, 'categoryExcelReport'])->name('category.excel_report');

});


require __DIR__ . '/auth.php';