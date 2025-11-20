<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [CvController::class, 'index'])->name('home');
Route::get('/cv', [CvController::class, 'index'])->name('cv.index');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes - Protected
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Profile Routes
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'updateProfile']);
    Route::post('/profile/photo', [AdminController::class, 'updateProfilePhoto'])->name('admin.profile.photo');
    
    // Skills Routes
    Route::get('/skills', [AdminController::class, 'skillsIndex'])->name('admin.skills.index');
    Route::get('/skills/create', [AdminController::class, 'skillsCreate'])->name('admin.skills.create');
    Route::post('/skills', [AdminController::class, 'skillsStore'])->name('admin.skills.store');
    Route::get('/skills/{skill}/edit', [AdminController::class, 'skillsEdit'])->name('admin.skills.edit');
    Route::put('/skills/{skill}', [AdminController::class, 'skillsUpdate'])->name('admin.skills.update');
    Route::delete('/skills/{skill}', [AdminController::class, 'skillsDestroy'])->name('admin.skills.destroy');
    
    // Projects Routes
    Route::get('/projects', [AdminController::class, 'projectsIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [AdminController::class, 'projectsCreate'])->name('admin.projects.create');
    Route::post('/projects', [AdminController::class, 'projectsStore'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [AdminController::class, 'projectsEdit'])->name('admin.projects.edit');
    Route::put('/projects/{project}', [AdminController::class, 'projectsUpdate'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [AdminController::class, 'projectsDestroy'])->name('admin.projects.destroy');
    Route::post('/projects/{project}/image', [AdminController::class, 'projectsUpdateImage'])->name('admin.projects.image');
    
    // Education Routes
    Route::get('/education', [AdminController::class, 'educationIndex'])->name('admin.education.index');
    Route::get('/education/create', [AdminController::class, 'educationCreate'])->name('admin.education.create');
    Route::post('/education', [AdminController::class, 'educationStore'])->name('admin.education.store');
    Route::get('/education/{education}/edit', [AdminController::class, 'educationEdit'])->name('admin.education.edit');
    Route::put('/education/{education}', [AdminController::class, 'educationUpdate'])->name('admin.education.update');
    Route::delete('/education/{education}', [AdminController::class, 'educationDestroy'])->name('admin.education.destroy');
    
    // Certificates Routes
    Route::get('/certificates', [AdminController::class, 'certificatesIndex'])->name('admin.certificates.index');
    Route::get('/certificates/create', [AdminController::class, 'certificatesCreate'])->name('admin.certificates.create');
    Route::post('/certificates', [AdminController::class, 'certificatesStore'])->name('admin.certificates.store');
    Route::get('/certificates/{certificate}/edit', [AdminController::class, 'certificatesEdit'])->name('admin.certificates.edit');
    Route::put('/certificates/{certificate}', [AdminController::class, 'certificatesUpdate'])->name('admin.certificates.update');
    Route::delete('/certificates/{certificate}', [AdminController::class, 'certificatesDestroy'])->name('admin.certificates.destroy');
    Route::post('/certificates/{certificate}/image', [AdminController::class, 'certificatesUpdateImage'])->name('admin.certificates.image');
});