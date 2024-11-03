<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\JobCandidateController;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{company_job:slug}', [FrontController::class, 'details'])->name('front.details');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        route::prefix('dashboard')->name('dashboard.')->group(function(){

        route::middleware('can:apply job')->group(function () {
        route::get('my-applications', [DasboardController::class, 'my_Applications'])->name('my.applications');
        route::get('my-applications/{job_candidate}', [DasboardController::class, 'my_Applications_details'])->name('my.applications.details');
        });
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage categories')->group(function () {
            Route::resource('categories', CategoryController::class);
        });
        route::middleware('can:manage company')->group(function () {
            Route::resource('company', CompanyController::class);
        });
        route::middleware('can:manage jobs')->group(function () {
            route::resource('company_jobs', CompanyJobController::class);
        });
        route::middleware('can:manage applicants')->group(function () {
            route::resource('job_candidate', JobCandidateController::class);
            route::get('candidate/{job_candidate}/resume/download', [JobCandidateController::class, 'download_File'])->name('download_resume');
        });
    });
});

require __DIR__.'/auth.php';
