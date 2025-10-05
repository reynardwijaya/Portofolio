<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AdminExperienceController;

// ======================
// USER PAGES
// ======================

// Home page (pakai custom homepage view)
Route::get('/', [Admincontroller::class, 'homepage'])->name('home');

// About page (include dari home/about.blade.php)
Route::get('/about', function () {
    return view('home.about');
})->name('about');

// Experience page (user)
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');

// Post details
Route::get('/post_details/{id}', [Admincontroller::class, 'post_details'])->name('post.details');

// ======================
// ADMIN PAGES
// ======================
Route::get('/admin', [AdminExperienceController::class, 'create'])->name('admin.home');
Route::get('/admin/add-post', [AdminExperienceController::class, 'create'])->name('admin.add-post');
Route::get('/admin/manage-post', [AdminExperienceController::class, 'index'])->name('admin.manage-post');
Route::resource('/admin/experiences', AdminExperienceController::class);
