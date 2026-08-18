<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Portfolio Routes
Route::get('/', \App\Http\Controllers\Portfolio\HomeController::class)->name('home');
Route::get('/about', \App\Http\Controllers\Portfolio\AboutController::class)->name('about');
Route::get('/skills', \App\Http\Controllers\Portfolio\SkillsController::class)->name('skills');
Route::get('/experience', \App\Http\Controllers\Portfolio\ExperienceController::class)->name('experience');
Route::get('/education', \App\Http\Controllers\Portfolio\EducationController::class)->name('education');
Route::get('/certifications', \App\Http\Controllers\Portfolio\CertificationController::class)->name('certifications');
Route::get('/projects', [\App\Http\Controllers\Portfolio\ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project:slug}', [\App\Http\Controllers\Portfolio\ProjectController::class, 'show'])->name('projects.show');
Route::get('/services', \App\Http\Controllers\Portfolio\ServiceController::class)->name('services');
Route::get('/resume', \App\Http\Controllers\Portfolio\ResumeController::class)->name('resume');
Route::get('/resume/pdf', \App\Http\Controllers\Portfolio\ResumePdfController::class)->name('resume.pdf');
Route::get('/contact', \App\Http\Controllers\Portfolio\ContactController::class)->name('contact');
Route::post('/contact', [\App\Http\Controllers\Portfolio\ContactController::class, 'store'])->name('contact.store');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class)->except('show');
    Route::resource('experience', \App\Http\Controllers\Admin\ExperienceController::class)->except('show');
    Route::resource('education', \App\Http\Controllers\Admin\EducationController::class)->except('show');
    Route::resource('certifications', \App\Http\Controllers\Admin\CertificationController::class)->except('show');
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->except('show');
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except('show');
    Route::resource('social-links', \App\Http\Controllers\Admin\SocialLinkController::class)->except('show');

    Route::get('/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('messages.show');
    Route::patch('/messages/{message}/read', [\App\Http\Controllers\Admin\MessageController::class, 'markAsRead'])->name('messages.read');
    Route::patch('/messages/{message}/unread', [\App\Http\Controllers\Admin\MessageController::class, 'markAsUnread'])->name('messages.unread');
    Route::delete('/messages/{message}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';
